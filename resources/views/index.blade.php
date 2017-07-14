@extends('layouts.app')
@section('content')
    <div class="container page" id="page1">
        <div class="row">
            <div class="topper-01">
                <img src="/images/topper-01.png" class="img-responsive" >
            </div>
            <div class="default-album">
                <img src="/images/default-album.png" class="img-responsive" >
            </div>
            <div class="rows text-center choose">
                <div class="col-xs-6">
                    <span class="btn btn-camera" id="camera"></span>
                </div>
                <div class="col-xs-6">
                    <span class="btn btn-album" ></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container hide page" id="page2">
        <div class="row">
            <div class="topper-01">
                No.{{$count}}
            </div>
            <div class="custom-album">
                <div id="custom-album">
                    <img src="" width="" height="" id="upload-image"  >
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
            <div id="log-info hide"></div>
        </div>
    </div>
    <div class="container hide page" id="page3">
        <div class="row">
            <div style="margin-top: 140px;"><img src="/images/page-success.png" /></div>
            <div class="btns-page3">
                <div class="col-xs-6 text-left">
                    <a class="btn btn-list" href="{{url('/list')}}" onclick="_czc.push(['_trackEvent','abilix-H5','bt-作品排名']);"></a>
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
    <script src="/js/abilix.index.js?v=0.2"></script>
@endsection