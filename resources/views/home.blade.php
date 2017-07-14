<html>
<head>
    <title>{{ config('app.name', '') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/1-homepage.wj.css?v=1">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Velocityjs.js"></script>
    <script type="text/javascript" src="js/velocity.easeplus.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="/js/abilix.js"></script>
    @php
        $js = \EasyWeChat::js();
    @endphp
    <script>
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
<body class='HomePage' onload='init();'>
<div class="abs bg" > </div>
<div class="abs page1" >
    <div class="abs deco-pre"  style='display:none;'>
        <div class="abs layer_21" ><img class="ptimg" src="1-homepage/page1_deco_layer_21.png" /></div>
        <div class="abs layer_26" ><img class="ptimg" src="1-homepage/page1_deco_layer_26.png" /></div>
        <div class="abs layer_21_kb" ><img class="ptimg" src="1-homepage/page1_deco_layer_21_kb.png" /></div>
        <div class="abs layer_22" ><img class="ptimg" src="1-homepage/page1_deco_layer_22.png" /></div>
        <div class="abs layer_22_kb_2" ><img class="ptimg" src="1-homepage/page1_deco_layer_22_kb_2.png" /></div>
        <div class="abs layer_22_kb" ><img class="ptimg" src="1-homepage/page1_deco_layer_22_kb.png" /></div>
        <div class="abs layer_25" ><img class="ptimg" src="1-homepage/page1_deco_layer_25.png" /></div>
        <div class="abs layer_25_kb" ><img class="ptimg" src="1-homepage/page1_deco_layer_25_kb.png" /></div>
        <div class="abs layer_23" ><img class="ptimg" src="1-homepage/page1_deco_layer_23.png" /></div>
        <div class="abs layer_24" ><img class="ptimg" src="1-homepage/page1_deco_layer_24.png" /></div>
        <div class="abs layer_16" ><img class="ptimg" src="1-homepage/page1_deco_layer_16.png" /></div>
        <div class="abs slzndx" ><img class="ptimg" src="1-homepage/page1_deco_slzndx.png" /></div>
        <div class="abs slzndx" ><img class="ptimg" src="1-homepage/page1_deco_slzndx.png" /></div>
        <div class="abs slzndx" ><img class="ptimg" src="1-homepage/page1_deco_slzndx.png" /></div>
        <div class="abs layer_29" ><img class="ptimg" src="1-homepage/page1_deco_layer_29.png" /></div>
    </div>
    <div class="abs robot-ori"  style='display:none;'>
        <div class="abs layer_28" ><img class="ptimg" src="1-homepage/page1_robot_layer_28.png" /></div>
        <div class="abs layer_27" ><img class="ptimg" src="1-homepage/page1_robot_layer_27.png" /></div>
        <div class="abs layer_8" ><img class="ptimg" src="1-homepage/page1_robot_layer_8.png" /></div>
    </div>
    <div class="abs hz" ><img class="ptimg" src="1-homepage/page1_hz.png" /></div>
    <div class="abs bt2" ><img class="ptimg" src="1-homepage/page1_bt2.png" /></div>
    <div class="abs header" >
        <div class="abs layer_30" ><img class="ptimg" src="1-homepage/page1_header_layer_30.png" /></div>
        <div class="abs layer_35" ><img class="ptimg" src="1-homepage/page1_header_layer_35.png" /></div>
        <div class="abs layer_34" ><img class="ptimg" src="1-homepage/page1_header_layer_34.png" /></div>
        <div class="abs layer_32" ><img class="ptimg" src="1-homepage/page1_header_layer_32.png" /></div>
        <div class="abs layer_33" ><img class="ptimg" src="1-homepage/page1_header_layer_33.png" /></div>
        <div class="abs layer_31" ><img class="ptimg" src="1-homepage/page1_header_layer_31.png" /></div>
    </div>
    <div class="abs button" >
        <a href="javascript:void(0);" onclick="HomePage.me.showRule();" class="abs button_1" ><img class="ptimg" src="1-homepage/page1_button_button_1.png" /></a>
        <a href="/index" onclick="" class="abs button_2" ><img class="ptimg" src="1-homepage/page1_button_button_2.png" /></a>
    </div>
    <div class="abs hdsm" style="display:none;" >
        <img class="ptimg" src="1-homepage/page1_hdsm_slzndx.png" />
        <a href="javascript:void(0);" onclick="HomePage.me.hideRule();" class="abs button_2_kb" ><img class="ptimg" src="1-homepage/page1_hdsm_button_2_kb.png" /></a>
    </div>
</div>
<div style="display:none;">
    <script src="https://s11.cnzz.com/z_stat.php?id=1262847468&web_id=1262847468" language="JavaScript"></script>
</div>
</body>
</html>