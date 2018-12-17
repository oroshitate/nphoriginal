<?php
namespace App\Controller\Prime;

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
        $this->viewBuilder()->setLayout('prime/itemlist');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Prime/Itemlist index() start','info');

        $input_genre = $this->request->getData('select-genre');
        $input_content = $this->request->getData('select-content');
        $input_genre_list = [];
        $input_content_list = [];

        if($input_genre != null){
          $input_genre_list = explode(",", $input_genre);
        }
        if($input_content != null){
          $input_content_list = explode(",", $input_content);
        }

        //t_n_new_itemテーブルからデータ取得
        $this->PrimeNewItems = TableRegistry::get('PrimeNewItems');
        $new_item_list = $this->PrimeNewItems->find();

        $this->PrimeItems = TableRegistry::get('PrimeItems');
        if($input_genre == null && $input_content == null){
          //t_n_itemテーブルからデータ取得
          $item_list = $this->PrimeItems->find()
            ->toList();
        }else{
          $item_mixed = [];
          $item_list = [];
          $item_g = [];
          $item_c = [];
          $genre_count = count($input_genre_list);
          $content_count = count($input_content_list);
          $items = $this->PrimeItems->find()
            ->toList();
          if($genre_count != 0 and $content_count != 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $genre_count; $i++){
                if(strpos($item["genre"],$input_genre_list[$i]) !== false){
                    array_push($item_g,$item);
                }
              }
            }

            $item_mixed = $item_g;

            foreach ($items as $key => $item) {
              for($i=0; $i < $content_count; $i++){
                if(strpos($item["content"],$input_content_list[$i]) !== false){
                  array_push($item_c,$item);
                }
              }
            }

            foreach ($item_c as $key_c => $ic) {
              foreach ($item_mixed as $key_m => $im) {
                if($im[$key_m]["genre"] != $ic[$key_c]["genre"]){
                  if($key_m == count($im)-1){
                    array_push($item_mixed,$ic[$key_c]);
                  }
                }else{
                  break;
                }
              }
            }

            $item_list = $item_mixed;
          }elseif($genre_count != 0 and $content_count == 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $genre_count; $i++){
                if(strpos($item["genre"],$input_genre_list[$i]) !== false){
                    array_push($item_list,$item);
                }
              }
            }
          }elseif($genre_count == 0 and $content_count != 0){
            foreach ($items as $key => $item) {
              for($i=0; $i < $content_count; $i++){
                if(strpos($item["content"],$input_content_list[$i]) !== false){
                    array_push($item_list,$item);
                }
              }
            }
          }
        }

        $this->set(compact('new_item_list','input_genre_list','input_content_list','item_list'));
    }
}
