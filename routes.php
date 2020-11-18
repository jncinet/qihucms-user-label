<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'prefix' => 'user',
    'domain' => config('qihu.api_domain'),
    'namespace' => 'Qihucms\UserLabel\Controllers\Api',
    'middleware' => ['api'],
    'as' => 'api.'
], function (Router $router) {
    // 会员标签
    $router->get('labels', 'LabelController@userLabel')->name('user.labels');
    // 附加标签
    $router->post('add-labels', 'LabelController@store')->name('user.labels.add');
    // 分离标签
    $router->post('remove-labels', 'LabelController@destroy')->name('user.labels.remove');
});

// 后台
Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => 'Qihucms\UserLabel\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    $router->resource('user-labels', 'LabelController');
});