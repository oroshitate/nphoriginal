<!DOCTYPE html>
<html>
<head>
    <?= $this->element('google_analytics') ?>

    <?= $this->element('meta') ?>

    <?= $this->Html->css('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('//use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>
    <?= $this->Html->css('template.css') ?>
    <?= $this->Html->css('apphome.css') ?>
</head>
<body>
  <?= $this->element('header_home') ?>
  <?= $this->fetch('content') ?>
  <?= $this->element('script') ?>
  <?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js') ?>
  <?= $this->Html->script('apphome.js') ?>
</body>
</html>
</head>
