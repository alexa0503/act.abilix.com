@extends('layouts.phase2')
@section('content')
    <div class="container page1">
        <div class="row">
            <div class="avatar text-center">
                <img class="img-circle" src="{{$wechat_user->avatar}}" width="165" height="165" />
            </div>
            <div class="prize text-center">
                <div class="img-prize"><img src="{{$ranking_img}}" /></div>
            </div>
            <div class="rule-text text-center">
                <img src="{{asset('images/phase2/text-01.png')}}" />
            </div>
            <div class="qr text-center">
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
            <div class="btns-01">
                <a class="btn btn-back" href="{{url('/phase2')}}"></a>
                <button class="btn btn-share"></button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-tip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Loading...
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <div class="modal fade" id="modal-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="/images/share.png" width="500" />
                    <div class="share-close"><img src="/images/icon-close.png" class="img-responsive" /></div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
@endsection
@section('scripts')
    <script src="/js/abilix.phase2.js"></script>
@endsection
