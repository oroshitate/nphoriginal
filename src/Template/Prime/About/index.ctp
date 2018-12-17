<div class="content">
<div class="content-ad-top"><?= $this->element('google_adsense') ?></div>
<ul class="nav nav-tabs">
  <li class="nav-item content-tab-li">
      <a href="#tab1" class="nav-link tab-li-nav text-center active" data-toggle="tab">
          <span class="font-weight-bold"><?php echo "Original"; ?></span>
      </a>
  </li>
  <li class="nav-item content-tab-li">
      <a href="#tab2" class="nav-link tab-li-nav text-center" data-toggle="tab">
          <span class="font-weight-bold"><?php echo "Review"; ?></span>
      </a>
  </li>
</ul>

<div class="tab-content content-tab">
  <div id="tab1" class="tab-pane content-tab1 active">
      <div class="content-tab1-col">
      <div class="content-tab1-col1">
        <div class="card content-tab1-card">
          <?= $this->Html->image('prime_new_image.png', ['alt' => 'prime_new_image', 'class'=>'card-img-top']) ?>
          <div class="card-body">
            <p class="card-text">新着のオリジナル作品を表示します</p>
            <?= $this->Form->create(null, ['url' => ['controller' => '/Original', 'action' => 'index']]) ?>
              <button type="submit" class="btn btn-secondary"><?php echo "進む"; ?></button>
              <input type="hidden" name="original" value="new-item" />
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
      <div class="content-tab1-col2">
        <div class="card content-tab2-card">
          <?= $this->Html->image('prime_list_image.png', ['alt' => 'prime_list_image', 'class'=>'card-img-top']) ?>
           <div class="card-body">
             <p class="card-text">条件に合ったオリジナル作品を表示します</p>
             <?= $this->Form->create(null, ['url' => ['controller' => '/Original', 'action' => 'index']]) ?>
               <button type="submit" class="btn btn-secondary"><?php echo "進む"; ?></button>
               <input type="hidden" name="original" value="item" />
             <?= $this->Form->end() ?>
           </div>
        </div>
      </div>
      </div>
  </div>

  <div id="tab2" class="tab-pane content-tab2">
      <div class="content-tab2-col1">
        <div class="card content-tab2-card">
          <?= $this->Html->image('reviewlist_image.png', ['alt' => 'reviewlist_image', 'class'=>'card-img-top']) ?>
          <div class="card-body">
            <p class="card-text">オリジナル作品のレビュー一覧を表示します</p>
            <?= $this->Form->create(null, ['url' => ['controller' => '/Review', 'action' => 'index']]) ?>
              <button type="submit" class="btn btn-secondary"><?php echo "進む"; ?></button>
              <input type="hidden" name="review" value="review-list" />
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
      <div class="content-tab2-col2">
        <div class="card content-tab2-card">
          <?= $this->Html->image('review_image.png', ['alt' => 'review_image', 'class'=>'card-img-top']) ?>
           <div class="card-body">
             <p class="card-text">オリジナル作品のレビューが出来ます</p>
              <?= $this->Form->create(null, ['url' => ['controller' => '/Review', 'action' => 'index']]) ?>
               <button type="submit" class="btn btn-secondary"><?php echo "進む"; ?></button>
               <input type="hidden" name="review" value="review" />
              <?= $this->Form->end() ?>
           </div>
        </div>
      </div>
  </div>
</div>
<div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
</div>
