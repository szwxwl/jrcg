<?php

/*
|--------------------------------------------------------------------------
| 网站前端路由配置
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@showIndex'); // 首页
Route::get('level/{level}', 'LevelController@showIndex'); // 指定节点页面
Route::get('details/{id}', 'DetailsController@showIndex'); // 热搜详情页面
Route::post('feedback_add', 'FeedbackController@addFeedback'); // 意见反馈添加动作
Route::view('feedback', 'web.feedback'); // 意见反馈页面
Route::get('search', 'SearchController@showIndex'); // 搜索结果页面
Route::view('about', 'web.about'); // 关于我们
