<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="" name=description>
    <meta content="Alx" name=author>
    <title>{{ config('app.name') }}</title>
    <link href="/css/bootstrap.min.css" rel=stylesheet>
    <link href="/css/jquery.fullPage.css" rel=stylesheet>
    <!--[if lt IE 9]><script src=/js/ie8-responsive-file-warning.js></script><![endif]-->
    <!--[if lt IE 9]> <script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script> <script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script> <![endif]-->
    <link href="/css/abilix.css" rel=stylesheet>
    <link href="/css/abilix.phase2.css" rel=stylesheet>
    <link href="/apple-touch-icon.png" rel=apple-touch-icon>
    <script language="javascript">
        var wxData = {
            link: ''
        };
        var hasSubmitted = false;
        document.ontouchmove = function(e){
            //e.preventDefault();
        }
        var _s = window.screen.width / 750;
        document.write('<meta name="viewport" content="width=750, minimum-scale = ' + _s + ', maximum-scale = ' + _s + ', user-scalable=no, target-densitydpi=device-dpi, shrink-to-fit=no">');
    </script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src=/js/jquery.min.js></script>
    <script src="/js/bootstrap.min.js"></script>
    @php
        $js = \EasyWeChat::js();
    @endphp
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        @if(env('APP_ENV') != 'local')
        wx.config({!! $js->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ', 'onMenuShareWeibo','chooseImage','uploadImage','downloadImage'), false) !!});
        wxData = {
            title: '暑期小心！前方有一大波奖金礼物……至高10000元',
            desc: '内含10000元现金大奖，手快有手慢无',
            link: '{{url("/phase2")}}',
            imgUrl: '{{asset("images/share.jpg")}}'
        };
        
        @endif
    </script>
    <script type="text/javascript">
        wx.ready(function() {
            document.getElementById('bg-music').play();
        });
    </script>
</head>
<body class="abilix">
<header id="header">
    <div class="container text-center">
        <img src="/images/phase2/header.png"  >
    </div>
</header>
@yield('content')
<div class="modal fade" id="modal-tip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Loading...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<audio style="display:none; height: 0" id="bg-music" autoplay preload loop  src="/bg.mp3"></audio>
<div id="playMusic"><img src="/images/icon-music-on.png" class="hide" ><img src="/images/icon-music-off.png" class="hide"> </div>
@yield('scripts')
<div style="display:none;">
    <script src="https://s11.cnzz.com/z_stat.php?id=1262847468&web_id=1262847468" language="JavaScript"></script>
</div>
</body>
</html>
