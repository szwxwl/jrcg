<?php

/*
|--------------------------------------------------------------------------
| 网站后端路由配置
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['check_login', 'web']], function () {
    Route::get('/', 'HotSearchController@showHotSearchIndex')->name('showHotSearchIndex'); // 加载热搜列表
    Route::post('hot_search_add_action', 'HotSearchController@hotSearchAddAction'); // 热搜添加动作
    Route::post('hot_search_edit_action', 'HotSearchController@hotSearchEditAction'); // 热搜修改动作
    Route::get('feedback_list', 'FeedbackController@showFeedbackIndex'); // 加载意见反馈列表
    Route::get('hot_search_add', 'HotSearchController@showHotSearchAdd'); // 加载热搜添加
    Route::get('hot_search_edit/{id}', 'HotSearchController@showHotSearchEdit'); // 加载热搜修改
    Route::get('hot_search_sort_edit', 'HotSearchController@hotSearchSortEditAction'); // 加载热搜修改
    Route::get('logout', 'UserController@logoutAction'); // 退出登录
});

Route::view('login', 'admin.login')->name('showAdminLogin')->middleware('web'); // 加载登录
Route::post('login_action', 'UserController@loginAction'); // 登录

