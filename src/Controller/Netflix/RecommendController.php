<?php
namespace App\Controller\Netflix;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Recommend Controller
 *
 *
 * @method \App\Model\Entity\Recommend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecommendController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
      parent::initialize();
      $this->viewBuilder()->setLayout('netflix/recommend');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Netflix/Recommend index() start', 'info');

        $this->NetflixItems = TableRegistry::get('NetflixItems');
        $item_list = $this->NetflixItems->find()
          ->toList();

        $this->set(compact('item_list'));
    }
}
