<html>
<head>
    <title>{{ config('app.name', '') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/loading.wj.css?v=1">
    <link rel="stylesheet" type="text/css" href="css/1-ani.wj.css?v=1">
    <link rel="stylesheet" type="text/css" href="css/animate.css?v=1">
    <link rel="stylesheet" type="text/css" href="css/idangerous.swiper.css">
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="js/idangerous.swiper.min.js"></script>
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
    <!--<script type="text/javascript" src="js/Velocityjs.js"></script>-->
    <!--<script type="text/javascript" src="js/velocity.min.js"></script>-->
    <!--<script type="text/javascript" src="js/velocity.easeplus.min.js"></script>-->
    <script type="text/javascript" src="js/CSSPlugin.min.js"></script>
    <script type="text/javascript" src="js/EasePack.min.js"></script>
    <script type="text/javascript" src="js/TweenLite.min.js"></script>
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
            title: '暑期小心！前方有一大波奖金礼物……至高10000元', // 分享标题
            desc: '内含10000元现金大奖，手快有手慢无', // 分享描述
            link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: '{{asset("images/share.jpg")}}' // 分享图标
        };
        wxShare(wxData);
        @endif
    </script>
</head>



<!--[if lte IE 7]>
<body class='HomePage' onload='init();' scroll="no">
<![endif]-->
<!--[if gt IE 7]><!-->
<body class='HomePage' onload='init();'>
<!--<![endif]-->
<audio id="Jaudio" class="media-audio" src="/bg.mp3" preload loop="loop"></audio >


<div class="abs bg" > </div>


<div class="abs loading" >
    <!--  <div class="abs bar50" >
        <div class="abs bar_bg" ><img class="ptimg" src="loading/loading_bar50_bar_bg.png" /></div>
        <div class="abs bar" ><img class="ptimg" src="loading/loading_bar50_bar.png" /></div>
        <div class="abs text-layer1" >50%</div>
      </div>-->
    <!--<div class="abs bar100" >
      <div class="abs text-layer2" >1%</div>
      <div class="abs bar_bg" ><img class="ptimg" src="loading/loading_bar100_bar_bg.png" /></div>
      <div class="abs bar" ><img class="ptimg" src="loading/loading_bar100_bar.png" /></div>
    </div>-->
</div>



<div class="abs ylan" ><img class="ptimg" src="page1/ylan.png" /></div>
<div class="abs xhan updown" style='display:none;'><img class="ptimg" src="page1/page1_xhan.png" /></div>

<div class="abs cpjsfc" style='display:none;'>
    <img class="ptimg" src="page1/page1_cpjsfc_wz.png" />
    <a href="javascript:void(0);" onclick="$('.cpjsfc').hide();" class="abs button" ><img class="ptimg" src="page1/page1_cpjsfc_button.png" /></a>
</div>



<div class="abs hdsm" style="display:none;">
    <img class="ptimg" src="page2/page2_hdsm_txt.png" />
    <a href="javascript:void(0);" onclick="$('.hdsm').hide();" class="abs button_2_kb" ><img class="ptimg" src="page2/page2_hdsm_button_2_kb.png" /></a>
</div>

<!-- 框架[[ -->
<div class="swiper-container">
    <div class="swiper-wrapper">

        <div class="swiper-slide n1">
            <div class="screen1">
                <!--第1屏-->
                <div class="abs page1" >
                    <div class="abs bg" > </div>
                    <div class="abs hz" >
                        <div class="abs hz3" ><img class="ptimg" src="page1/page1_hz_hz.png" /></div>
                        <div class="abs bt1" >
                            <div class="abs slzndx1" ><img class="ptimg" src="page1/page1_hz_bt1_slzndx1.png" /></div>
                            <div class="abs slzndx2" ><img class="ptimg" src="page1/page1_hz_bt1_slzndx2.png" /></div>
                            <div class="abs slzndx3" ><img class="ptimg" src="page1/page1_hz_bt1_slzndx3.png" /></div>
                            <div class="abs slzndx4" ><img class="ptimg" src="page1/page1_hz_bt1_slzndx4.png" /></div>
                            <div class="abs slzndx5" ><img class="ptimg" src="page1/page1_hz_bt1_slzndx5.png" /></div>
                            <div class="abs title1" ><img class="ptimg" src="page1/page1_hz_bt1_title1.png" /></div>
                        </div>
                    </div>
                    <div class="abs robot"  style='display:none;'>
                        <div class="abs light" style='display:none;'>
                            <div class="abs slzndx_kb_3" ><img class="ptimg" src="page1/page1_robot_fdys_slzndx_kb_3.png" /></div>
                        </div>
                        <div class="abs fdys"  style='display:none;'>
                            <div class="abs layer_21" ><img class="ptimg" src="page1/page1_robot_fdys_layer_21.png" /></div>
                            <div class="abs layer_21_kb" ><img class="ptimg" src="page1/page1_robot_fdys_layer_21_kb.png" /></div>
                            <div class="abs layer_22" ><img class="ptimg" src="page1/page1_robot_fdys_layer_22.png" /></div>
                            <div class="abs layer_22_kb_2" ><img class="ptimg" src="page1/page1_robot_fdys_layer_22_kb_2.png" /></div>
                            <div class="abs layer_22_kb" ><img class="ptimg" src="page1/page1_robot_fdys_layer_22_kb.png" /></div>
                            <div class="abs layer_25" ><img class="ptimg" src="page1/page1_robot_fdys_layer_25.png" /></div>
                            <div class="abs layer_25_kb_2" ><img class="ptimg" src="page1/page1_robot_fdys_layer_25_kb_2.png" /></div>
                            <div class="abs layer_25_kb" ><img class="ptimg" src="page1/page1_robot_fdys_layer_25_kb.png" /></div>
                            <div class="abs layer_23" ><img class="ptimg" src="page1/page1_robot_fdys_layer_23.png" /></div>
                            <div class="abs layer_24" ><img class="ptimg" src="page1/page1_robot_fdys_layer_24.png" /></div>
                            <div class="abs layer_16" ><img class="ptimg" src="page1/page1_robot_fdys_layer_16.png" /></div>
                            <div class="abs slzndx" ><img class="ptimg" src="page1/page1_robot_fdys_slzndx.png" /></div>
                            <div class="abs layer_15" ><img class="ptimg" src="page1/page1_robot_fdys_layer_15.png" /></div>
                        </div>
                        <div class="abs jqr"  style='display:none;'><img class="ptimg" src="page1/page1_robot_jqr.png" /></div>
                        <div class="abs bt2" >
                            <div class="abs z_4" ><img class="ptimg" src="page1/page1_robot_bt2_z_4.png" /></div>
                            <!--<div class="abs slzndx1" ><img class="ptimg" src="page1/page1_robot_bt2_slzndx1.png" /></div>
                            <div class="abs slzndx2" ><img class="ptimg" src="page1/page1_robot_bt2_slzndx2.png" /></div>
                            <div class="abs slzndx3" ><img class="ptimg" src="page1/page1_robot_bt2_slzndx3.png" /></div>
                            <div class="abs slzndx4" ><img class="ptimg" src="page1/page1_robot_bt2_slzndx4.png" /></div>
                            <div class="abs slzndx5" ><img class="ptimg" src="page1/page1_robot_bt2_slzndx5.png" /></div>-->
                        </div>
                        <a href="javascript:void(0);" onclick="$('.cpjsfc').fadeIn();" class="abs tsfh" style='display:none;'><div><img class="ptimg" src="page1/page1_robot_tsfh.png" /></div></a>

                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide n2">

            <div class="screen2">
                <!--第二屏-->
                <div class="abs page2" style="display:none">
                    <div class="abs bg" ></div>
                    <div class="abs screen3" >
                        <div class="abs layer_37" ><img class="ptimg" src="page2/page2_screen3_layer_37.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page2/page2_screen3_slzndx.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page2/page2_screen3_slzndx.png" /></div>
                        <div class="abs layer_38" ><img class="ptimg" src="page2/page2_screen3_layer_38.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page2/page2_screen3_slzndx.png" /></div>
                    </div>
                    <div class="abs screen2" >
                        <div class="abs slzndx" ><img class="ptimg" src="page2/page2_screen2_slzndx.png" /></div>
                        <div class="abs layer_43" ><img class="ptimg" src="page2/page2_screen2_layer_43.png" /></div>
                        <div class="abs layer_42" ><img class="ptimg" src="page2/page2_screen2_layer_42.png" /></div>
                        <div class="abs layer_41" ><img class="ptimg" src="page2/page2_screen2_layer_41.png" /></div>
                        <div class="abs layer_40" ><img class="ptimg" src="page2/page2_screen2_layer_40.png" /></div>
                        <div class="abs layer_39" ><img class="ptimg" src="page2/page2_screen2_layer_39.png" /></div>
                        <div class="abs layer_1_kb" ><img class="ptimg" src="page2/page2_screen2_layer_1_kb.png" /></div>
                        <div class="abs layer_16" ><img class="ptimg" src="page2/page2_screen2_layer_16.png" /></div>
                    </div>
                    <div class="abs bt" >
                        <div class="abs page2title" >
                            <div class="abs slzndx1" ><img class="ptimg" src="page2/page2_bt_page2title_slzndx1.png" /></div>
                            <div class="abs slzndx2" ><img class="ptimg" src="page2/page2_bt_page2title_slzndx2.png" /></div>
                            <div class="abs slzndx3" ><img class="ptimg" src="page2/page2_bt_page2title_slzndx3.png" /></div>
                            <div class="abs slzndx4" ><img class="ptimg" src="page2/page2_bt_page2title_slzndx4.png" /></div>
                            <div class="abs slzndx5" ><img class="ptimg" src="page2/page2_bt_page2title_slzndx5.png" /></div>
                        </div>
                        <div class="abs flag" >
                            <div class="abs slzndx1" ><img class="ptimg" src="page2/page2_bt_flag_slzndx1.png" /></div>
                            <div class="abs slzndx2" ><img class="ptimg" src="page2/page2_bt_flag_slzndx2.png" /></div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" onclick="$('.hdsm').fadeIn();" class="abs button_" ><img class="ptimg" src="page2/page2_button_.png" /></a>

                </div>

            </div>
        </div>

        <div class="swiper-slide n3">
            <div class="screen3">
                <!--第三屏-->
                <div class="abs page3" >
                    <div class="abs bg" ></div>
                    <div class="abs button" >
                        <div class="abs button_1" ><img class="ptimg" src="page3/page3_button_button_1.png" /></div>
                        <div class="abs button_2" ><img class="ptimg" src="page3/page3_button_button_2.png" /></div>
                    </div>
                    <div class="abs yz" >
                        <div class="abs layer_48" ><img class="ptimg" src="page3/page3_yz_layer_48.png" /></div>
                        <div class="abs layer_51" ><img class="ptimg" src="page3/page3_yz_layer_51.png" /></div>
                        <div class="abs layer_50" ><img class="ptimg" src="page3/page3_yz_layer_50.png" /></div>
                        <div class="abs layer_49" ><img class="ptimg" src="page3/page3_yz_layer_49.png" /></div>
                        <div class="abs layer_47" ><img class="ptimg" src="page3/page3_yz_layer_47.png" /></div>
                        <div class="abs layer_53" ><img class="ptimg" src="page3/page3_yz_layer_53.png" /></div>
                        <div class="abs layer_54" ><img class="ptimg" src="page3/page3_yz_layer_54.png" /></div>
                        <div class="abs layer_52" ><img class="ptimg" src="page3/page3_yz_layer_52.png" /></div>
                        <div class="abs layer_42" ><img class="ptimg" src="page3/page3_yz_layer_42.png" /></div>
                        <div class="abs layer_46" ><img class="ptimg" src="page3/page3_yz_layer_46.png" /></div>
                        <div class="abs layer_45" ><img class="ptimg" src="page3/page3_yz_layer_45.png" /></div>
                        <div class="abs layer_44" ><img class="ptimg" src="page3/page3_yz_layer_44.png" /></div>
                        <div class="abs layer_43" ><img class="ptimg" src="page3/page3_yz_layer_43.png" /></div>
                        <div class="abs layer_38" ><img class="ptimg" src="page3/page3_yz_layer_38.png" /></div>
                        <div class="abs layer_41" ><img class="ptimg" src="page3/page3_yz_layer_41.png" /></div>
                        <div class="abs layer_40" ><img class="ptimg" src="page3/page3_yz_layer_40.png" /></div>
                        <div class="abs layer_39" ><img class="ptimg" src="page3/page3_yz_layer_39.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page3/page3_yz_slzndx.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page3/page3_yz_slzndx.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page3/page3_yz_slzndx.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page3/page3_yz_slzndx.png" /></div>
                        <div class="abs slzndx" ><img class="ptimg" src="page3/page3_yz_slzndx.png" /></div>
                    </div>
                    <div class="abs slzndx" ><img class="ptimg" src="page3/page3_slzndx.png" /></div>
                    <div class="abs layer_55" ><img class="ptimg" src="page3/page3_layer_55.png" /></div>
                    <div class="abs bt" ><img class="ptimg" src="page3/page3_bt.png" /></div>
                    <div class="abs layer_37" ><img class="ptimg" src="page3/page3_layer_37.png" /></div>
                    <!--<div class="abs robot" ><img class="ptimg" src="page3/page3_robot.png" /></div>-->
                    <div class="abs page3b" >
                        <div class="abs robot_kb" ><img class="ptimg" src="page3/page3b_robot_kb.png" /></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- 框架]] -->
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

<script>
    window.audioAutoPlay('Jaudio');
</script>
<script type="text/javascript" src="js/fullPage.min.js"></script>
<script type="text/javascript">
    //禁止窗口的默认滑动
    document.ontouchmove = function(e){
        e.preventDefault();
    }
    // interval = setTimeout(function() {
    //     runPage.go(runPage.thisPage() + 1);
    // }, 5000);

</script>

</html>