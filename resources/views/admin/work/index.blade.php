@extends('layouts.admin')
@section('content')
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>缩略图</th>
                        <th>标题</th>
                        <th>用户昵称</th>
                        <th>投票数</th>
                        <th>创建时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{$item->image}}" class="img-thumbnail" style="max-width: 200px;max-height: 200px;" /></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->user->nickname}}</td>
                            <td>{{$item->vote_num}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $items->links() !!}
            </div>
        </div><!-- ./smart-widget-inner -->
    </div>
@endsection
@section('scripts')
    <script>
        $().ready(function () {
            $('.destroy').click(function(){
                var url = $(this).attr('href');
                var obj = $(this).parents('td').parent('tr');
                if( confirm('确认此操作?')){
                    $.ajax(url, {
                        dataType: 'json',
                        type: 'delete',
                        data: {_token:window.Laravel.csrfToken},
                        success: function(json){
                            if(json.ret == 0){
                                window.location.reload();
                            }
                            else{
                                alert(json.msg);
                            }
                        },
                        error: function(){
                            alert('请求失败~');
                        }
                    });
                }
                return false;
            })
            $('.restore').click(function(){
                var url = $(this).attr('href');
                if( confirm('确认此操作?')) {
                    $.ajax(url, {
                        dataType: 'json',
                        type: 'get',
                        data: {_token: window.Laravel.csrfToken},
                        success: function (json) {
                            if (json.ret == 0) {
                                window.location.reload();
                            }
                            else {
                                alert(json.msg);
                            }
                        },
                        error: function () {
                            alert('请求失败~');
                        }
                    });
                }
                return false;
            });
        })
    </script>
@endsection
