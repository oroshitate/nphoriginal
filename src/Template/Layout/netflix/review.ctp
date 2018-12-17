<!DOCTYPE html>
<html>
<head>
    <?= $this->element('google_analytics') ?>

    <?= $this->element('meta') ?>

    <?= $this->Html->css('//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('//use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') ?>
    <?= $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>
    <?= $this->Html->css('netflix/template.css') ?>
    <?= $this->Html->css('adsense.css') ?>
    <?= $this->Html->css('netflix/table.css') ?>
    <?= $this->Html->css('netflix/review.css') ?>

</head>
  <?= $this->element('header_netflix') ?>
  <?= $this->fetch('content') ?>
  <?= $this->element('script') ?>
  <?= $this->Html->script('//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') ?>
  <?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js') ?>
  <?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js') ?>
  <?= $this->Html->script('auto_loading/jquery_bottom.js') ?>
  <?= $this->Html->script('auto_loading/netflix/loading_review.js') ?>
  <?= $this->Html->script('netflix/review.js') ?>
</body>
</html>
</head>
