<div class="inner">
  <div class="content-about-box">
    <h1 class="content-about-h1">Netflix Prime Hulu</h1>
    <h2 class="content-about-h2">オリジナル作品情報コミュニティサイト</h2>
    <h4 class="content-about">沢山の作品の中から、あなたが見たい作品を探すことが出来ます</h4>
    <h4 class="content-about">また、視聴した作品についてレビューすることも出来ます</h4>
    <h4 class="content-about">映画やドラマ、アニメなどについて自由に話したい方は、ぜひ掲示板をご利用ください</h4>
  </div>

  <div class="content">
    <div class="content-menu">
      <div class="card">
        <?= $this->Html->image('netflix_icon.jpg', ['alt' => 'netflix_icon', 'class'=>'card-img-top']) ?>
        <div class="card-body">
          <?= $this->Html->link('進む','/netflix/about', ['class' => 'btn btn-secondary']) ?>
        </div>
      </div>
      <div class="card">
        <?= $this->Html->image('prime_icon.png', ['alt' => 'prime_icon', 'class'=>'card-img-top']) ?>
        <div class="card-body">
          <?= $this->Html->link('進む','/prime/about', ['class' => 'btn btn-secondary']) ?>
        </div>
      </div>
      <div class="card">
        <?= $this->Html->image('hulu_icon.jpg', ['alt' => 'hulu_icon', 'class'=>'card-img-top']) ?>
        <div class="card-body">
          <?= $this->Html->link('進む','/hulu/about', ['class' => 'btn btn-secondary']) ?>
        </div>
      </div>
    </div>

    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>

    <div class="content-board">
      <p class="content-title">掲示板</p>
      <?= $this->Form->create(null, ['url' => ['controller' => 'board/threadlist', 'action' => 'index']]) ?>
        <?= $this->Form->text('search-thread',['id' => 'search-thread']) ?>
        <?= $this->Form->button('検索',['type' => 'submit', 'class' => 'btn btn-secondary thread-search']) ?>
        <?= $this->Form->button('一覧',['type' => 'submit', 'class' => 'btn btn-secondary thread-list']) ?>
      <?= $this->Form->end() ?>
      <ul class="list-group content-thread-list">
      <?php foreach($thread_list as $thread): ?>
        <li class="list-group-item content-list-item">
          <?= $this->Html->tag('span', $thread["created_t"], ['class' => 'item-thread-date']) ?>
          <?= $this->Html->link($thread["title"],'/board/thread/'.$thread["id"], ['class' => 'item-thread-title']) ?>
          <?= $this->Html->tag('span', "コメント(".$thread["count"].")", ['class' => 'item-comment-count']) ?>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="content-news">
      <p class="content-title">最新ニュース</p>
      <?= $this->Form->create(null, ['name' => 'news']) ?>
        <ul class="list-group content-news-list">
        <?php foreach($news_list as $news): ?>
          <li class="list-group-item content-list-item">
            <?= $this->Html->tag('span', $news["created_t"], ['class' => 'item-news-date']) ?>
            <?= $this->Html->link(
              [$this->Html->tag('span', $news["title"])],
              [],
              ['escape' => false, 'class' => "service-".$news["service"], 'data-service' => $news["service"]])
            ?>
          </li>
        <?php endforeach; ?>
        </ul>
        <?= $this->Form->hidden('original',['value' => 'new-item']) ?>
        <?= $this->Form->end() ?>
    </div>

    <div class="content-review">
      <p class="content-title">最新レビュー</p>
        <ul class="list-group content-review-list">
        <?php foreach($review_list as $review): ?>
          <li class="list-group-item content-list-item">
            <?= $this->Html->link($review["title"],'/'.$review["service"].'/'.'item'.'/'.$review["item_id"], ['class'=>$review["service"].'-item-review-title', 'data-itemid'=>$review["item_id"], 'data-service'=>$review["service"]]) ?>
            <div class="new-review" id=<?php echo "new-review-".$review["service"]."-".$review["review_id"]; ?> data-rate=<?php echo $review["rate"]; ?> data-service=<?php echo $review["service"]; ?> data-reviewid=<?php echo $review["review_id"]; ?>>
            </div>
            <p><?php echo $review["name"]; ?></p>
            <pre><?php echo $review["review"]; ?></pre>
            <p><?php echo $review["created_t"]; ?></p>
          </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>
