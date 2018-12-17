<?php
namespace App\Controller\Hulu;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;
// use Cake\Http\Middleware\EncryptedCookieMiddleware;

/**
 * Item Controller
 *
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('hulu/item');
    }

    /**
      * beforeFilter method
      */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if (in_array($this->request->action, ['loading'])) {
          // $this->loadComponent('Security');
          // $this->Security->setConfig('unlockedActions', ['関数名']);

          // $this->loadComponent('Csrf');
          $this->eventManager()->off($this->Csrf);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

    }

    /**
     * View method
     *
     * @param string|null $id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($item_id = null){
      $this->log('Hulu/Item view() start','info');

      //t_n_new_itemテーブルからデータ取得
      $this->HuluNewItems = TableRegistry::get('HuluNewItems');
      $new_item_list = $this->HuluNewItems->find();

      $this->HuluItems = TableRegistry::get('HuluItems');
      $item = $this->HuluItems->find()
        ->where(['id' => $item_id])
        ->toList();

      $this->HuluReviews = TableRegistry::get('HuluReviews');
      $review = $this->HuluReviews->find()
        ->where(['item_id' => $item_id])
        ->join([
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'INNER',
                'conditions' => 'HuluReviews.user_id = Users.id'
        ])
        ->select([
                'id' => 'HuluReviews.id',
                'name' => 'Users.name',
                'rate' => 'HuluReviews.rate',
                'review' => 'HuluReviews.review',
                'item_id' => 'HuluReviews.item_id',
                'created_t' => 'HuluReviews.created_t'
        ])
        ->order(['HuluReviews.created_t' => 'DESC'])
        ->limit(5)
        ->toList();

      $count = $this->HuluReviews->find()
        ->select(['count' => $this->HuluReviews->find()->func()->count('*')])
        ->where(['item_id' => $item_id])
        ->toList();

      $avg = $this->HuluReviews->find()
        ->select(['avg' => $this->HuluReviews->find()->func()->avg('rate')])
        ->where(['rate !=' => 0])
        ->andWhere(['item_id' => $item_id])
        ->toList();

      // $cookie = $this->request->getCookie('usernameCookie');
      // if(empty($cookie)){
      //   $cookie = "";
      // }

      $this->set(compact('new_item_list','count','avg','item','review','item_id'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->log('Hulu/Item add() start','info');

        $input_itemid = $this->request->getData('item_id');
        $input_name = $this->request->getData('name');
        $input_rate = $this->request->getData('rate');
        $input_review = $this->request->getData('review');

        if($input_name == ""){
          $input_name = "anonymous";
        }

        try{
            $UsersTable = TableRegistry::get('Users');
            $user_list = $UsersTable->find()
              ->select(['id'])
              ->where(['name' => $input_name])
              ->toList();

            if(count($user_list) == 0){
              $User = $UsersTable->newEntity();
              $User->name = $input_name;
              if ($UsersTable->save($User) == false) {
                  throw new \Exception("UsersTable application error");
              }
              $user_id = $User->id;

              // // クッキー登録
              // $this->response->cookie([
              //   'name' => 'usernameCookie',
              //   'value' => $input_name,
              //   'expire' => strtotime('+1 month'),
              //   'secure' => false,
              // ]);
            }else{
              $user_id = $user_list[0]["id"];
            }

            // バリデーションチェック
            // validationDefault()呼び出し
            $HuluReviewsTable = TableRegistry::get('HuluReviews');
            $data = [
                      'user_id' => $user_id,
                      'item_id' => $input_itemid,
                      'rate' => $input_rate,
                      'review' => $input_review,
            ];
            $HuluReview = $HuluReviewsTable->newEntity($data);
            if ($HuluReview->errors()) {
                $this->log("error".serialize($HuluReview->errors()),'info');
                throw new \Exception("HuluReviewsTable validation error");
            }
            // アプリケーションルールチェック
            // buildRules()呼び出し
            if ($HuluReviewsTable->save($HuluReview) == false) {
                throw new \Exception("HuluReviewsTable application rule error");
            }
            $review_id = $HuluReview->id;

            $ReviewsTable = TableRegistry::get('Reviews');
            $Review = $ReviewsTable->newEntity();
            $Review->service = "hulu";
            $Review->review_id = $review_id;
            if ($ReviewsTable->save($Review) == false) {
                throw new \Exception("ReviewsTable application error");
            }

        } catch(\Exception $e) {
            // 例外に対する処理
            $code = $e->getCode(); // HTTPステータスコード
            $message = $e->getMessage(); // エラーメッセージ
            $this->log("code : ".$code." message : ".$message,'error');

            // InternalServerError メッセージを渡せる
            // throw new InternalErrorException(__(''));
            // NotFoundError メッセージを渡せる
            // throw new NotFoundException(__('Can not insert datas'));
        }

        return $this->redirect(['action' => 'view', $input_itemid]);
        // $this->setAction('index');
    }

    /**
      * Loading method
      */
    public function loading()
    {
        $this->autoRender = false;

        try {
          if(!$this->request->is('ajax')) {
              throw new Exception("Not ajax request");
          }else{
              // 送られてきたリクエストデータを取得する
              $review_count = $this->request->getData('review_count');
              $item_id = $this->request->getData('item_id');

              // 必要な処理を実装していく
              $this->HuluReviews = TableRegistry::get('HuluReviews');
              $review = $this->HuluReviews->find()
                ->where(['item_id' => $item_id])
                ->join([
                        'table' => 'users',
                        'alias' => 'Users',
                        'type' => 'INNER',
                        'conditions' => 'HuluReviews.user_id = Users.id'
                ])
                ->select([
                        'id' => 'HuluReviews.id',
                        'name' => 'Users.name',
                        'rate' => 'HuluReviews.rate',
                        'review' => 'HuluReviews.review',
                        'item_id' => 'HuluReviews.item_id',
                        'created_t' => 'HuluReviews.created_t'
                ])
                ->order(['HuluReviews.created_t' => 'DESC'])
                ->limit(50)
                ->offset($review_count)
                ->toList();

              $this->response->body(json_encode($review));
              return;
          }
        } catch (\Exception $e) {
          // 例外に対する処理
          $code = $e->getCode(); // HTTPステータスコード
          $message = $e->getMessage(); // エラーメッセージ
          $this->log("code : ".$code." message : ".$message,'error');
        }
    }

    // /**
    //   * check method
    //   */
    // public function check()
    // {
    //     $this->autoRender = false;
    //     if(!$this->request->is('ajax')) {
    //         throw new Exception();
    //     }else{
    //         // 送られてきたリクエストデータを取得する
    //         $name = $this->request->getData('name');
    //         $cookie = $this->request->getCookie('usernameCookie');
    //
    //         if(empty($cookie)){
    //           $user = array();
    //         }else{
    //           $this->Users = TableRegistry::get('Users');
    //           $user = $this->Users->find()
    //             ->where(['name !=' => $cookie, 'name' => $name])
    //             ->toList();
    //
    //         }
    //         $this->Users = TableRegistry::get('Users');
    //         $user = $this->Users->find()
    //           ->where(['name !=' => $cookie, 'name' => $name])
    //           ->toList();
    //
    //         $this->response->body(json_encode($user));
    //         return;
    //     }
    // }
}
