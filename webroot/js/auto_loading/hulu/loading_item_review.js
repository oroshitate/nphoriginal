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
                    var review_list =  $("#review").find("li");
                    var review_count = review_list.length;
                    var item_id = $(".content-tab2-title").data("itemid");
                    $.ajax({
                        type: "POST",
                        url: "/hulu/item/loading",
                        data: {
                            "review_count" : review_count,
                            "item_id" : item_id,
                        },
                    })
                    // Ajaxリクエストが成功した時発動
                    .done(function(response){
                        var review = JSON.parse(response);
                        // ここに処理が完了したときのアクションを書く
                        for(var i=0; i<review.length; i++){
                            if(review[i]["review"] == null){
                              review[i]["review"] = "";
                            }
                            moment.locale('ja');
                            var created_t = moment(comment_list[i]["created_t"]).format('YY/MM/DD H:mm');
                            $("<li class='list-group-item review-list-item'><div class='review-rate' id='review-rate"+review[i]["id"]+"' data-rate="+review[i]["rate"]+" data-id="+review[i]["id"]+"></div><p>"+review[i]["name"]+"</p><pre>"+review[i]["review"]+ "</pre><p>"+created_t+"</p></li>").appendTo("#review");
                            $("#review-rate"+review[i]['id']).rateYo({
                                rating: review[i]['rate'],
                                readOnly: true,
                            });
                        }
                        if(review.length < 50){
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
