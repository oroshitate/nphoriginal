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

      <div id="tab2" class="tab-pane content-tab2">
        <?php foreach($item as $i): ?>
        <div class="content-tab2-title" data-itemid=<?php echo $i["id"]; ?>>
          <h1><?php echo $i["title"]; ?></h1>
          <div id="avg-review-rate" data-rate=<?php echo $avg[0]["avg"]; ?>></div>
        </div>
          <div class="content-tab2-elements">
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>あらすじ</span>
                  </div>
                  <div class="tab2-topic-element">
                      <span><?php echo $i["story"]; ?></span>
                  </div>
              </div>
              <?php if($i["genre"] !== null):
                  $genre = explode(",", $i["genre"]);
              ?>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>ジャンル</span>
                  </div>
                  <?php foreach($genre as $g): ?>
                  <div class="tab2-topic-element">
                      <button type="button" class="btn btn-secondary"><?php echo $g; ?></button>
                  </div>
                  <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <?php if($i["tags"] !== null):
                  $tags = explode(",", $i["tags"]);
              ?>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>タグ</span>
                  </div>
                  <?php foreach($tags as $t): ?>
                  <div class="tab2-topic-element">
                      <button type="button" class="btn btn-secondary"><?php echo $t; ?></button>
                  </div>
                  <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>出演</span>
                  </div>
                  <div class="tab2-topic-element">
                      <span><?php echo $i["actors"]; ?></span>
                  </div>
              </div>
              <?php if($i["directors"] !== null): ?>
                  <div class="content-tab2-element">
                      <div class="content-tab2-topic">
                          <span>監督</span>
                      </div>
                      <div class="tab2-topic-element">
                          <span><?php echo $i["directors"]; ?></span>
                      </div>
                  </div>
              <?php endif; ?>
              <?php if($i["creators"] !== null): ?>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>製作</span>
                  </div>
                  <div class="tab2-topic-element">
                      <span><?php echo $i["creators"]; ?></span>
                  </div>
              </div>
              <?php endif; ?>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>公開年</span>
                  </div>
                  <div class="tab2-topic-element">
                      <span><?php echo $i["released_t"]; ?></span>
                  </div>
              </div>
              <div class="content-tab2-element">
                  <div class="content-tab2-topic">
                      <span>上映時間/シーズン数</span>
                  </div>
                  <div class="tab2-topic-element">
                      <span><?php echo $i["duration"]; ?></span>
                  </div>
              </div>
          </div>
          <div id="item-review-count"><span>レビュー全<?php echo $count[0]["count"]; ?>件</span></div>
        <?php endforeach; ?>

          <div class="content-review">
            <ul id="review" class="list-group target-area review-list">
              <?php foreach($review as $r): ?>
              <li class="list-group-item review-list-item">
                <div class="review-rate" id=<?php echo "review-rate".$r["id"]; ?> data-rate=<?php echo $r["rate"]; ?> data-id=<?php echo $r["id"]; ?>>
                </div>
                <p><?php echo $r["name"]; ?></p>
                <pre><?php echo $r["review"]; ?></pre>
                <p><?php echo $r["created_t"]; ?></p>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="footer">
            <div class="footer-insert-review">
              <span>レビューを書き込む</span>
            </div>
            <div class="footer-parent">
              <?= $this->Form->create(null, ['url' => ['controller' => '/Item', 'action' => 'add'], 'name' => 'review']) ?>
              <button type="button" class="btn btn-secondary footer-btn-close">
                  <i class="fas fa-times"></i>
              </button>
              <div class="footer-rate">
                <div class="how-rate"></div>
              </div>
              <div class="footer-name">
                <?= $this->Form->text('name', ['placeholder' => '名前']) ?>
              </div>
              <div class="footer-review">
              <?= $this->Form->textarea('review', ['id'=>'input_review', 'placeholder' => '感想']) ?>
              </div>
              <div class="footer-btn">
                <?= $this->Form->button('レビュー',['type' => 'button', 'class' => 'btn btn-secondary footer-btn-submit', 'data-itemid' => $item_id]) ?>
              </div>
              <?= $this->Form->hidden('item_id') ?>
              <?= $this->Form->hidden('rate') ?>
              <?= $this->Form->end() ?>
            </div>
          </div>
      </div>
    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
