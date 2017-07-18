<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="" name=description>
    <meta content="Alx" name=author>
    <title>{{ config('app.name') }}</title>
    <link href="/css/bootstrap.min.css" rel=stylesheet>
    <!--[if lt IE 9]><script src=/js/ie8-responsive-file-warning.js></script><![endif]-->
    <!--[if lt IE 9]> <script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script> <script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script> <![endif]-->
    <link href="/css/abilix.css?v=0.2" rel=stylesheet>
    <link href="/apple-touch-icon.png" rel=apple-touch-icon>
    <script src=/js/jquery.min.js></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/abilix.js"></script>
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
            title: '暑期小心！前方有一大波奖金礼物……至高10000元', // 分享标题
            desc: '内含10000元现金大奖，手快有手慢无', // 分享描述
            link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: '{{asset("images/share.jpg")}}' // 分享图标
        };
        wxShare(wxData);
        @endif
    </script>
    <script type="text/javascript">
        document.addEventListener("WeixinJSBridgeReady", function () {
            audioAutoPlay('bg-music');//给个全局函数
        }, false);
        document.addEventListener('YixinJSBridgeReady', function() {
            audioAutoPlay('bg-music');//给个全局函数
        }, false);
    </script>
</head>
<body class="abilix">
<header>
    <div class="container text-center">
        <img src="/images/header.png"  >
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
<audio style="display:none; height: 0" id="bg-music" autoplay="autoplay" preload="auto" src="/bg.mp3" loop="loop"></audio>
<div id="playMusic"><img src="/images/icon-music-on.png" ><img src="/images/icon-music-off.png" class="hide"> </div>
<script>
    function audioAutoPlay(id){//全局控制播放函数
        var audio = document.getElementById(id),
            play = function(){
                audio.play();
                document.removeEventListener("touchstart",play, false);
            };
        audio.play();
        document.addEventListener("touchstart",play, false);
    }

    var isAppInside=/micromessenger/i.test(navigator.userAgent.toLowerCase())||/yixin/i.test(navigator.userAgent.toLowerCase());
    if(!isAppInside){//给非微信易信浏览器
        audioAutoPlay('bg-music');
    }
</script>
@yield('scripts')
<div style="display:none;">
    <script src="https://s11.cnzz.com/z_stat.php?id=1262847468&web_id=1262847468" language="JavaScript"></script>
</div>
<script>
    $().ready(function () {
        var is_playing = true;
        $('#playMusic').on('touchend',function () {
            if ( is_playing ){
                $('#playMusic img').eq(0).addClass('hide');
                $('#playMusic img').eq(1).removeClass('hide');
                is_playing = false;
                $('#bg-music')[0].pause();
            }
            else{
                $('#playMusic img').eq(1).addClass('hide');
                $('#playMusic img').eq(0).removeClass('hide');
                is_playing = true;
                $('#bg-music')[0].play();
            }

        })
        _czc.push(["_trackEvent","abilix-H5","loading"]);
        _czc.push(["_trackEvent","abilix-H5","p-1"]);
        _czc.push(["_trackEvent","abilix-H5","p-2"]);
    })
</script>
</body>
</html>
