<?php

namespace App\Controller\Prime;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Oroginal Controller
 *
 *
 * @method \App\Model\Entity\Original[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OriginalController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('prime/original');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      $this->log('Prime/Original index() start','info');

        if($this->request->getData('original') != null){
          $input_active_tab = $this->request->getData('original');
          if($input_active_tab == "item"){
              $nitem_class = "";
              $item_class = "active";
          }else{
              $nitem_class = "active";
              $item_class = "";
          }
        }else{
          $nitem_class = "";
          $item_class = "active";
        }

        $this->PrimeNewItems = TableRegistry::get('PrimeNewItems');
        $new_item_list = $this->PrimeNewItems->find();

        $this->PrimeGitemmasters = TableRegistry::get('PrimeGitemmasters');
        $genre_list = $this->PrimeGitemmasters->find()
          ->select(['genre']);

        $this->PrimeCitemmasters = TableRegistry::get('PrimeCitemmasters');
        $content_list = $this->PrimeCitemmasters->find()
          ->select(['content']);

        //viewに渡す変数セット
        $this->set(compact('nitem_class','item_class','new_item_list','genre_list','content_list'));
    }
}
