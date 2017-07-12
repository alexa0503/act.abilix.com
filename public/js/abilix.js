var wxData = {
    link:''
};
function wxShare(data){
    wx.ready(function(){
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

function getWork(id)
{
    var url = '/work/'+id;
    $.ajax({
        url: url,
        dataType:'json',
        method:'GET'
    }).done(function(work) {
        $('#work-id').html(work.id);
        $('#work-image').attr('src',work.image);
        $('#work-name').html(work.name);
        $('#work-vote').html(work.vote_num);
        $(".page").addClass("hide");
        $('#page-work').removeClass("hide");
    }).fail(function() {
        alert('获取信息失败，请稍候重试~')
    }).always(function() {
        //alert( "complete" );
    });
    if ( $('#page-work').hasClass('hide') ){
        wxData.link = '/';
    }
    else{
        wxData.link = '/list/'+id;
    }
    wxShare(wxData);
}
