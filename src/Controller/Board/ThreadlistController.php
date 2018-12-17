<?php
namespace App\Controller\Board;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;

/**
 * Threadlist Controller
 *
 *
 * @method \App\Model\Entity\Threadlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThreadlistController extends AppController
{
    /**
      * Initialize method
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('board/threadlist');
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
      $this->log('Board/Threadlist index() start','info');

      $input_text = $this->request->getData('search-thread');

      if($input_text != ""){
          $this->Threads = TableRegistry::get('Threads');
          $thread_list = $this->Threads->find()
            ->contain(['Users' => function($q){
                return $q->select(['name']);
            }])
            ->where([
              'OR' =>[
                        ['title Like' => '%'.$input_text.'%'],
                        ['Users.name Like' => '%'.$input_text.'%'],
              ]
            ])
            ->order(['Threads.created_t' => 'DESC'])
            ->limit(50)
            ->toList();

      }else {
          $this->Threads = TableRegistry::get('Threads');
          $thread_list = $this->Threads->find()
            ->order(['created_t' => 'DESC'])
            ->limit(50)
            ->toList();
      }

      foreach ($thread_list as $thread) {
          $thread->getCommentcount();
      }

      $this->set(compact('thread_list'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->log('Board/Threadlist add() start','info');

        $input_title = $this->request->getData('title');
        $input_name = $this->request->getData('name');
        $input_comment = $this->request->getData('comment');

        if($input_name === ""){
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
            }else{
              $user_id = $user_list[0]["id"];
            }

            // バリデーションチェック
            // validationDefault()呼び出し
            $ThreadsTable = TableRegistry::get('Threads');
            $data = [
                      'user_id' => $user_id,
                      'title' => $input_title,
            ];
            $Thread = $ThreadsTable->newEntity($data);
            if ($Thread->errors()) {
                $this->log("error".serialize($Thread->errors()),'info');
                throw new \Exception("NetflixReviewsTable validation error");
            }
            // アプリケーションルールチェック
            // buildRules()呼び出し
            if ($ThreadsTable->save($Thread) == false) {
                throw new \Exception("ThreadsTable application rule error");
            }
            $thread_id = $Thread->id;

            $CommentsTable = TableRegistry::get('Comments');
            $data = [
                      'user_id' => $user_id,
                      'thread_id' => $thread_id,
                      'comment' => $input_comment,
            ];
            $Comment = $CommentsTable->newEntity($data);
            if ($Comment->errors()) {
                $this->log("error".serialize($Comment->errors()),'info');
                throw new \Exception("CommentsTable validation error");
            }
            if ($CommentsTable->save($Comment) == false) {
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

        return $this->redirect(['action' => 'index']);
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
              $thread_count = $this->request->getData('thread_count');
              $search_thread = $this->request->getData('search_thread');

              if($search_thread !== ""){
                $this->Threads = TableRegistry::get('Threads');
                $thread_list = $this->Threads->find()
                  ->contain(['Users' => function($q){
                      return $q->select(['name']);
                  }])
                  ->where([
                    'OR' =>[
                              ['title Like' => '%'.$search_thread.'%'],
                              ['Users.name Like' => '%'.$search_thread.'%'],
                    ]
                  ])
                  ->order(['Threads.created_t' => 'DESC'])
                  ->limit(50)
                  ->offset($thread_count)
                  ->toList();
              }else{
                // 必要な処理を実装していく
                $this->Threads = TableRegistry::get('Threads');
                $thread_list = $this->Threads->find()
                  ->contain(['Users' => function($q){
                      return $q->select(['name']);
                  }])
                  ->order(['Threads.created_t' => 'DESC'])
                  ->limit(50)
                  ->offset($thread_count)
                  ->toList();
              }

              $this->response->body(json_encode($thread_list));
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
