<?php
namespace App\Controller\Prime;

use App\Controller\AppController;

/**
 * About Controller
 *
 *
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('prime/about');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Prime/About index() start','info');
        $this->set(compact('prime/about'));
    }
}
