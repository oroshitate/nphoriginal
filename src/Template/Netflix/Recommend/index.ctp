<div class="inner">
  <div class="content">
    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>
    <ul class="nav nav-tabs">
      <li class="nav-item content-tab-li">
          <a href="#tab1" class="nav-link tab-li-nav text-center active" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "Recommend"; ?></span>
          </a>
      </li>
    </ul>

    <div class="tab-content content-tab">
      <div id="tab1" class="tab-pane content-tab1 active">
        <div class="content-tab1-title">
          <h1>Netflixオリジナル作品一覧(全<?php echo count($item_list); ?>件)</h1>
          <p>選択された作品と似た作品が表示されます</p>
        </div>
        <div class="content-tab1-table">
          <?= $this->Form->create(null, ['url' => ['controller' => '/Recommendlist', 'action' => 'index'], 'name' => 'recommend']) ?>
            <table class="table table-hover table-bordered" id="item-list-table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="text-nowrap">タイトル</th>
                  <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ジャンル&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;タグ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th scope="col" class="text-nowrap">公開年</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($item_list as $item): ?>
                <tr>
                  <td><span class="table-item-title" data-id=<?php echo $item["id"]; ?> data-genre=<?php echo $item["genre"]; ?> data-tag=<?php echo $item["tag"]; ?>><?php echo $item["title"]; ?></span></td>
                  <td><?php echo $item["genre"]; ?></td>
                  <td><?php echo $item["tag"]; ?></td>
                  <td><?php echo $item["released_t"]; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <?= $this->Form->hidden('item_id') ?>
            <?= $this->Form->hidden('genre') ?>
            <?= $this->Form->hidden('tag') ?>
          <?= $this->Form->end() ?>
        </div>
        <div class="modal"><i class="fas fa-spinner"></i></div>
      </div>
    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
