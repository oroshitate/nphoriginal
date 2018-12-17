<?php
namespace App\Controller\Hulu;

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
        $this->viewBuilder()->setLayout('hulu/itemlist');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Hulu/Itemlist index() start','info');

        $input_genre = $this->request->getData('select-genre');
        $input_genre_list = [];

        if($input_genre != null){
          $input_genre_list = explode(",", $input_genre);
        }

        $this->HuluNewItems = TableRegistry::get('HuluNewItems');
        $new_item_list = $this->HuluNewItems->find();

        $this->HuluItems = TableRegistry::get('HuluItems');
        if($input_genre == null){
          $item_list = $this->HuluItems->find()
            ->toList();
        }else{
          $item_list = [];
          $item_g = [];
          $genre_count = count($input_genre_list);
          $items = $this->HuluItems->find()
            ->toList();

          foreach ($items as $key => $item) {
            for($i=0; $i < $genre_count; $i++){
              if(strpos($item["genre"],$input_genre_list[$i]) !== false){
                  array_push($item_g,$item);
              }
            }
          }

          $item_list = $item_g;
        }

        $this->set(compact('new_item_list','input_genre_list','input_tag_list','item_list'));
    }
}
