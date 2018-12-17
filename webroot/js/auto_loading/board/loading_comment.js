setInterval(function() {
        //ajaxで読み出し
        var thread_id = $(".board-title h1").data("threadid");
        var comment_list = $("#comment_list").find("li");
        var comment_count = comment_list.length;

        $.ajax({
            type: "POST",
            url: "/board/thread/loading",
            data: {
                "thread_id" : thread_id,
                "comment_count" : comment_count,
            },
        })
        // Ajaxリクエストが成功した時発動
        .done(function(response){
            var comment_list = JSON.parse(response);
            if(comment_list.length == 0){
                return false;
            }
            // ここに処理が完了したときのアクションを書く
            for(var i=0; i<comment_list.length; i++){
              moment.locale('ja');
              var created_t = moment(comment_list[i]["created_t"]).format('YY/MM/DD H:mm');
              $("<li class='list-group-item thread-list-item' data-commentid="+comment_list[i]["id"]+"><p>"+String(i+comment_count+1)+". "+comment_list[i]["user"]["name"]+" : "+created_t+"</p><pre>"+comment_list[i]["comment"]+"</pre></li>").appendTo("#comment_list");
            }

            $("div.comment-count span").text("コメント数 " + (comment_count + comment_list.length));
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
}, 60000);
