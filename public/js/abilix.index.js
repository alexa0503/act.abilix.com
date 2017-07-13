
var image = '';
var x = 0;
var y = 0;
var scale = 1;
$().ready(function(){

    var img = $("#custom-album img");
    var manager = new Hammer.Manager($("#custom-album")[0]);  	//stage---->表示要加入手势的dom节点
    var Pan = new Hammer.Pan();			//Pan是移动对象实例
    var Pinch = new Hammer.Pinch();		//Pinch是缩放的对象实例

    Pinch.recognizeWith([Pan]);
    manager.add(Pan);
    manager.add(Pinch);

    var deltaX = 0;
    var deltaY = 0;
    var nLeftTemp = 0;
    var nTopTemp = 0;
    var liveScale = 1;
    var currentScale = 1;
    var nWidth = img.width() || 0;
    var nHeight = img.height() || 0;  //获取目标图片的高宽
    var mWidth = $("#custom-album").width();
    var mHeight = $("#custom-album").height();
    var minScale = 1;

    wx.ready(function () {
        $('.btn-camera,.btn-album').on('touchend',function () {
            //alert($(this).attr('id'));
            var localIds;
            if ($(this).attr('id') == 'camera'){
                var sourceType = ['camera'];
            }
            else{
                var sourceType = ['album'];
            }
            wx.chooseImage({
                count: 1, // 默认9
                sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: sourceType, // 可以指定来源是相册还是相机，默认二者都有
                success: function (res) {
                    localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                    setTimeout(function () {
                        wx.uploadImage({
                            localId: localIds[0], // 需要上传的图片的本地ID，由chooseImage接口获得
                            isShowProgressTips: 1, // 默认为1，显示进度提示
                            success: function (res) {
                                var serverId = res.serverId; // 返回图片的服务器端ID
                                var url = '{{url("/image")}}'+'/'+serverId;
                                $.ajax({
                                    url: url,
                                    dataType:'json',
                                    method:'GET'
                                }).done(function(json) {
                                    if (json.ret == 0){
                                        nWidth = json.data.width;
                                        nHeight = json.data.height;
                                        var scale1 = parseFloat(480/nWidth);
                                        var scale2 = parseFloat(480/nHeight);
                                        if ( scale1 < scale2 ){
                                            minScale = scale2.toFixed(1);
                                        }
                                        else{
                                            minScale = scale1.toFixed(1);
                                        }
                                        currentScale = 1;
                                        liveScale = 1;
                                        deltaX = 0;
                                        deltaY = 0;
                                        nLeftTemp = 0;
                                        nTopTemp = 0;
                                        $('#upload-image').width(json.data.width);
                                        $('#upload-image').height(json.data.height);
                                        $('#upload-image').attr('src', json.data.url);
                                        image = json.data.path;
                                        $('.page').addClass('hide');
                                        $('#page2').removeClass('hide');
                                        //$("#log-info").html('width:'+nWidth+',height:'+nHeight);
                                    }
                                }).fail(function() {
                                    alert( "上传失败，请稍候重试" );
                                }).always(function() {
                                    //alert( "complete" );
                                });
                            }
                        });
                    },100);
                }
            });
        });
    });

    manager.on('panmove', function (e) {
        var dX = deltaX + e.deltaX;
        var dY = deltaY + e.deltaY;
        $.Velocity.hook(img, 'translateX', dX + 'px');
        $.Velocity.hook(img, 'translateY', dY + 'px');   //注Velocity是动画js库
    });
    manager.on('panend', function (e) {
        deltaX = deltaX + e.deltaX;
        deltaY = deltaY + e.deltaY;
        var nOffSet = img.offset();  //这行开始下面是控制边界的逻辑
        var nLeft = nOffSet.left;
        var nTop = nOffSet.top;
        var mOffset = $("#custom-album").offset();
        var nMaxLeft = mOffset.left - 4;     //最大左移的位置
        var nMaxTop = mOffset.top - 4;    //最大上移的位置
        var nMaxRight = mOffset.left + mWidth - liveScale * nWidth + 4;   //最大右移位置
        var nMaxBottom = mOffset.top + mHeight - liveScale * nHeight + 4; //最大底部的位置

        if ( nLeft < nMaxRight){
            nLeftTemp = nMaxRight;
        }
        else if (nLeft > nMaxLeft){
            nLeftTemp = nMaxLeft;
        }
        else{
            nLeftTemp = nLeft;
        }
        if (nTop < nMaxBottom){
            nTopTemp = nMaxBottom;
        }
        else if (nTop > nMaxTop){
            nTopTemp = nMaxTop;
        }
        else{
            nTopTemp = nTop;
        }
        img.offset({
            left: nLeftTemp,
            top: nTopTemp
        });
        scale = currentScale;
        x = -1*(nLeftTemp - mOffset.left + 4);
        y = -1*(nTopTemp - mOffset.top + 4);
        //$('#log-info').html('x:'+x+', y:'+y+', scale:'+scale);
    });

    function getRelativeScale(scale) {
        return scale * currentScale;
    }
    manager.on('pinchmove', function (e) {
        var scale = getRelativeScale(e.scale);
        if(scale > 1){
            scale = 1;
        } //防止图片太糊，这里限制图片放大的最大倍数
        if(scale < minScale){
            scale = minScale;
        }  //不让图片缩小
        $.Velocity.hook(img, 'scale', currentScale);
    });
    manager.on('pinchend', function (e) {
        currentScale = getRelativeScale(e.scale);
        if(currentScale > 1){
            currentScale = 1;
        }

        if(currentScale < minScale){
            currentScale = minScale;
        }
        liveScale = currentScale;
        $.Velocity.hook(img, 'scale', currentScale);  //这里先放缩后然后做边界控制

        var nOffSet = img.offset();
        var nLeft = nOffSet.left;
        var nTop = nOffSet.top;

        var mOffset = $("#custom-album").offset();
        var nMaxLeft = mOffset.left - 4;     //最大左移的位置
        var nMaxTop = mOffset.top - 4;    //最大上移的位置
        var nMaxRight = mOffset.left + mWidth - liveScale * nWidth + 4;   //最大右移位置
        var nMaxBottom = mOffset.top + mHeight - liveScale * nHeight + 4; //最大底部的位置

        if ( nLeft < nMaxRight){
            nLeftTemp = nMaxRight;
        }
        else if (nLeft > nMaxLeft){
            nLeftTemp = nMaxLeft;
        }
        else{
            nLeftTemp = nLeft;
        }
        if (nTop < nMaxBottom){
            nTopTemp = nMaxBottom;
        }
        else if (nTop > nMaxTop){
            nTopTemp = nMaxTop;
        }
        else{
            nTopTemp = nTop;
        }
        img.offset({
            left: nLeftTemp,
            top: nTopTemp
        });
        scale = currentScale;
        x = -1*(nLeftTemp - mOffset.left + 4);
        y = -1*(nTopTemp - mOffset.top + 4);
        //$('#log-info').html('x:'+x+', y:'+y+', scale:'+scale);
    });


    ///////
    $('.btn-upload').on('touchend',function(){
        var work_name = $('input[name="name"]').val();
        if ( !hasSubmitted ){
            if ( work_name === '' ){
                alert('作品名不能为空哦');
            }
            else{
                $.ajax({
                    url:'{{url("/upload")}}',
                    data:{name:work_name, image:image, x:x, y:y, scale:scale, _token: window.Laravel.csrfToken},
                    dataType:'json',
                    method:'POST'
                }).done(function(json) {
                    if (json.ret == 0){
                        $('.page').addClass('hide');
                        $('#page3').removeClass('hide');
                        wxData.link = json.data.share_url;
                        wxShare(wxData);
                    }
                    else{
                        alert(json.msg);
                    }
                }).fail(function( jqXHR, textStatus, errorThrown) {
                    //$('#log-info').html(JSON.stringify(jqXHR));
                    alert( "上传失败，请稍候重试" );
                }).always(function() {
                    //alert( "complete" );
                });
            }
        }

    });
    $('.btn-reset').on('click',function () {
        $('.page').addClass('hide');
        $('#page1').removeClass('hide');
    })
    $('.btn-share').on('touchend', function () {
        $('#modal-share').modal({keyboard: false,show:true});
    })
    $('.share-close').on('touchend', function(){
        $('#modal-share').modal('hide');
    });
})