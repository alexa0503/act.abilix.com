@extends('layouts.phase2')
@section('content')
    <div class="container page2" id="phase2">
        @foreach($works as $key=>$work)
        <div class="row section">
            <div class="text-center topper">
                <img src="{{asset('images/phase2/topper-01.png')}}" />
                <div class="text-center phase2-ranking">
                    <img src="{{asset('images/phase2/icon-ranking-0'.($key+1).'.png')}}" />
                </div>
            </div>
            <div class="custom-album">
                <div id="custom-album">
                    <img src="{{asset($work->image)}}" width="480" height="480"  >
                </div>
            </div>
            <div class="phase2-number">No.{{$key+1}}</div>
            <div class="phase2-title">{{$work->name}}</div>
            <div class="phase2-heart">
                <img src="/images/icon-big-heart-empty.png" height="50" class="hide"/>
                <img src="/images/icon-big-heart.png" height="50"/> {{$work->vote_num}}
            </div>
            <div class="btns-01">
                <a class="btn btn-back" href="{{url('/phase2')}}"></a>
                <button class="btn btn-share"></button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="footer">
        <svg id="downarrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;" xml:space="preserve">
        <g>
        	<g>
        		<path d="M135.899,167.877c1.902,1.902,4.093,2.851,6.567,2.851s4.661-0.948,6.562-2.851L282.082,34.829    c1.902-1.903,2.847-4.093,2.847-6.567s-0.951-4.665-2.847-6.567L267.808,7.417c-1.902-1.903-4.093-2.853-6.57-2.853    c-2.471,0-4.661,0.95-6.563,2.853L142.466,119.622L30.262,7.417c-1.903-1.903-4.093-2.853-6.567-2.853    c-2.475,0-4.665,0.95-6.567,2.853L2.856,21.695C0.95,23.597,0,25.784,0,28.262c0,2.478,0.953,4.665,2.856,6.567L135.899,167.877z" fill="#FFFFFF"/>
        		<path d="M267.808,117.053c-1.902-1.903-4.093-2.853-6.57-2.853c-2.471,0-4.661,0.95-6.563,2.853L142.466,229.257L30.262,117.05    c-1.903-1.903-4.093-2.853-6.567-2.853c-2.475,0-4.665,0.95-6.567,2.853L2.856,131.327C0.95,133.23,0,135.42,0,137.893    c0,2.474,0.953,4.665,2.856,6.57l133.043,133.046c1.902,1.903,4.093,2.854,6.567,2.854s4.661-0.951,6.562-2.854l133.054-133.046    c1.902-1.903,2.847-4.093,2.847-6.565c0-2.474-0.951-4.661-2.847-6.567L267.808,117.053z" fill="#FFFFFF"/>
        	</g>
        </svg>
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
    <script src="/js/jquery.easings.min.js"></script>
    <script src="/js/scrolloverflow.min.js"></script>
    <script src="/js/jquery.fullPage.min.js"></script>
    <script src="/js/abilix.phase2.js"></script>
    <script>
    $(function() {
        $('#phase2').fullpage({
            slideTime: 800,
            css3: true,
            easing: 'easeInOutCubic',
            easingcss3: 'ease',
    		verticalCentered: false,
            anchors: ['first', 'second', 'third', 'fourth', 'five'],
            afterLoad: function(anchorLink, index){
                if(index == 5){
                    $('.footer').hide();
                }
                else{
                    $('.footer').show();
                }
            }
        });
        $('#downarrow').on('click', function(){
            $.fn.fullpage.moveSectionDown();
        })
    })
    </script>
@endsection
