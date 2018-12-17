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
                    var search_review = $("input[name='search-review']").val();
                    if(search_review === undefined){
                        search_review = "";
                    }
                    var review_list =  $("#review-list").find("li");
                    var review_count = review_list.length;
                    $.ajax({
                        type: "POST",
                        url: "/hulu/review/loading",
                        data: {
                            "review_count" : review_count,
                            "search_review" : search_review,
                        },
                    })
                    // Ajaxリクエストが成功した時発動
                    .done(function(response){
                        var review_list = JSON.parse(response);
                        // ここに処理が完了したときのアクションを書く
                        for(var i=0; i<review_list.length; i++){
                            if(review_list[i]["review"] == null){
                              review_list[i]["review"] = "";
                            }
                            moment.locale('ja');
                            var created_t = moment(comment_list[i]["created_t"]).format('YY/MM/DD H:mm');
                            $("<li class='list-group-item target-review review-list-item'><p><span class='review-title' data-id='"+review_list[i]['id']+"'  data-itemid='"+review_list[i]['item_id']+"'>"+review_list[i]["hulu_item"]["title"]+"</span></p><div class='review-rate' id='review-rate"+review_list[i]['id']+"' data-rate="+review_list[i]['rate']+" data-id="+review_list[i]['id']+"></div><p class='review-name'>"+review_list[i]["user"]["name"]+"</p><pre>"+review_list[i]['review']+"</pre><p class='review-created'>"+created_t+"</p></li>").appendTo("#review-list");
                            $("#review-rate"+review_list[i]['id']).rateYo({
                                rating: review_list[i]['rate'],
                                readOnly: true,
                            });
                        }
                        if(review_list.length < 50){
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
