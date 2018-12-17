<nav class="navbar navbar-dark header">
  <div class="header-div">
      <?= $this->Form->create(null,['url' => ['controller' => '../board/Threadlist', 'action' => 'index'], 'name' => 'board']) ?>
          <div class="move-board-page">
              <i class="far fa-comments"></i>
          </div>
      <?= $this->Form->end() ?>
      <?= $this->Html->link('NPHoriginal','/hulu/about', ['id' => 'header-title', 'class' => 'navbar-brand mb-0']) ?>
      <button id="navbar-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
  <div class="header-menu">
    <?= $this->Html->link('Original','/hulu/original', ['class' => 'header-menu-original']) ?>
    <?= $this->Html->link('Review','/hulu/review', ['class' => 'header-menu-review']) ?>
    <?= $this->Html->link('Blog','https://oropon.info/', ['class' => 'header-menu-blog']) ?>
  </div>
  <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto" id="nav-items">
          <li class="nav-item active">
              <?= $this->Html->link('Netflix','/netflix/about', ['id' => 'nav-item-netflix', 'class' => 'nav-link']) ?>
          </li>
          <li class="nav-item">
              <?= $this->Html->link('Prime','/prime/about', ['id' => 'nav-item-prime', 'class' => 'nav-link']) ?>
          </li>
          <li class="nav-item">
              <?= $this->Html->link('Hulu','/hulu/about', ['id' => 'nav-item-hulu', 'class' => 'nav-link']) ?>
          </li>
          <li class="nav-item">
              <?= $this->Html->link('<i class="fa fa-home"></i> Home','/', ['id' => 'nav-item-home', 'class' => 'nav-link', 'escape' => false]) ?>
          </li>
      </ul>
  </div>
</nav>
