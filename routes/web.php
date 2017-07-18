<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::any('/wechat', 'WechatController@serve');
Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/index', function () {

        $count = \App\Work::count();
        return view('index', ['count' => $count + 1]);
    });
    //榜单
    Route::get('/list/{id?}', function (Request $request, $id = null) {
        $works = \App\Work::orderBy('vote_num', 'DESC')->paginate(20);
        if ($request->ajax()) {
            return $works;
        } else {
            return view('list', [
                'works' => $works,
                'id' => $id,
            ]);
        }
    });
    Route::get('/my/{id?}', function (Request $request, $id = null) {
        $works = \App\Work::where('user_id', session('user_id'))
            ->orderBy('vote_num', 'DESC')
            ->paginate(20);
        if ($request->ajax()) {
            return $works;
        } else {
            return view('list', [
                'works' => $works,
                'id' => $id,
            ]);
        }
    });
    Route::get('/work/{id}', function ($id) {
        $work = \App\Work::find($id);
        if (null == $work) {
            return [];
            //return redirect(url('/'));
        }
        $data = $work->toArray();
        $data['has_voted'] = $work->has_voted;
        $data['image'] = asset($work->image);
        $count = \App\Work::where('vote_num','>', $work->vote_num)
            ->orderBy('vote_num', 'DESC')
            ->count();
        $data['ranking_num'] = $count+1;
        return response($data);
        //return view('work', ['work' => $work]);
    });
    Route::get('/vote/{id}', function($id){
        $user_id = session('user_id');
        $count = \App\Vote::where('work_id', $id)
            ->where('voter_id', $user_id)
            ->count();
        $work = \App\Work::find($id);
        if( $count == 0 ){
            $work->vote_num += 1;
            $work->save();
            $vote = new \App\Vote;
            $vote->work_id = $id;
            $vote->voter_id = $user_id;
            $vote->save();
        }
        else{
            $work->vote_num -= 1;
            $work->save();
            \App\Vote::where('work_id', $id)
                ->where('voter_id', $user_id)
                ->delete();
        }
        return response(['ret'=>0,'vote_num'=>$work->vote_num]);

    });
    //信息提交
    Route::post('/upload', function (Request $request) {
        $scale = $request->scale ?: 1;
        $x = $request->x ?: 0;
        $y = $request->y ?: 0;
        $x = (int)$x;
        $y = (int)$y;
        $image = \Image::make(public_path($request->image));
        $width = $image->width();
        //$height = $image->height();
        $image->resize($width * $scale, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->crop(480, 480, $x, $y);
        $image->save(public_path($request->image));
        $work = new \App\Work;
        $work->name = $request->name;
        $work->image = $request->image;
        $work->vote_num = 0;
        $work->user_id = session('user_id');
        if ($work->save()) {
            return response([
                'ret' => 0,
                'msg' => '',
                'data'=>[
                    'share_url'=>url('/list',['id'=>$work->id])
                ]
            ]);
        } else {
            return response(['ret' => 1001, 'msg' => '抱歉，服务器发生异常~']);
        }
    });
    Route::get('/image/{id}', function (Request $request, $id) {
        $wechat = app('wechat');
        $temporary = $wechat->material_temporary;
        $content = $temporary->getStream($id);
        $filename = uniqid(session('user_id')) . '.jpg';
        \Storage::disk('public')->put($filename, $content);
        $image = \Image::make(storage_path('app/public/' . $filename));
        $width = $image->width();
        $height = $image->height();
        return response([
            'ret' => 0,
            'msg' => '',
            'data' => [
                'url' => asset('storage/' . $filename),
                'path' => 'storage/' . $filename,
                'width' => $width,
                'height' => $height,
            ]
        ]);
    });
});

Route::group(['middleware' => ['role:superadmin,global privileges', 'menu'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/dashboard', 'Admin\IndexController@index');
    Route::resource('/gallery', 'Admin\GalleryController');
    Route::resource('/work', 'Admin\WorkController');
    Route::resource('/wechat/user', 'Admin\WechatUserController');
});
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/install', function () {
    if (\App\User::count() == 0) {
        $role = Role::create(['name' => 'superadmin']);
        $permission = Permission::create(['name' => 'global privileges']);
        $role->givePermissionTo('global privileges');
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin@2017');
        $user->save();
        $user->givePermissionTo('global privileges');
        $user->assignRole(['superadmin']);
        $user->roles()->pluck('name');
        $user->givePermissionTo('global privileges');
    }
    return redirect('/login');
});

Auth::routes();

