<?php
namespace App\Controller\Netflix;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Itemlist Controller
 *
 *
 * @method \App\Model\Entity\Itemlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemlistController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('netflix/itemlist');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Netflix/Itemlist index() start','info');

        $input_genre = $this->request->getData('select-genre');
        $input_tag = $this->request->getData('select-tag');
        $input_genre_list = [];
        $input_tag_list = [];

        if($input_genre != null){
          $input_genre_list = explode(",", $input_genre);
        }
        if($input_tag != null){
          $input_tag_list = explode(",", $input_tag);
        }

        //t_n_new_itemテーブルからデータ取得
        $this->NetflixNewItems = TableRegistry::get('NetflixNewItems');
        $new_item_list = $this->NetflixNewItems->find();

        $this->NetflixItems = TableRegistry::get('NetflixItems');
        if($input_genre == null && $input_tag == null){
          //t_n_itemテーブルからデータ取得
          $item_list = $this->NetflixItems->find()
            ->toList();
        }else{
          $item_mixed = [];
          $item_list = [];
          $item_g = [];
          $item_t = [];
          $genre_count = count($input_genre_list);
          $tag_count = count($input_tag_list);
          $items = $this->NetflixItems->find()
            ->toList();
          if($genre_count != 0 and $tag_count != 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $genre_count; $i++){
                if(strpos($item["genre"],$input_genre_list[$i]) !== false){
                    array_push($item_g,$item);
                }
              }
            }

            $item_mixed = $item_g;

            foreach ($items as $key => $item) {
              for($i=0; $i < $tag_count; $i++){
                if(strpos($item["tag"],$input_tag_list[$i]) !== false){
                  array_push($item_t,$item);
                }
              }
            }

            foreach ($item_t as $key_t => $it) {
              foreach ($item_mixed as $key_m => $im) {
                if($im[$key_m]["genre"] != $it[$key_t]["genre"]){
                  if($key_m == count($im)-1){
                    array_push($item_mixed,$it[$key_t]);
                  }
                }else{
                  break;
                }
              }
            }

            $item_list = $item_mixed;
          }elseif($genre_count != 0 and $tag_count == 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $genre_count; $i++){
                if(strpos($item["genre"],$input_genre_list[$i]) !== false){
                    array_push($item_list,$item);
                }
              }
            }
          }elseif($genre_count == 0 and $tag_count != 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $tag_count; $i++){
                if(strpos($item["tag"],$input_tag_list[$i]) !== false){
                    array_push($item_list,$item);
                }
              }
            }
          }
        }

        $this->set(compact('new_item_list','input_genre_list','input_tag_list','item_list'));
    }
}
