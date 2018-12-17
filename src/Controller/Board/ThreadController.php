<?php
namespace App\Controller\Board;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;

/**
 * Thread Controller
 *
 *
 * @method \App\Model\Entity\Thread[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThreadController extends AppController
{
    /**
      * Initialize method
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('board/thread');
    }

    /**
      * beforeFilter method
      */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if (in_array($this->request->action, ['loading']) || in_array($this->request->action, ['add'])) {
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
    public function view($thread_id = null)
    {
      $this->log('Board/Thread view() start','info');

      $this->Threads = TableRegistry::get('Threads');
      $thread = $this->Threads->find()
        ->contain(['Users' => function($q){
            return $q->select(['name']);
        }])
        ->where(['Threads.id' => $thread_id])
        ->order(['Threads.created_t' => 'DESC'])
        ->toList();

      $this->Comments = TableRegistry::get('Comments');
      $count = $this->Comments->find()
        ->where(['thread_id' => $thread_id])
        ->count();

      $comment_list = $this->Comments->find()
        ->contain(['Users' => function($q){
            return $q->select(['name']);
        }])
        ->where(['Comments.thread_id' => $thread_id])
        ->order(['Comments.created_t' => 'ASC'])
        ->toList();

      $this->set(compact('thread','count','comment_list'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|void
     */
    public function add()
    {
      $this->log('Board/Thread add() start','info');
      $this->autoRender = false;

      if(!$this->request->is('ajax')) {
          throw new Exception();
      }else{
          // 送られてきたリクエストデータを取得する
          $thread_id = $this->request->getData('thread_id');
          $name = $this->request->getData('name');
          $comment = $this->request->getData('comment');
          $comment_count = $this->request->getData('comment_count');
          if($name === ""){
            $name = "anonymous";
          }

          try{
              $UsersTable = TableRegistry::get('Users');
              $user_list = $UsersTable->find()
                ->select(['id'])
                ->where(['name' => $name])
                ->toList();

              if(count($user_list) == 0){
                $User = $UsersTable->newEntity();
                $User->name = $name;
                if ($UsersTable->save($User) == false) {
                    throw new \Exception("UsersTable application error");
                }
                $user_id = $User->id;
              }else{
                $user_id = $user_list[0]["id"];
              }

              $CommentsTable = TableRegistry::get('Comments');
              $data = [
                        'user_id' => $user_id,
                        'thread_id' => $thread_id,
                        'comment' => $comment,
              ];
              $Comment = $CommentsTable->newEntity($data);
              if ($Comment->errors()) {
                  $this->log("error".serialize($Comment->errors()),'info');
                  throw new \Exception("CommentsTable validation error");
              }
              if ($CommentsTable->save($Comment) == false) {
                  throw new \Exception("ReviewsTable application error");
              }

              $new_comment_list = $CommentsTable->find()
                ->contain(['Users' => function($q){
                    return $q->select(['name']);
                }])
                ->where(['Comments.thread_id' => $thread_id])
                ->order(['Comments.created_t' => 'ASC'])
                ->limit(100)
                ->offset($comment_count)
                ->toList();

                $this->response->body(json_encode($new_comment_list));
                return;
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
      }
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
              $thread_id = $this->request->getData('thread_id');
              $comment_count = $this->request->getData('comment_count');

              // 必要な処理を実装していく
              $this->Comments = TableRegistry::get('Comments');
              $comment_list = $this->Comments->find()
                ->contain(['Users' => function($q){
                    return $q->select(['name']);
                }])
                ->where(['thread_id' => $thread_id])
                ->order(['Comments.created_t' => 'ASC'])
                ->limit(100)
                ->offset($comment_count)
                ->toList();

              $this->response->body(json_encode($comment_list));
              return;
          }
        }catch (\Exception $e) {
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
