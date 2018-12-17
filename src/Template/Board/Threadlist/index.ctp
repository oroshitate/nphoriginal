<div class="inner">
  <div class="content">
    <div class="content-ad-top"><?= $this->element('google_adsense') ?></div>

    <div class="content-board">
      <div class="board-header">
        <div class="board-header-title">
            <h1 class="content-title">掲示板</h1>
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => '/threadlist', 'action' => 'index']]) ?>
          <?= $this->Form->text('search-thread',['id' => 'search-thread']) ?>
          <?= $this->Form->button('検索', ['type' => 'submit', 'class' => 'btn btn-secondary thread-search']) ?>
          <?= $this->Form->button('一覧', ['type' => 'submit', 'class' => 'btn btn-secondary thread-list']) ?>
        <?= $this->Form->end() ?>
      </div>

      <div class="board-body">
        <ul id="thread" class="list-group content-thread-list target-area">
        <?php foreach($thread_list as $thread): ?>
            <li class="list-group-item content-list-item">
              <span class="item-thread-date"><?= $thread["created_t"] ?></span>
              <?= $this->Html->link($thread["title"], ['controller'=>'Thread', 'action'=>'view', 'id' => $thread["id"]], ['class'=>'item-thread-title']); ?>
              <?= $this->Html->tag('span', "コメント(".$thread["count"].")", ['class' => 'item-comment-count']) ?>
            </li>
        <?php endforeach; ?>
        </ul>
      </div>

    </div>
    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div class="footer">
  <div class="footer-insert-thread">
    <span>スレッドを作る</span>
  </div>
  <div class="footer-parent">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Threadlist', 'action' => 'add']]) ?>
    <button type="button" class="btn btn-secondary footer-btn-close">
        <i class="fas fa-times"></i>
    </button>
    <div class="footer-thread-title">
      <?= $this->Form->text('title', ['placeholder' => 'スレッド名']) ?>
    </div>
    <div class="footer-commenter">
      <?= $this->Form->text('name', ['placeholder' => '名前']) ?>
    </div>
    <div class="footer-comment">
      <?= $this->Form->textarea('comment', ['id'=>'comment', 'placeholder' => 'コメント']) ?>
    </div>
    <div class="footer-btn">
      <?= $this->Form->button('スレッド作成', ['type' => 'submit', 'class' => 'btn btn-secondary footer-btn-submit']) ?>
    </div>
    <?= $this->Form->end() ?>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
