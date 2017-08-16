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
$().ready(function(){
    if (  $('#bg-music')[0].paused === false ){
        $('#playMusic img').eq(1).removeClass('hide');
    }
    else{
        $('#playMusic img').eq(0).removeClass('hide');
    }
    $('#playMusic').on('touchend',function () {
        if (  $('#bg-music')[0].paused === false ){
            $('#playMusic img').eq(0).addClass('hide');
            $('#playMusic img').eq(1).removeClass('hide');
            //is_playing = false;
            $('#bg-music')[0].pause();
        }
        else{
            $('#playMusic img').eq(1).addClass('hide');
            $('#playMusic img').eq(0).removeClass('hide');
            //is_playing = true;
            $('#bg-music')[0].play();
        }
    })
    $(document).bind("ajaxStart.abilix", function () {
        hasSubmitted = true;
        $('#modal-tip').modal({keyboard: false,show:true,backdrop: 'static'});
    })
    $(document).bind("ajaxComplete.abilix", function(){
        hasSubmitted = false;
        $('#modal-tip').modal('hide');
    });
    var h = $(window).height() - $('#header').height()/_s;
    $('.page1').height(h);
    //$('.section').height(h);

    $('.btn-share').on('touchend', function () {
        //_czc.push(["_trackEvent","abilix-H5","bt-立刻分享"]);
        $('#modal-share').modal({keyboard: false,show:true});
    })
    $('.share-close').on('touchend', function(){
        $('#modal-share').modal('hide');
    });



    _czc.push(["_trackEvent","abilix-H5","loading"]);
    _czc.push(["_trackEvent","abilix-H5","p-1"]);
    _czc.push(["_trackEvent","abilix-H5","p-2"]);
});
