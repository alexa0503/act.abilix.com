<html>
<head>
  <title>{{ config('app.name', '') }}</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <!------CSS------->
  <link rel="stylesheet" type="text/css" href="p2/css/loading.wj.css?v=1">
  <!--<link rel="stylesheet" type="text/css" href="css/p2home.percent.css?v=1">-->
  <link rel="stylesheet" type="text/css" href="p2/css/1-ani.wj.css">
  <link rel="stylesheet" type="text/css" href="p2/css/animate.css">
  <!------JS------->
  <script type="text/javascript" src="p2/js/jquery.min.js"></script>
  <script type="text/javascript" src="p2/js/main.js"></script>
  <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
  @php
  $js = \EasyWeChat::js();
  @endphp
  <script>
  function wxShare(data) {
    wx.ready(function () {
      wx.onMenuShareAppMessage({
        title: data.title, // 分享标题
        desc: data.desc, // 分享描述
        link: data.link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: data.imgUrl, // 分享图标
        type: data.type || 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: data.dataUrl || '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
          // 用户确认分享后执行的回调函数
          _czc.push(["_trackEvent","abilix-H5","bt-分享完成"]);
        },
        cancel: function () {
          // 用户取消分享后执行的回调函数
        }
      });
      wx.onMenuShareTimeline({
        title: data.title, // 分享标题
        desc: data.desc, // 分享描述
        link: data.link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: data.imgUrl, // 分享图标
        type: data.type || 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: data.dataUrl || 'link', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
          // 用户确认分享后执行的回调函数
          _czc.push(["_trackEvent","abilix-H5","bt-分享完成"]);
        },
        cancel: function () {
          // 用户取消分享后执行的回调函数
        }
      });
    });

  }
  @if(env('APP_ENV') != 'local')
  wx.config({!! $js->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ', 'onMenuShareWeibo','chooseImage','uploadImage','downloadImage'), false) !!});
  wxData = {
    title: '暑期小心！前方有一大波奖金礼物……至高10000元', // 分享标题
    desc: '内含10000元现金大奖，手快有手慢无', // 分享描述
    link: '{{url("/phase2")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    imgUrl: '{{asset("/images/share.jpg")}}' // 分享图标
  };
  wxShare(wxData);
  @endif
  </script>
</head>
<body onload='init();' class='p2home'>

  <!---------------------背景音乐开始------------------------>
  <audio id="Jaudio" class="media-audio" src="/bg.mp3" preload loop="loop"></audio >
    <!---------------------背景音乐结束------------------------>

    <!---------------------背景图片开始------------------------>
    <div class="abs bg" > </div>
    <!---------------------背景图片结束------------------------>

    <!---------------------加载条开始------------------------>
    <div class="abs loading" >
      <div class="abs bar102" >
        <div class="abs text-layer2" >1%</div>
      </div>
      <div class="abs bar100" >
        <img class="ptimg" src="images/loading/loading_bar100_bar_bg.png" />
        <div class="abs bar" ><img class="ptimg" src="images/loading/loading_bar100_bar.png" /></div>
      </div>
    </div>
    <!---------------------加载条结束------------------------>


    <!---------------------第一屏开始------------------------>
    <div class="abs p2home" >
      <div class="abs bg" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_bg.png" /></div>
      <div class="abs robot" >
        <div class="abs light2" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_light2.png" /></div>
        <div class="abs light1" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_light1.png" /></div>
        <div class="abs icons" >
          <div class="abs layer_33" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_33.png" /></div>
          <div class="abs layer_32" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_32.png" /></div>
          <div class="abs layer_31" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_31.png" /></div>
          <div class="abs layer_30" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_30.png" /></div>
          <div class="abs layer_29" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_29.png" /></div>
          <div class="abs layer_28" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_28.png" /></div>
          <div class="abs layer_27" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_27.png" /></div>
          <div class="abs layer_26" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_26.png" /></div>
          <div class="abs layer_25" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_25.png" /></div>
          <div class="abs layer_24" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_24.png" /></div>
          <div class="abs layer_23" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_23.png" /></div>
          <div class="abs layer_16" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_16.png" /></div>
          <div class="abs layer_15" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_layer_15.png" /></div>
          <div onclick="$('.cpjsfc').fadeIn();" class="abs tsfh" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_icons_tsfh.png" /></div>
        </div>
        <div class="abs jqr" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_robot_jqr.png" /></div>
      </div>
      <div class="abs title" >
        <div class="abs title" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_title.png" /></div>
        <div class="abs titdeco">
          <div class="abs layer_34" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_34.png" /></div>
          <div class="abs layer_35" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_35.png" /></div>
          <div class="abs layer_36" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_36.png" /></div>
          <div class="abs layer_37" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_37.png" /></div>
          <div class="abs layer_38" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_38.png" /></div>
          <div class="abs layer_39" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_title_layer_39.png" /></div>
        </div>
      </div>
      <div class="abs box" >
        <div class="abs hz" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_box_hz.png" /></div>
      </div>
      <div class="abs btn-clue-pp" >
        <div href="javascript:void(0);" onclick="$('.hdsm').fadeIn();" class="abs btn-clue" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_btn-clue-pp_btn-clue.png" /></div>
      </div>
      <div class="abs btn-btm" >
        <div  onclick="" class="abs btn2" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_btn-btm_btn2.png" /></div>
        <div  onclick="" class="abs btn1" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_btn-btm_btn1.png" /></div>
      </div>
      <div class="abs btn-music-pp" >
        <div href="javascript:void(0);" onclick="JSMusic.me.play();" class="abs yloff"  style="display:none;"><img class="ptimg" src="images/empty.png" data="p2home/p2home_btn-music-pp_yloff.png" /></div>
        <div href="javascript:void(0);" onclick="JSMusic.me.stop();" class="abs ylon" ><img class="ptimg" src="images/empty.png" data="p2home/p2home_btn-music-pp_ylon.png" /></div>
      </div>
    </div>
    <!---------------------第一屏结束------------------------>


    <!---------------------浮层1开始------------------------>
    <div class="abs cpjsfc" style='display:none;'>
      <img class="ptimg" src="images/empty.png" data="images/page1/cpjsfc_wz.png" />
      <a href="https://abilix.tmall.com/shop/view_shop.htm?id=3000224980" class="abs qrcode1" ><img class="ptimg" src="images/empty.png" data="images/page1/cpjsfc_qrcode1.png" /></a>
      <a href="https://shop.m.jd.com?shopId=1000079405" class="abs qrcode2" ><img class="ptimg" src="images/empty.png" data="images/page1/cpjsfc_qrcode2.png" /></a>
      <a href="javascript:void(0);" onclick="$('.cpjsfc').hide();" class="abs button" ><img class="ptimg" src="images/empty.png" data="images/page1/cpjsfc_button.png" /></a>
    </div>
    <!---------------------浮层1结束------------------------>
    <!---------------------浮层2开始------------------------>
    <div class="abs hdsm" style="display:none;">
      <img class="ptimg" src="images/empty.png" data="images/page2/page2_hdsm_txt.png" />
      <a href="javascript:void(0);" onclick="$('.hdsm').hide();" class="abs button_2_kb" ><img class="ptimg" src="images/empty.png" data="images/page2/page2_hdsm_button_2_kb.png" /></a>
    </div>
    <div style="display:none;">
        <script src="https://s11.cnzz.com/z_stat.php?id=1262847468&web_id=1262847468" language="JavaScript"></script>
    </div>
    <script>
        $().ready(function () {
            _czc.push(["_trackEvent","abilix-H5","loading"]);
            _czc.push(["_trackEvent","abilix-H5","p-1"]);
            _czc.push(["_trackEvent","abilix-H5","p-2"]);
            $('.btn1').on('click',function(){
              location.href="{{url('/phase2/index')}}"
            })
            $('.btn2').on('click',function(){
              location.href="{{url('/phase2/list')}}"
            })
        })
    </script>
    <!---------------------浮层2结束------------------------>

    <!---------------------脚本开始------------------------>
    <script>
    //播放音频
    window.audioAutoPlay('Jaudio');
    //禁止窗口的默认滑动
    document.ontouchmove = function(e){
      e.preventDefault();
    }
    </script>
    <!---------------------脚本结束------------------------>



  </body>
  </html>
