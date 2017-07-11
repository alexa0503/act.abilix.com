@extends('layouts.app')
@section('content')
    <div class="container page" id="page-list">
        <div class="content">
            <div class="row">
            @foreach($works as $k=>$work)
                <div class="col-img text-center">
                    <a href="{{url('/work',['id'=>$work->id])}}"><img src="{{$work->image}}" width="300" class="img-rounded" height="300" /></a>
                    <div class="txt">No.{{$work->id}}<div class="heart"><a href="javascript:;"><img src="/images/icon-heart.png"></a> {{$work->vote_num}}</div></div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="footer text-center">
            <img src="/images/list-txt-01.png" />
            <div class="rows">
                <div class="col-xs-6">
                    <a href="https://abilix.tmall.com/shop/view_shop.htm?id=3000224980
"><img src="/images/qr-tmall.png"/></a>
                    <p>Abilix能力风暴<br/>天猫旗舰店</p>
                </div>
                <div class="col-xs-6">
                    <a href="https://shop.m.jd.com?shopId=1000079405
"><img src="/images/qr-jd.png"/></a>
                    <p>Abilix能力风暴<br/>京东旗舰店</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js "></script>
    <script>
        var hasSubmitted = false;
        $().ready(function(){
            $(document).ajaxStart(function () {
                hasSubmitted = true;
                $('#modal-tip').modal({keyboard: false,show:true,backdrop: 'static'});
            }).ajaxComplete(function(){
                hasSubmitted = false;
                $('#modal-tip').modal('hide');
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
                                html += '<a href="/work/'+work.id+'"><img src="'+work.image+'" height="300" width="300" class="img-rounded" /></a>';
                                html += '<div class="txt">No.'+work.id+'<div class="heart"><a href="javascript:;"><img src="/images/icon-heart.png"></a> '+work.vote_num+'</div></div></div>';
                            });
                            $('#page-list .content .row').append(html);
                            page++;
                        }
                        else if (json.data.length == 0){
                            $('#page-list .content .row').append('<div class="clearfix"></div><div class="text-center"><h1>没有更多的作品啦</h1></div>');
                            no_more = true;
                        }
                    }).fail(function() {
                        alert( "上传失败，请稍候重试" );
                    }).always(function() {
                        //alert( "complete" );
                    });
                }
            });
        })
    </script>
@endsection