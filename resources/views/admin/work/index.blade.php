@extends('layouts.admin')
@section('content')
    <div class="smart-widget">
        <div class="smart-widget-header">
            <form class="form-inline" >
                <div class="form-group">
                    <input name="name" class="form-control" value="{{Request::input('name')}}" placeholder="请输入标题">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
                        <option value="">选择状态/所有</option>
                        <option value="-1">已删</option>
                        <option value="1">正常</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control">查询</button>
                </div>
            </form>
        </div>
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
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{asset($item->image)}}" class="img-thumbnail" style="max-width: 200px;max-height: 200px;" /></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->user->nickname}}</td>
                            <td>{{$item->vote_num}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{!! $item->deleted_at != null ? '<span class="label label-warning">已删</span>':'<span class="label label-primary">正常</span>' !!}</td>
                            <td>@if($item->deleted_at == null)<a href="{{route('work.destroy',['id'=>$item->id])}}" class="btn btn-primary btn-sm destroy">删除</a>@else<a href="{{route('work.show',['id'=>$item->id])}}" class="btn btn-warning btn-sm restore">恢复</a>@endif</td>
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
            $('select[name="status"]').val('{{Request::input('status')}}');
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
