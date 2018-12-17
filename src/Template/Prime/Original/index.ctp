<div class="inner">
  <div class="content">
    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>
    <ul class="nav nav-tabs">
      <li class="nav-item content-tab-li">
          <a href="#tab1" class="nav-link tab-li-nav text-center <?= $nitem_class; ?>" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "New item"; ?></span>
          </a>
      </li>
      <li class="nav-item content-tab-li">
          <a href="#tab2" class="nav-link tab-li-nav text-center <?= $item_class; ?>" data-toggle="tab">
              <span class="font-weight-bold"><?php echo "Item"; ?></span>
          </a>
      </li>
    </ul>

    <div class="tab-content content-tab">
      <div id="tab1" class="tab-pane content-tab1 <?= $nitem_class; ?>">
          <div class="content-tab1-title">
              <h1>新着オリジナル作品一覧</h1>
          </div>
          <div class="content-tab1-table">
            <table class="table table-hover table-bordered" id="new-item-list-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-nowrap">配信日</th>
                        <th scope="col" class="text-nowrap">タイトル</th>
                        <th scope="col" class="text-nowrap">シーズン</th>
                        <th scope="col" class="text-nowrap">コンテンツ</th>
                        <th scope="col" class="text-nowrap">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          あらすじ
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th>
                        <th scope="col" class="text-nowrap">出演</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($new_item_list as $new_item): ?>
                    <tr>
                        <td><?php echo $new_item["released_t"]; ?></td>
                        <td><?php echo $new_item["title"]; ?></td>
                        <td><?php echo $new_item["duration"]; ?></td>
                        <td><?php echo $new_item["content"]; ?></td>
                        <td><?php echo $new_item["story"]; ?></td>
                        <td><?php echo $new_item["actors"]; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
          </div>
      </div>

      <div id="tab2" class="tab-pane content-tab2 <?= $item_class; ?>">
        <div class="content-tab2-title">
          <h1>検索条件一覧</h1>
        </div>
        <div class="content-tab2-elements">
        <div class="content-tab2-element">
          <p>コンテンツ</p>
          <?php foreach($content_list as $content): ?>
              <button type="button" class="btn btn-outline-secondary contents" data-cname=<?php echo $content["content"]; ?>><span><?php echo $content["content"]; ?></span></button>
          <?php endforeach; ?>
        </div>
        <div class="content-tab2-element">
          <p>ジャンル</p>
          <?php foreach($genre_list as $genre): ?>
              <button type="button" class="btn btn-outline-secondary genre" data-gname=<?php echo $genre["genre"]; ?>><span><?php echo $genre["genre"]; ?></span></button>
          <?php endforeach; ?>
        </div>
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => '/Itemlist', 'action' => 'index']]) ?>
          <div class="list-show">
              <?= $this->Form->button('一覧表示',['type' => 'submit', 'class' => 'btn btn-secondary list-show-btn']) ?>
              <?= $this->Form->button('条件検索',['type' => 'submit', 'id' => 'condition-search','class' => 'btn btn-secondary list-show-btn']) ?>
          </div>
          <?= $this->Form->hidden('select-genre',['id' => 'select-genre']) ?>
          <?= $this->Form->hidden('select-content',['id' => 'select-content']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
