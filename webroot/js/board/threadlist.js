$(document).ready(function(){
    // グローバル変数
    var syncerTimeout = null;
    $(window).scroll(function(){
        // 1秒ごとに処理
		if( syncerTimeout == null ){
			// セットタイムアウトを設定
			syncerTimeout = setTimeout(function(){
				// 対象のエレメント
				var element = $('#content-page-top');
				// 現在、表示されているか？
				var visible = element.is(':visible');
				// 最上部から現在位置までの距離を取得して、変数[now]に格納
				var now = $( window ).scrollTop() ;
                // 最下部から現在位置までの距離を計算して、変数[under]に格納
                var under = $('body').height() - (now + $(window).height());

                // 最上部から現在位置までの距離(now)が1500以上かつ
                // 最下部から現在位置までの距離(under)が200px以上だったら
                if(now > 1500 && 200 > under){
	                // 非表示状態だったら
					if(!visible)
					{
						// [#content-page-top]をゆっくりフェードインする
						element.fadeIn('fast');
					}
                }else{
                    // 1500px以下だったら
	                // 表示状態だったら
    				if(visible){
					    // [#page-top]をゆっくりフェードアウトする
                        element.fadeOut('fast');
                    }
                }

                // フラグを削除
				syncerTimeout = null;
            },1000);
        }
    });

    $('#move-page-top').click(function(){
        // [id:move-page-top]をクリックしたら起こる処理
        $('html,body').animate({scrollTop:0},'slow');
    });
});

$(".move-board-page").on("click",function(){
    $("form[name='board']").submit();
})

$(".board-header .thread-list").on("click", function(){
    var id = $("input[name='search-thread']").val("");
});

$(".footer-insert-thread").on("click", function(){
    $(".footer-parent").fadeIn("normal");
    $(".footer-insert-thread").css({"display":"none"});
});

$(".footer-btn-submit,.footer-btn-close").on("click",function(){
    $(".footer-parent").fadeOut("normal");
    $(".footer-insert-thread").css({"display":"flex"});
});

$(".footer-btn-submit").on("click",function(){
  var name = $("input[name='name']").val();
  var title = $("input[name='title']").val();
  var comment = $("#comment").val();

  if(title === ""){
      var text = "スレッド名は必須入力です";
      show_alert(text);
      return false;
  }else if(title.length > 64){
      var text = "64文字以下で入力してください";
      show_alert(text);
      return false;
  }

  if(name.indexOf("管理者") > -1){
    var text = "管理者を含む名前は無効です";
    show_alert(text);
    return false;
  }

  if(name.length > 32){
      var text = "名前は32文字以下で入力してください";
      show_alert(text);
      return false;
  }

  if(comment.length > 500){
      var text = "コメントは500文字以下で入力してください";
      show_alert(text);
      return false;
  }
});

function show_alert(text){
    $("<div class='validation-alert'>"+text+"</div>").appendTo(".content");
    $(".validaion-alert").fadeIn("fast");
    $(".validation-alert").css({
        "position":"fixed",
        "top":"50%",
        "left":"50%",
        "transform":"translate(-50%, -50%)",
        "padding":"1%",
        "border-radius":"5px",
        "background-color":"rgb(48, 48, 48, 0.85)",
        "color":"#ffffff",
        "font-weight":"bold",
        "font-size":"1.5rem",
    });
    setTimeout(function(){
        $(".validation-alert").fadeOut("fast");
        $(".validaion-alert").remove();
    },1500);
}
