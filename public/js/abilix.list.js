$().ready(function(){
    $(".btn-back").on('touchend', function () {
        window.location.href = '{{url("/")}}';
        //$(".page").addClass("hide");
        //$('#page-list').removeClass("hide");
    });
    var page = 2;
    var beforeScrollTop = $("#page-list .content").scrollTop();
    var no_more = false;
    $("#page-list .content").scroll(function(){
        var $this =$(this),
            viewH =$(this).height(),//可见高度
            contentH =$(this).get(0).scrollHeight,//内容高度
            scrollTop =$(this).scrollTop();//滚动高度
        var delta = scrollTop - beforeScrollTop;

        beforeScrollTop = scrollTop;
        if( !no_more && delta > 0 && contentH - viewH - scrollTop <= 50){ //到达底部100px时,加载新内容
            no_more = true;
            $.ajax({
                url:'{{url("/list")}}',
                data:{page:page},
                dataType:'json',
                method:'GET'
            }).done(function(json) {
                if (json.data.length > 0){
                    var html = '';
                    $.each(json.data, function(index, work){
                        html += '<div class="col-img text-center">';
                        html += '<a href="javascript:;" onclick="getWork('+work.id+')"><img src="'+work.image+'" height="300" width="300" class="img-rounded" /></a>';
                        html += '<div class="txt">No.'+work.id+'<div class="heart"><a href="javascript:;"><img src="/images/icon-heart.png"></a> '+work.vote_num+'</div></div></div>';
                    });
                    $('#page-list .content .row').append(html);
                    page++;
                    no_more = false;
                }
                else if (json.data.length == 0){
                    $('#page-list .content .row').append('<div class="clearfix"></div><div class="text-center"><h1>没有更多的作品啦</h1></div>');
                }
            }).fail(function() {
                //alert( "上传失败，请稍候重试" );
            }).always(function() {
                //alert( "complete" );
            });
        }
    });
})