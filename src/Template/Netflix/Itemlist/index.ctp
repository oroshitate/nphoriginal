<div class="inner">
  <div class="content">
    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>
    <ul class="nav nav-tabs">
      <li class="nav-item content-tab-li">
          <a href="#tab1" class="nav-link tab-li-nav text-center" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "New item"; ?></span>
          </a>
      </li>
      <li class="nav-item content-tab-li">
          <a href="#tab2" class="nav-link tab-li-nav text-center active" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "Item"; ?></span>
          </a>
      </li>
    </ul>

    <div class="tab-content content-tab">
      <div id="tab1" class="tab-pane content-tab1">
          <div class="content-tab1-title">
              <h1>新着オリジナル作品一覧</h1>
          </div>
          <div class="content-tab1-table">
            <table class="table table-hover table-bordered" id="new-item-list-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-nowrap">配信日</th>
                        <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;タイトル&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th scope="col" class="text-nowrap">シーズン</th>
                        <th scope="col" class="text-nowrap">カテゴリー</th>
                        <th scope="col" class="text-nowrap">配給</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($new_item_list as $new_item): ?>
                    <tr>
                        <td><?php echo $new_item["released_t"]; ?></td>
                        <td><?php echo $new_item["title"]; ?></td>
                        <td><?php echo $new_item["duration"]; ?></td>
                        <td><?php echo $new_item["category"]; ?></td>
                        <td><?php echo $new_item["distribution"]; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
          </div>
      </div>

      <div id="tab2" class="tab-pane active content-tab2">
        <div class="content-tab2-title">
          <h1>Netflixオリジナル作品一覧(全<?php echo count($item_list) ?>件)</h1>
        </div>
        <div class="content-tab2-elements">
        <?php if(!empty($input_genre_list)): ?>
        <div class="content-tab2-element">
          <p>ジャンル</p>
          <?php for($i=0; $i<count($input_genre_list); $i++): ?>
              <button type="button" class="btn btn-secondary"><?php echo $input_genre_list[$i]; ?></button>
          <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($input_tag_list)): ?>
        <div class="content-tab2-element">
          <p>タグ</p>
          <?php for($j=0; $j<count($input_tag_list); $j++): ?>
              <button type="button" class="btn btn-secondary"><?php echo $input_tag_list[$j]; ?></button>
          <?php endfor; ?>
        </div>
        <?php endif; ?>
        </div>

        <div class="content-tab2-table">
        <table class="table table-hover table-bordered" id="item-list-table">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;タイトル&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ジャンル&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;タグ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th scope="col" class="text-nowrap">公開年</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($item_list as $item): ?>
            <tr>
              <td><?= $this->Html->link($item["title"], ['controller'=>'Item', 'action'=>'view', 'id' => $item["id"]], ['class'=>'table-item-title']); ?></td>
              <td><?php echo $item["genre"]; ?></td>
              <td><?php echo $item["tag"]; ?></td>
              <td><?php echo $item["released_t"]; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
