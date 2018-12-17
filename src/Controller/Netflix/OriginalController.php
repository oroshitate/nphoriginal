<?php

namespace App\Controller\Netflix;

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
        $this->viewBuilder()->setLayout('netflix/original');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      $this->log('Netflix/Original index() start','info');

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

        //t_n_new_itemテーブルからデータ取得
        $this->NetflixNewItems = TableRegistry::get('NetflixNewItems');
        $new_item_list = $this->NetflixNewItems->find();

          //t_n_itemmaster_gテーブルからデータ取得
        $this->NetflixGitemmasters = TableRegistry::get('NetflixGitemmasters');
        $genres = $this->NetflixGitemmasters->find()
          ->select(['genre']);

        $genre_list = [];
        $genre_list["国内"] = [];
        $genre_list["海外"] = [];
        $genre_list["SF"] = [];
        $genre_list["アクション"] = [];
        $genre_list["コメディ"] = [];
        $genre_list["サスペンス"] = [];
        $genre_list["ホラー"] = [];
        $genre_list["ラブロマンス"] = [];
        $genre_list["ヒューマンドラマ"] = [];
        $genre_list["ドキュメンタリー"] = [];
        $genre_list["アニメ"] = [];
        $genre_list["受賞"] = [];
        $genre_list["その他"] = [];
        foreach ($genres as $genre) {
          if(strpos($genre->genre,'国内') !== false){
              array_push($genre_list["国内"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'海外') !== false){
              array_push($genre_list["海外"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'SF') !== false){
              array_push($genre_list["SF"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'アクション') !== false){
              array_push($genre_list["アクション"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'コメディ') !== false){
              array_push($genre_list["コメディ"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'サスペンス') !== false){
              array_push($genre_list["サスペンス"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'ホラー') !== false){
              array_push($genre_list["ホラー"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'ラブ') !== false){
              array_push($genre_list["ラブロマンス"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'ヒューマンドラマ') !== false){
              array_push($genre_list["ヒューマンドラマ"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'ドキュメンタリー') !== false){
              array_push($genre_list['ドキュメンタリー'], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'アニメ') !== false){
              array_push($genre_list["アニメ"], $genre->genre);
              continue;
          }elseif(strpos($genre->genre,'受賞') !== false){
              array_push($genre_list["受賞"], $genre->genre);
              continue;
          }else{
              array_push($genre_list['その他'], $genre->genre);
              continue;
          }
        }

        //t_n_itemmaster_tテーブルからデータ取得
        $this->NetflixTitemmasters = TableRegistry::get('NetflixTitemmasters');
        $tag_list = $this->NetflixTitemmasters->find()
          ->select(['tag']);

        //viewに渡す変数セット
        $this->set(compact('nitem_class','item_class','new_item_list','genre_list','tag_list'));
    }
}
