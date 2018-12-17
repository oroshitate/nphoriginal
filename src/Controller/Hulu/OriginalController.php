<?php

namespace App\Controller\Hulu;

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
        $this->viewBuilder()->setLayout('hulu/original');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      $this->log('Hulu/Original index() start','info');

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

        $this->HuluNewItems = TableRegistry::get('HuluNewItems');
        $new_item_list = $this->HuluNewItems->find();

        $this->HuluGitemmasters = TableRegistry::get('HuluGitemmasters');
        $genre_list = $this->HuluGitemmasters->find()
          ->select(['genre']);

        //viewに渡す変数セット
        $this->set(compact('nitem_class','item_class','new_item_list','genre_list'));
    }
}
