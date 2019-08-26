<?php


Route::get('/', function () {
    return view('welcome');
});


//rbac 角色与权限
Route::get('power/power','Power\PowerController@power');




//后台主页
Route::get('admin/commonality','Admin\AdminController@admin')->middleware('login');
//视频添加
Route::get('video/add','Video\VideoController@add')->middleware(['login','rbac']);
Route::post('video/toadd','Video\VideoController@toadd')->middleware('login');
Route::get('video/show','Video\VideoController@show')->middleware(['login','rbac']);
Route::get('video/del','Video\VideoController@del')->middleware('login');
Route::get('video/voides','Video\VideoController@voides')->middleware('login');



//退出
Route::get('admin/quit','Admin\AdminController@quit')->middleware('login');
//登录
Route::get('login/log','Login\LoginController@log');
//登录执行
Route::post('login/logdo','Login\LoginController@logdo');

//权限管理
Route::get('authority/permissions','Authority\AuthorityController@permissions')->middleware(['login','rbac']);
Route::post('authority/permissionsdo','Authority\AuthorityController@permissionsdo');

//用户管理
Route::get('control/controladd','Usercontrol\UsercontrolController@controladd')->middleware(['login','rbac']);
Route::post('control/controladdo','Usercontrol\UsercontrolController@controladdo');

//角色添加
Route::get('role/roleadd','Role\RoleController@roleadd')->middleware(['login','rbac']);
Route::post('role/roleaddo','Role\RoleController@roleaddo');


Route::get('role/getchild','Role\RoleController@getchild');











//抽奖登录
Route::get('lotteryadd/lotteryadd','LoginLottery\LoginLotteryController@lotteryadd');
//抽奖
Route::get('lottery/lottery','Lottery\LotteryController@lottery');
//点击抽奖
Route::get('lottery/sub','Lottery\LotteryController@sub');