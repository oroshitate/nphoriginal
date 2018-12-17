<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    /**
      * Initialize method
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('home');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Home index() start','info');

        $this->Threads = TableRegistry::get('Threads');
        $thread_list = $this->Threads->find()
          ->order(['created_t' => 'DESC'])
          ->limit(10)
          ->toList();

        foreach ($thread_list as $thread) {
            $thread->getCommentcount();
        }

        $this->News = TableRegistry::get('News');
        $news_list = $this->News->find()
          ->order(['created_t' => 'DESC'])
          ->limit(10);

        $this->Reviews = TableRegistry::get('Reviews');
        $review_list = $this->Reviews->find()
          ->order(['created_t' => 'DESC'])
          ->limit(10)
          ->toList();

        foreach ($review_list as $review) {
          $review->getReviewlist();
        }

        //viewに渡す変数セット
        $this->set(compact('thread_list','news_list','review_list'));
    }
}
