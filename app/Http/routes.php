<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//后台用户登录
Route::get('admin/login','Admin\LoginController@login');
//后台登录验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//验证码
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
/*
 * 后台
 * 路由前缀：admin
 * 命名空间: admin
 */
Route::group(['prefix'=>'admin','middleware'=>'admin.login','namespace'=>'Admin'], function() {

    //显示首页
    Route::get('index','IndexController@index');
    //修改密码
    Route::get('pass','IndexController@pass');
    //退出登录
    Route::get('quit','IndexController@quit');
    //用户资源路由
    Route::resource('user', 'UserController');
    //分类管理
    Route::resource('type','TypeController');
    //订单管理
    Route::resource('order','OrderController');
    //鱼塘管理
    Route::resource('fish','FishController');
    //广告管理
    Route::resource('ad','AdController');
    //数据统计
    Route::resource('dataSta','DataStaController');
    //网站管理
    Route::resource('website','WebsiteController');

});

//前台用户登录
Route::get('home/login','Home\LoginController@login');
//前台登录验证
Route::post('home/dologin','Home\LoginController@dologin');
/*
 * 前台
 * 路由前缀：home
 * 命名空间：home
 */
Route::group(['prefix' => 'home', 'middleware' => 'home.login', 'namespace' => 'home'], function () {
    //用户资源路由
    Route::resource('user', 'UsersController');
});



