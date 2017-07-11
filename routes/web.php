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
Route::group(['middleware'=>['web','wechat.oauth']], function(){
    Route::get('/', function(){
        $js = \EasyWeChat::js();
        //echo $js->config(array('onMenuShareQQ', 'onMenuShareWeibo'), true);
        return view('index');
    });
    //榜单
    Route::get('/list', function(Request $request){
        $works = \App\Work::paginate(20);
        if($request->ajax()){
            return $works;
        }
        else{
            return view('list',[
                'works'=>$works
            ]);
        }



    });
    //分享结果页面
    Route::get('/result/{id}', function(){

    });
    //信息提交
    Route::post('/upload', function(){
        return response(['ret'=>0,'msg'=>'']);
    });
});


Route::group(['middleware' => ['role:superadmin,global privileges','menu'],'prefix'=>'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/dashboard', 'Admin\IndexController@index');
    Route::resource('/gallery', 'Admin\GalleryController');
    Route::get('/form/{type?}', 'Admin\FormController@index')->name('form.index');
    Route::resource('/form', 'Admin\FormController',['except'=>'index']);
    Route::resource('/work', 'Admin\WorkController');
    //Route::resource('/wechat/user', 'Admin\WechatUserController');
});
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/install', function(){
    if( \App\User::count() == 0){
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

Route::get('/home', 'HomeController@index')->name('home');
