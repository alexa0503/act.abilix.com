<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="" name=description>
    <meta content="Alx" name=author>
    <title>{{ config('app.name') }}</title>
    <link href="/css/bootstrap.css" rel=stylesheet>
    <!--[if lt IE 9]><script src=/js/ie8-responsive-file-warning.js></script><![endif]-->
    <!--[if lt IE 9]> <script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script> <script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script> <![endif]-->
    <link href="/css/abilix.css?v=0.2" rel=stylesheet>
    <link href="/apple-touch-icon.png" rel=apple-touch-icon>
    <script src=/js/jquery.min.js></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
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
            title: '能力风暴教育机器人积木系列', // 分享标题
            desc: '能力风暴教育机器人积木系列', // 分享描述
            link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: '{{asset("images/share.jpg")}}' // 分享图标
        };
        wxShare(wxData);
        @endif
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
<script src="/js/bootstrap.min.js"></script>
<script src="/js/abilix.js?v=0.2"></script>
@yield('scripts')
<div style="display:none;">
    <script src="https://s11.cnzz.com/z_stat.php?id=1262847468&web_id=1262847468" language="JavaScript"></script>
</div>
<script>
    $().ready(function () {
        _czc.push(["_trackEvent","abilix-H5","loading"]);
        _czc.push(["_trackEvent","abilix-H5","p-1"]);
        _czc.push(["_trackEvent","abilix-H5","p-2"]);
    })
</script>
</body>
</html>
