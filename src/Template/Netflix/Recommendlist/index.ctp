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
      <div id="tab1" class="tab-pane active content-tab1">
        <div class="content-tab1-title">
          <h1>おすすめ一覧(全<?php echo count($recommend_list); ?>件)</h1>
        </div>
        <div class="content-tab1-table">
        <?= $this->Form->create(null, ['url' => ['controller' => '/Item', 'action' => 'index'], 'name' => 'item']) ?>
        <table id="recommend-list-table" class="table table-hover table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;タイトル&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th scope="col" class="text-nowrap">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                あらすじ
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </th>
              <th scope="col" class="text-nowrap">公開日</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($recommend_list as $recommend): ?>
            <tr>
              <td><?= $this->Html->link($recommend["title"], ['controller'=>'Item', 'action'=>'view', 'id' => $recommend["id"]], ['class'=>'table-item-title']); ?></td>
              <td><?php echo $recommend["story"]; ?></td>
              <td><?php echo $recommend["released_t"]; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?= $this->Form->hidden('item_id') ?>
        <?= $this->Form->end() ?>
        </div>
      </div>

    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
