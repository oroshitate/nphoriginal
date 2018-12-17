$(document).ready(function(){
    $(".nav-link.active").css({"background-color":"#ff3a3a", "color":"#ffffff"});
    $(".content-tab-li a:not(.active)").css({"background-color":"#ffffff", "color":"#000000"});
    $("#tab2").addClass("active");

    var avg_rate = $("#avg-review-rate").data('rate');
    if(avg_rate != ""){
      $("#avg-review-rate").rateYo({
        rating: avg_rate,
        readOnly: true,
        starWidth: "30px",
      });
    }else {
      $("#avg-review-rate").rateYo({
        rating: 0,
        readOnly: true,
        starWidth: "30px",
      });
    }

    var reviews = document.getElementsByClassName('review-rate');
    if(reviews){
      for(var i=0; i<reviews.length; i++){
          var id = reviews[i].getAttribute('data-id');
          var rate = reviews[i].getAttribute('data-rate');
          $("#review-rate"+id).rateYo({
              rating: rate,
              readOnly: true,
              starWidth: "30px",
          });
      }
    }

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

    $.extend( $.fn.dataTable.defaults, {
        language: {
            "emptyTable" : "データが登録されていません。",
            "info" : "_TOTAL_ 件中 _START_ 件から _END_ 件までを表示",
            "infoEmpty" : "",
            "infoFiltered" : "(_MAX_ 件からの絞り込み表示)",
            "infoPostFix" : "",
            "thousands" : ",",
            "lengthMenu" : "1ページあたりの表示件数: _MENU_",
            "loadingRecords" : "ロード中",
            "processing" : "処理中...",
            "search" : "",
            "zeroRecords" : "該当するデータが見つかりませんでした。",
            "paginate" : {
                "first" : "先頭",
                "previous" : "前",
                "next" : "次",
                "last" : "末尾"
            }
        }
    });

    var windowWidth = $(window).width();
    var windowSm = 768;
    if (windowWidth < windowSm) {
        $("#new-item-list-table").DataTable({
            // 横スクロールバーを有効にする (scrollXはtrueかfalseで有効無効を切り替えます)
            scrollX: true,
            // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
            scrollY: true,
            //件数制限
            lengthChange: false,
            // 検索機能 無効
            searching: true,
            //ソート機能 無効
            ordering: true,
            // デフォルト表示件数
            displayLength: 100,
            // 情報表示 無効
            info: false,
            // ページング機能 無効
            paging: true,
            //ソート指定
            order: [[0, "asc"]]
        });
    }else{
        $("#new-item-list-table").DataTable({
            //件数制限
            lengthChange: false,
            // 検索機能 無効
            searching: true,
            //ソート機能 無効
            ordering: true,
            // デフォルト表示件数
            displayLength: 100,
            // 情報表示 無効
            info: false,
            // ページング機能 無効
            paging: true,
            //ソート指定
            order: [[0, "asc"]]
        });
    }

    $("#new-item-list-table_filter > label > input[type='search']").attr("placeholder","検索");
});

$(".move-board-page").on("click",function(){
    $("form[name='board']").submit();
})

//星評価
rate_arr = [];
$(".how-rate").rateYo({
    starWidth: "30px",
    ratedFill: "#ffd800",
    halfStar: true,
    numStars: 5,
}).on("rateyo.set", function (e, data) {
    rate_arr.push(data.rating);
});

$("a[class*='tab-li-nav']").on("click",function(){
    var tab_class = $(this).attr("class");
    var tab_href = $(this).attr("href");
    $(".nav-link.active").css({"background-color":"#ffffff", "color":"#000000"});
    $(this).css({"background-color":"#ff3a3a", "color":"#ffffff"});
});

$(".footer-insert-review").on("click", function(){
    $(".footer-parent").fadeIn("normal");
    $(".footer-insert-review").css({"display":"none"});
});

$(".footer-btn-submit,.footer-btn-close").on("click",function(){
    $(".footer-parent").fadeOut("normal");
    $(".footer-insert-review").css({"display":"flex"});
});

$(".footer-btn-submit").on("click", function(){
  var itemid = $(this).data("itemid");
  var rate = rate_arr.pop();
  var name = $("input[name='name']").val();
  var review = $("#input_review").val();

  if(rate === undefined){
      var text = "評価は必須入力です。入力しなおしてください\n※評価0は無効です";
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

  if(review.length > 500){
      var text = "レビューは500文字以下で入力してください";
      show_alert(text);
      return false;
  }

  $("input[name='item_id']").val(itemid);
  $("input[name='rate']").val(rate);

  $(this).prop('disabled',true);//ボタンを無効化する

  $("form[name='review']").submit();
});

function show_alert(text){
    $("<div class='validation-alert'>"+text+"</div>").appendTo("#tab2");
    $(".validaion-alert").fadeIn("fast");
    $(".validation-alert").css({
        "position":"fixed",
        "top":"50%",
        "left":"50%",
        "transform":"translate(-50%, -50%)",
        "padding":"1%",
        "border-radius":"5px",
        "background-color":"rgb(255, 58, 58, 0.85)",
        "color":"#ffffff",
        "font-weight":"bold",
        "font-size":"1.5rem",
    });
    setTimeout(function(){
        $(".validation-alert").fadeOut("fast");
        $(".validaion-alert").remove();
    },1500);
}
