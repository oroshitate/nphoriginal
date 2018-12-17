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

$(".footer-btn-submit").on("click", function(){
    var thread_id = $(".board-title h1").data("threadid");
    var name = $("input[name='name']").val();
    var comment = $("#comment").val();
    var comment_list = $("#comment_list").find("li");
    var comment_count = comment_list.length;

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

    //ajaxで読み出し
    $.ajax({
        type: "POST",
        url: "/board/thread/add",
        data: {
            "thread_id" : thread_id,
            "name" : name,
            "comment" : comment,
            "comment_count" : comment_count,
        },
    })
    // Ajaxリクエストが成功した時発動
    .done(function(response){
        var comment_list = JSON.parse(response);
        // ここに処理が完了したときのアクションを書く
        for(var i=0; i<comment_list.length; i++){
          moment.locale('ja');
          var created_t = moment(comment_list[i]["created_t"]).format('YY/MM/DD H:mm');
          $("<li class='list-group-item thread-list-item' data-commentid="+comment_list[i]["id"]+"><p>"+String(i+comment_count+1)+". "+comment_list[i]["user"]["name"]+" : "+created_t+"</p><pre>"+comment_list[i]["comment"]+"</pre></li>").appendTo("#comment_list");
        }

        $("div.comment-count span").text("コメント数 " + (comment_count + comment_list.length));

        $("input[name='name']").val("");
        $("#comment").val("");
    })
    // Ajaxリクエストが失敗した時発動
    .fail(function(XMLHttpRequest, textStatus, errorThrown){
        console.log("ajax通信に失敗しました");
        console.log("XMLHttpRequest : " + XMLHttpRequest.status);
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
    }).always(function (data_or_jqXHR, textStatus, jqXHR_or_errorThrown) {
        // done,failを問わず、常に実行される処理
    });

    return false;
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
