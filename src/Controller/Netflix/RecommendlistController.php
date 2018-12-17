<?php
namespace App\Controller\Netflix;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Recommendlist Controller
 *
 *
 * @method \App\Model\Entity\Recommendlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecommendlistController extends AppController
{
    /**
      * Initialize method
      */
    public function initialize()
    {
      parent::initialize();
      $this->viewBuilder()->setLayout('netflix/recommendlist');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->log('Netflix/Recommendlist index() start', 'info');

        $input_itemid = $this->request->getData('item_id');
        $input_genre = $this->request->getData('genre');
        $input_tag = $this->request->getData('tag');


        $input_genre_list = explode(",", $input_genre);
        $input_tag_list = explode(",", $input_tag);

        $genre_null = array_search("", $input_genre_list);
        if($genre_null > 0){
            unset($input_genre_list[$genre_null]);
        }

        $tag_null = array_search("", $input_tag_list);
        if($tag_null > 0){
            unset($input_tag_list[$tag_null]);
        }

        if(count($input_genre_list) > 5){
          array_splice($input_genre_list, 5);
        }

        if(count($input_tag_list) > 5){
          array_splice($input_tag_list, 5);
        }

        $this->NetflixItems = TableRegistry::get('NetflixItems');
        $this->item_list = $this->NetflixItems->find()
          ->where(['id !=' => $input_itemid])
          ->toList();

        $recommend_list = [];
        $genre_recommend_list = $this->setGenreRecommendlist($input_genre_list);
        if(count($genre_recommend_list) <= 30 || $input_tag_list[0] == ""){
          $recommend_list = $genre_recommend_list;
        }else{
          $tag_recommend_list = $this->setTagRecommendlist($input_tag_list, $genre_recommend_list);
          $recommend_list = $tag_recommend_list;
        }

        $this->set(compact('recommend_list'));
    }
    /**
     * setGenreRecommendlist method
     * @param $input_genre_list 選択したアイテムのジャンルリスト
     * @return $recommend_list 絞り込みアイテムリスト
     */
    private function setGenreRecommendlist($input_genre_list){
      $genre_count_list = [];
      foreach ($input_genre_list as $g_key => $genre) {
        foreach ($this->item_list as $i_key => $item) {
          if(strpos($item["genre"],$input_genre_list[$g_key]) !== false){
              $item["genre_count"] += 1;
          }
        }
      }

      for ($i=1; $i<count($input_genre_list) + 1; $i++) {
          $genre_count_list[$i] = [];
          foreach ($this->item_list as $i_key => $item) {
              if($i == $item["genre_count"]){
                  array_push($genre_count_list[$i], $item);
              }
          }

          if($i == count($input_genre_list)){
            if(count($genre_count_list[$i]) > 30){
              $recommend_list = $genre_count_list[$i];
              return $recommend_list;
            }elseif(count($genre_count_list[$i]) != 0 && count($genre_count_list[$i]) <= 30){
              $recommend_list = $genre_count_list[$i];
              return $recommend_list;
            }elseif (count($genre_count_list[$i-1]) > 30) {
              $recommend_list = $genre_count_list[$i-1];
              return $recommend_list;
            }elseif (count($genre_count_list[$i]) == 0 && count($genre_count_list[$i-1]) != 0 && count($genre_count_list[$i-1] <= 30)) {
              $recommend_list = $genre_count_list[$i-1];
              return $recommend_list;
            }elseif (count($genre_count_list[$i-2]) > 30) {
              $recommend_list = $genre_count_list[$i-2];
              return $recommend_list;
            }elseif (count($genre_count_list[$i-1]) == 0 && count($genre_count_list[$i-2]) != 0 && count($genre_count_list[$i-2] <= 30)) {
              $recommend_list = $genre_count_list[$i-2];
              return $recommend_list;
            }
          }
      }
    }

    /**
     * setTagRecommendlist method
     * @param $input_genre_list 選択したアイテムのジャンルリスト
     * @param $genre_recommend_list ジャンル絞り込みアイテムリスト
     * @return $recommend_list 絞り込みアイテムリスト
     */
    private function setTagRecommendlist($input_tag_list,$genre_recommend_list){
      $tag_count_list = [];
      for ($i=0; $i<count($input_tag_list); $i++) {
        foreach ($genre_recommend_list as $gr_key => $gr_item) {
            if(strpos($gr_item["tag"],$input_tag_list[$i]) != false){
                $gr_item["tag_count"] += 1;
            }
        }
      }

      for ($i=0; $i<count($input_tag_list); $i++) {
          $tag_count_list[$i] = [];
          foreach ($this->item_list as $i_key => $item) {
              if($i == $item["tag_count"]){
                  array_push($tag_count_list[$i], $item);
              }
          }

          if($i == count($input_tag_list)-1){
            if(count($tag_count_list[$i]) > 30){
              $recommend_list = $tag_count_list[$i];
              return $recommend_list;
            }elseif(count($tag_count_list[$i]) != 0 && count($tag_count_list[$i]) <= 30){
              $recommend_list = $tag_count_list[$i];
              return $recommend_list;
            }elseif(count($tag_count_list[$i-1]) > 30){
              $recommend_list = $tag_count_list[$i-1];
              return $recommend_list;
            }elseif (count($tag_count_list[$i]) == 0 && count($tag_count_list[$i]) != 0 && count($tag_count_list[$i-1] <= 30)) {
              $recommend_list = $count_list[$i-1];
              return $recommend_list;
            }elseif(count($tag_count_list[$i-2]) > 30){
              $recommend_list = $tag_count_list[$i-2];
              return $recommend_list;
            }elseif (count($tag_count_list[$i-1]) == 0 && count($tag_count_list[$i]) != 0 && count($tag_count_list[$i-2] <= 30)) {
              $recommend_list = $tag_count_list[$i-2];
              return $recommend_list;
            }
          }
      }
    }
}
