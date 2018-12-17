<!DOCTYPE html>
<html>
<head>
    <?= $this->element('google_analytics') ?>

    <?= $this->element('meta') ?>

    <?= $this->Html->css('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('//use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>
    <?= $this->Html->css('hulu/template.css') ?>
    <?= $this->Html->css('adsense.css') ?>
    <?= $this->Html->css('hulu/table.css') ?>
    <?= $this->Html->css('hulu/original.css') ?>
</head>
  <?= $this->element('header_hulu') ?>
  <?= $this->fetch('content') ?>
  <?= $this->element('script') ?>
  <?= $this->Html->script('//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') ?>
  <?= $this->Html->script('hulu/original.js') ?>
</body>
</html>
</head>
