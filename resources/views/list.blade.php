@extends('layouts.app')
@section('content')
    <div class="container hide page" id="page-list">
        <div class="content">
            <div class="row">
            @foreach($works as $k=>$work)
                <div class="col-img text-center">
                    <a href="javascript:;" onclick="getWork({{$work->id}});"><img src="{{$work->image}}" width="300" class="img-rounded" height="300" /></a>
                    <div class="txt">No.{{$work->id}}<div class="heart"><a href="javascript:;" onclick="vote('{{$work->id}}',$(this))"><img class="{{$work->hasVoted ? 'hide' : ''}}" src="/images/icon-heart-empty.png"><img class="{{$work->hasVoted ? '' : 'hide'}}" src="/images/icon-heart.png"></a> <span>{{$work->vote_num}}</span></div></div>
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
    <div class="container hide page" id="page-work">
        <div class="row">
            <div class="topper-01">
                No.<span id="work-id"></span>
            </div>
            <div class="custom-album">
                <div id="custom-album">
                    <img src="" id="work-image" width="480" height="480"  >
                </div>
            </div>
            <div class="work-name">
                <div class="title" id="work-name"></div>
                <div class="heart">
                    <a href="javascript:;">
                        <img src="/images/icon-big-heart-empty.png" width="85" height="71" class="hide"/>
                        <img src="/images/icon-big-heart.png" width="93" height="73" class="hide"/>
                    </a> <span id="work-vote"></span>
                </div>
            </div>
            <div class="rows text-center">
                <button class="btn btn-back"></button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $().ready(function(){
            @if($id)
            $('#page-work').removeClass('hide');
            getWork({{$id}});
            @else
            $('#page-list').removeClass('hide');
            @endif
        })
    </script>
    <script src="/js/abilix.list.js?v=0.2"></script>
@endsection