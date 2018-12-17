$(document).ready(function(){
    var reviews = document.getElementsByClassName('new-review');
    for(var i=0; i<reviews.length; i++){
      var id = reviews[i].getAttribute('data-reviewid');
      var rate = reviews[i].getAttribute('data-rate');
      var service = reviews[i].getAttribute('data-service');
      $("#new-review-"+service+"-"+id).rateYo({
          rating: rate,
          readOnly: true,
          starWidth: "30px",
      });
    }
});

$(".move-board-page").on("click",function(){
    $("form[name='board']").submit();
})

$(".content-news a").on("click", function(){
    return false;
});

$(".content-news a").on("click", function(){
    var service = $(this).data("service");
    $("form[name='news']").attr('action','../'+service+'/original');
    $("form[name='news']").submit();
});
