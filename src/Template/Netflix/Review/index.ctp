<div class="inner">
  <div class="content">
    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>
    <ul class="nav nav-tabs">
      <li class="nav-item content-tab-li">
          <a href="#tab1" class="nav-link tab-li-nav text-center <?php echo $review_list_class; ?>" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "Review list"; ?></span>
          </a>
      </li>
      <li class="nav-item content-tab-li">
          <a href="#tab2" class="nav-link tab-li-nav text-center <?php echo $review_class; ?>" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "Review"; ?></span>
          </a>
      </li>
    </ul>

    <div class="tab-content content-tab">
      <div id="tab1" class="tab-pane content-tab1 <?php echo $review_list_class; ?>">
          <div class="content-tab1-title">
              <h1>レビュー一覧</h1>
          </div>
          <div class="review-search-box">
              <?= $this->Form->create('null',['url' => ['controller' => '/Review', 'action' => 'index']]) ?>
                  <?= $this->Form->text('search-review') ?>
                  <?= $this->Form->button('検索', ['class' => 'btn btn-secondary search-review-btn-submit']) ?>
                  <?= $this->Form->button('一覧', ['class' => 'btn btn-secondary list-btn-submit']) ?>
              <?= $this->Form->end() ?>
          </div>

          <ul id="review-list" class="list-group target-area">
          <?php foreach($review_list as $review): ?>
              <li class="list-group-item target-review review-list-item">
                    <p><?= $this->Html->link($review["netflix_item"]["title"], ['controller'=>'Item', 'action'=>'view', 'id' => $review["item_id"]], ['class'=>'review-title']); ?></p>
                    <div class="review-rate" id=<?php echo "review-rate".$review["id"]; ?> data-rate=<?php echo $review["rate"]; ?> data-id=<?php echo $review["id"]; ?>>
                    </div>
                    <p class="review-name"><?php echo $review["user"]["name"]; ?></p>
                    <pre><?php echo $review["review"]; ?></pre>
                    <p class="review-created"><?php echo $review["created_t"]; ?></p>
              </li>
          <?php endforeach; ?>
          </ul>
      </div>

      <div id="tab2" class="tab-pane content-tab2 <?php echo $review_class; ?>">
        <div class="content-tab2-title">
          <h1>Netflixオリジナル作品一覧(全<?php echo count($item_list); ?>件)</h1>
          <p>レビューする作品を選んでください</p>
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
