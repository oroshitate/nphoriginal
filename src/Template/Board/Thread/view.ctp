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
            <div class="board-title">
              <h1 data-threadid=<?php echo $thread[0]["id"]; ?>><?php echo $thread[0]["title"]; ?></h1>
            </div>
            <div class="board-name">
              <span>作成者 <?php echo $thread[0]["user"]["name"]; ?></span>
            </div>
            <div class="comment-count">
                <span>コメント数 <?= $count ?></span>
            </div>
            <ul id="comment_list" class="list-group content-thread-list target-area">
            <?php for($i = 0; $i<count($comment_list); $i++): ?>
                <li class="list-group-item thread-list-item" data-commentid=<?php echo $comment_list[$i]["id"]; ?>>
                    <p><?= $i+1 ?>. <?php echo $comment_list[$i]["user"]["name"]; ?> : <?php echo $comment_list[$i]["created_t"]; ?></p>
                    <pre><?php echo $comment_list[$i]["comment"]; ?></pre>
                </li>
            <?php endfor; ?>
            </ul>
        </div>

    </div>

    <div class="content-ad-bottom"><?= $this->element('google_adsense_responsive') ?></div>
  </div>
</div>

<div class="footer">
  <div class="footer-insert-thread">
    <span>コメントする</span>
  </div>
  <div class="footer-parent">
    <?= $this->Form->create(null) ?>
    <button type="button" class="btn btn-secondary footer-btn-close">
        <i class="fas fa-times"></i>
    </button>
    <div class="footer-commenter">
      <?= $this->Form->text('name',['placeholder' => '名前']) ?>
    </div>
    <div class="footer-comment">
      <?= $this->Form->textarea('comment',['id'=>'comment','placeholder' => 'コメント']) ?>
    </div>
    <div class="footer-btn">
      <?= $this->Form->button('コメント', ['type' => 'button', 'class' => 'btn btn-secondary footer-btn-submit']) ?>
    </div>
    <?= $this->Form->end() ?>
  </div>
</div>

<div id="content-page-top" class="content-page-top">
  <p><a id="move-page-top" class="move-page-top"><i class="fas fa-chevron-up"></i></a></p>
</div>
