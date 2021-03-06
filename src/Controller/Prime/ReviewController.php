<?php
namespace App\Controller\Prime;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;

/**
 * Review Controller
 *
 *
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
      parent::initialize();
      $this->viewBuilder()->setLayout('prime/review');
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
        $this->log('Prime/Review index() start','info');

        if($this->request->getData('review') != null){
          $input_active_tab = $this->request->getData('review');
          if($input_active_tab == "review"){
              $review_class = "active";
              $review_list_class = "";
          }else{
              $review_class = "";
              $review_list_class = "active";
          }
        }else{
          $review_class = "";
          $review_list_class = "active";
        }

        $input_text = $this->request->getData('search-review');

        if($input_text != ""){
          $this->PrimeReviews = TableRegistry::get('PrimeReviews');
          $review_list = $this->PrimeReviews->find()
            ->contain(['Users' => function($q){
                return $q->select(['id', 'name']);
            }])
            ->contain(['PrimeItems' => function($q){
                return $q->select(['id', 'title']);
            }])
            ->where([
                'OR' => [
                  ['PrimeReviews.review Like' => '%'.$input_text.'%'],
                  ['Users.name Like' => '%'.$input_text.'%'],
                  ['PrimeItems.title Like' => '%'.$input_text.'%'],
                ]
            ])
            ->order(['PrimeReviews.created_t' => 'DESC'])
            ->limit(50)
            ->toList();
        } else {
            $this->PrimeReviews = TableRegistry::get('PrimeReviews');
            $review_list = $this->PrimeReviews->find()
              ->contain(['Users' => function($q){
                  return $q->select(['id', 'name']);
              }])
              ->contain(['PrimeItems' => function($q){
                  return $q->select(['id', 'title']);
              }])
              ->order(['PrimeReviews.created_t' => 'DESC'])
              ->limit(50);
        }

        $this->PrimeItems = TableRegistry::get('PrimeItems');
          $item_list = $this->PrimeItems->find()
            ->toList();

        $this->set(compact('review_list_class','review_class','item_list','review_list'));
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
              $search_review = $this->request->getData('search_review');

              if($search_review !== ""){
                $this->PrimeReviews = TableRegistry::get('PrimeReviews');
                $review_list = $this->PrimeReviews->find()
                  ->contain(['Users' => function($q){
                      return $q->select(['id', 'name']);
                  }])
                  ->contain(['PrimeItems' => function($q){
                      return $q->select(['id', 'title']);
                  }])
                  ->where([
                      'OR' => [
                        ['PrimeReviews.review Like' => '%'.$search_review.'%'],
                        ['Users.name Like' => '%'.$search_review.'%'],
                        ['PrimeItems.title Like' => '%'.$search_review.'%'],
                      ]
                  ])
                  ->order(['PrimeReviews.created_t' => 'DESC'])
                  ->limit(50)
                  ->offset($review_count)
                  ->toList();
              }else{
                  // 必要な処理を実装していく
                  $this->PrimeReviews = TableRegistry::get('PrimeReviews');
                  $review_list = $this->PrimeReviews->find()
                    ->contain(['Users' => function($q){
                        return $q->select(['id', 'name']);
                    }])
                    ->contain(['PrimeItems' => function($q){
                        return $q->select(['id', 'title']);
                    }])
                    ->order(['PrimeReviews.created_t' => 'DESC'])
                    ->limit(50)
                    ->offset($review_count)
                    ->toList();
                }

              $this->response->body(json_encode($review_list));
              return;
          }
        } catch (\Exception $e) {
          // 例外に対する処理
          $code = $e->getCode(); // HTTPステータスコード
          $message = $e->getMessage(); // エラーメッセージ
          $this->log("code : ".$code." message : ".$message,'error');

          // InternalServerError メッセージを渡せる
          // throw new InternalErrorException(__(''));
          // NotFoundError メッセージを渡せる
          // throw new NotFoundException(__('Can not insert datas'));
        }
    }
}
