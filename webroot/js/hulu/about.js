$(document).ready(function(){
    $(".nav-link.active").css({"background-color":"#5ac82f", "color":"#ffffff"});
    $(".content-tab-li a:not(.active)").css({"background-color":"#ffffff", "color":"#000000"});
});

$("a[class*='tab-li-nav']").on("click",function(){
    var tab_class = $(this).attr("class");
    var tab_href = $(this).attr("href");
    $(".nav-link.active").css({"background-color":"#ffffff", "color":"#000000"});
    $(this).css({"background-color":"#5ac82f", "color":"#ffffff"});
});

$(".move-board-page").on("click",function(){
    $("form[name='board']").submit();
})
