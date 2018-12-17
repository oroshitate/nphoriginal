//ページ自動読み込み
var end_flag = 0; //最後のページまでいったら1にして次から読み込ませない
$(window).bottom({proximity: 0.1}); //proximityを0.5にするとページの50％までスクロールするとloadingがはじまる
$(window).bind("bottom", function() {
    if(end_flag==0){ //ページが最後までいってなければ
        var obj = $(this);
        if (!obj.data("loading")) {
            obj.data("loading", true);

            setTimeout(function() {
                    //ajaxで読み出し
                    var thread_list =  $("#thread").find("li");
                    var thread_count = thread_list.length;
                    var search_thread = $("input[name='search-thread']").val();
                    if(search_thread === undefined){
                        search_thread = "";
                    }
                    $.ajax({
                        type: "POST",
                        url: "/board/threadlist/loading",
                        data: {
                            "thread_count" : thread_count,
                            "search_thread" : search_thread,
                        },
                    })
                    // Ajaxリクエストが成功した時発動
                    .done(function(response){
                        var thread_list = JSON.parse(response);
                        // ここに処理が完了したときのアクションを書く
                        for(var i=0; i<thread_list.length; i++){
                          moment.locale('ja');
                          var created_t = moment(comment_list[i]["created_t"]).format('YY/MM/DD H:mm');
                          $("<li class='list-group-item content-list-item'><span class='item-thread-date'>"+created_t+"</span><span class='item-thread-title' data-threadid="+thread_list[i]["id"]+">"+thread_list[i]["title"]+"</span><span class='item-thread-name'>作成者 "+thread_list[i]['user']["name"]+"</span></li>").appendTo("#thread");
                        }
                        if(thread_list.length < 50){
                            end_flag=1;
                        }
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
                    obj.data("loading", false);
            }, 1000);
        }
    } //end_flag
});
