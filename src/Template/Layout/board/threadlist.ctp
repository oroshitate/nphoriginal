<!DOCTYPE html>
<html>
<head>
    <?= $this->element('google_analytics') ?>

    <?= $this->element('meta') ?>

    <?= $this->Html->css('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('//use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>
    <?= $this->Html->css('adsense.css') ?>
    <?= $this->Html->css('board/threadlist.css') ?>

</head>
<body>
  <?= $this->element('header_board') ?>
  <?= $this->fetch('content') ?>
  <?= $this->element('script') ?>
  <?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js') ?>
  <?= $this->Html->script('auto_loading/jquery_bottom.js') ?>
  <?= $this->Html->script('auto_loading/board/loading_thread.js') ?>
  <?= $this->Html->script('board/threadlist.js') ?>
</body>
</html>
</head>
