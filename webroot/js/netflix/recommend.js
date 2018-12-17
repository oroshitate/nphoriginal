$(document).ready(function(){
    $(".nav-link.active").css({"background-color":"#ff3a3a", "color":"#ffffff"});
    $(".content-tab-li a:not(.active)").css({"background-color":"#ffffff", "color":"#000000"});

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
        $("#item-list-table").DataTable({
            // 横スクロールバーを有効にする (scrollXはtrueかfalseで有効無効を切り替えます)
            scrollX: true,
            // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
            scrollY: 1500,
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
            // ページング機能
            paging: true,
            //ソート指定
            order: [[3, "desc"]],
        });
    }else{
        $("#item-list-table").DataTable({
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
            // ページング機能
            paging: true,
            //ソート指定
            order: [[3, "desc"]],
        });
    }

    $("#item-list-table_filter > label > input[type='search']").attr("placeholder","検索");

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

$("a[class*='tab-li-nav']").on("click",function(){
    var tab_class = $(this).attr("class");
    var tab_href = $(this).attr("href");
    $(".nav-link.active").css({"background-color":"#ffffff", "color":"#000000"});
    $(this).css({"background-color":"#ff3a3a", "color":"#ffffff"});
});

$(".move-board-page").on("click",function(){
    $("form[name='board']").submit();
})

//詳細画面へ遷移
$(".table-item-title").on("click", function(){
    var id = $(this).data("id");
    var genre = $(this).data("genre");
    var tag = $(this).data("tag");
    $("input[name='item_id']").val(id);
    $("input[name='genre']").val(genre);
    $("input[name='tag']").val(tag);
    $("form[name='recommend']").submit();
    $(".modal").fadeIn("fast");
});
