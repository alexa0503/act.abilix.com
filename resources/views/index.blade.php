@extends('layouts.app')
@section('content')
    <div class="container hide page" id="page1">
        <div class="row">
            <div class="topper-01">
                <img src="/images/topper-01.png" class="img-responsive" >
            </div>
            <div class="default-album">
                <img src="/images/default-album.png" class="img-responsive" >
            </div>
            <div class="rows text-center choose">
                <div class="col-xs-6">
                    <span class="btn btn-camera" ></span>
                    <input type="file" accept="image/*;" capture="camera" id="file-camera" >
                </div>
                <div class="col-xs-6">
                    <span class="btn btn-album" ></span>
                    <input type="file" accept="image/*" id="file-ablum">
                </div>
            </div>
        </div>
    </div>
    <div class="container page" id="page2">
        <div class="row">
            <div class="topper-01">
                No.001
            </div>
            <div class="custom-album">
                <div id="custom-album">
                    <img src="/images/test-photo.jpg"  >
                    <input type="hidden" name="image" value="">
                </div>
            </div>
            <div class="work-name">
                <div><img src="/images/icon-name.png"  /></div>
                <div><input type="text" name="name" value=""></div>
            </div>
            <div class="rows btns-upload">
                <div class="col-xs-6 text-left">
                    <button class="btn btn-upload"></button>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-reset"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container hide page" id="page3">
        <div class="row">
            <div><img src="/images/page-success.png" class="img-responsive" /></div>
            <div class="btns-page3">
                <div class="col-xs-6 text-left">
                    <a class="btn btn-list" href="{{url('/list')}}"></a>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-share"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-tip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Loading...
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <div class="modal fade" id="modal-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="/images/share.png" width="500" />
                    <div class="share-close"><img src="/images/icon-close.png" class="img-responsive" /></div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
@endsection
@section('scripts')
    <script src=/js/hammer.min.js></script>
    <script src=/js/hammer-time.min.js></script>
    <script src=/js/velocity.min.js></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js "></script>
    <script>
        var hasSubmitted = false;
        $().ready(function(){
            $(document).ajaxStart(function () {
                hasSubmitted = true;
                $('#modal-tip').modal({keyboard: false,show:true,backdrop: 'static'});
            }).ajaxComplete(function(){
                hasSubmitted = false;
                $('#modal-tip').modal('hide');
            });
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
            var nWidth = img.width();
            var nHeight = img.height();  //获取目标图片的高宽
            var mWidth = $("#custom-album").width();
            var mHeight = $("#custom-album").height();

            var scale1 = parseFloat(480/nWidth);
            var scale2 = parseFloat(480/nHeight);
            var minScale = scale1.toFixed(1);
            if ( scale1 < scale2 ){
                minScale = scale2.toFixed(1);
            }

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
            });


            ///////
            $('.btn-upload').on('touchend',function(){
                var work_name = $('input[name="name"]').val();
                var image = $('input[name="image"]').val();
                if ( !hasSubmitted ){
                    if ( work_name === '' ){
                        alert('作品名不能为空哦');
                    }
                    else{
                        $.ajax({
                            url:'{{url("/upload")}}',
                            data:{name:work_name, image:image,_token: window.Laravel.csrfToken},
                            dataType:'json',
                            method:'POST'
                        }).done(function(json) {
                            if (json.ret == 0){
                                $('.page').addClass('hide');
                                $('#page3').removeClass('hide');
                            }
                        }).fail(function() {
                            alert( "上传失败，请稍候重试" );
                        }).always(function() {
                            //alert( "complete" );
                        });
                    }
                }

            });
            $('.btn-reset').on('touchend',function () {
                $('.page').addClass('hide');
                $('#page1').removeClass('hide');
            })
            $('#file-ablum,#file-camera').on('change',function () {
                $('.page').addClass('hide');
                $('#page2').removeClass('hide');
            });
            $('.btn-share').on('touchend', function () {
                $('#modal-share').modal({keyboard: false,show:true});
            })
            $('.share-close').on('touchend', function(){
                $('#modal-share').modal('hide');
            });
        })
    </script>
@endsection