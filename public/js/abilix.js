var wxData = {
    link: ''
};
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
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareAppMessage({
            title: data.title, // 分享标题
            desc: data.desc, // 分享描述
            link: data.link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: data.imgUrl, // 分享图标
            type: data.type || 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: data.dataUrl || 'link', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });

}

function getWork(id) {
    $(document).bind(".abilix");
    var url = '/work/' + id;
    $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET'
    }).done(function (work) {
        var obj = $('#page-work .heart a');
        $('#work-id').html(work.id);
        $('#work-image').attr('src', work.image);
        $('#work-name').html(work.name);
        $('#work-vote').html(work.vote_num);
        if (work.has_voted){
            obj.find('img').eq(1).removeClass('hide');
        }
        else{
            obj.find('img').eq(0).removeClass('hide');
        }
        $(".page").addClass("hide");
        $('#page-work').removeClass("hide");
        $('#page-work .heart a').bind('click',function (e) {
            vote(work.id,obj);
        });
    }).fail(function () {
        alert('获取信息失败，请稍候重试~')
    }).always(function () {
        //alert( "complete" );
    });
    if ($('#page-work').hasClass('hide')) {
        wxData.link = '/';
    }
    else {
        wxData.link = '/list/' + id;
    }
    wxShare(wxData);
}
var hasVoted = false;
function vote(id,obj) {
    $(document).unbind(".abilix");
    var url = '/vote/' + id;
    if ( !hasVoted ){
        hasVoted = true;
        $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET'
        }).done(function (json) {
            var _obj;
            var img = obj.find('img');
            var heart = obj.parent('.heart');
            if ( img.eq(1).hasClass('hide') ){
                _obj = heart.append('<div class="animation1">+1</div>').find('.animation1');
                _obj.animate({top:"-20px"},800, 'linear', function () {
                    _obj.hide(20).remove();
                    img.eq(0).addClass('hide');
                    img.eq(1).removeClass('hide');
                    heart.find('span').text(json.vote_num);
                    hasVoted = false;
                });
            }
            else{
                _obj = heart.append('<div class="animation2">-1</div>').find('.animation2');
                _obj.animate({top:"80px"},800, 'linear', function () {
                    _obj.hide(20).remove();
                    img.eq(1).addClass('hide');
                    img.eq(0).removeClass('hide');
                    heart.find('span').text(json.vote_num);
                    hasVoted = false;
                });
            }
        }).fail(function () {
            alert('点赞失败，请稍候重试~');
            hasVoted = false;
        }).always(function () {
            //alert( "complete" );
        });
    }
}
