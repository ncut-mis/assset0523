<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/home',
    function (){return view('home');
});
Route::get('/'         , ['as' => 'home.index' , 'uses' => 'HomeController@index']);
Route::get('posts'     , ['as' => 'posts.index', 'uses' => 'PostsController@index']);
Route::get('posts/{id}', ['as' => 'posts.show' , 'uses' => 'PostsController@show']);

// 後台
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
    //　
    Route::get('posts', ['as' => 'admin.posts.index', 'uses' => 'AdminPostsController@index']);
    Route::get('posts/create', ['as' => 'admin.posts.create', 'uses' => 'AdminPostsController@create']);
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit', 'uses' => 'AdminPostsController@edit']);
    Route::patch('posts/{id}', ['as' => 'admin.posts.update', 'uses' => 'AdminPostsController@update']);
    Route::post('posts', ['as' => 'admin.posts.store', 'uses' => 'AdminPostsController@store']);
    Route::delete('posts/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'AdminPostsController@destroy']);

    //資產
    Route::get('assets', ['as' => 'admin.assets.index', 'uses' => 'AssetController@index']);              //資產主畫面
    Route::get('assets/create', ['as' => 'admin.assets.create', 'uses' => 'AssetController@create']);       //新增資產(1)
    Route::post('assets', ['as' => 'admin.asset.store', 'uses' => 'AssetController@store']);               //新增資產(2)
    Route::get('assets/{id}/edit', ['as' => 'admin.assets.edit', 'uses' => 'AssetController@edit']);        //修改資產(1)
    Route::patch('assets/{id}', ['as' => 'admin.assets.update', 'uses' => 'AssetController@update']);     //修改資產(2)
    Route::delete('assets/{id}', ['as' => 'admin.assets.destroy', 'uses' => 'AssetController@destroy']);   //刪除資產
    Route::post('assets/search'  , ['as' => 'admin.assets.search', 'uses' => 'AssetController@Search']);  //查詢資產
    Route::get('assets/{id}/data', ['as' => 'admin.assets.data', 'uses' => 'AssetController@data']);       //資產詳細資料

    //申請
    Route::get('assets/{id}/application', ['as' => 'admin.assets.application', 'uses' => 'MaintaincesController@create']);             //員工申請資產(1)
    Route::patch('assets/{id}/application/store', ['as' => 'admin.assets.application.store', 'uses' => 'MaintaincesController@store']);  //員工申請資產(2)

    //報修
    Route::get('maintainces', ['as' => 'admin.maintainces.index', 'uses' => 'MaintaincesController@index']);                        //報修主畫面
    Route::get('maintainces/{id}/show', ['as' => 'admin.maintainces.show', 'uses' => 'MaintaincesController@show']);               //選擇維修方式(1)
    Route::patch('maintainces/{id}'  , ['as' => 'admin.maintainces.process', 'uses' => 'MaintaincesController@process']);            //選擇維修方式(2)
    Route::get('maintainces/{id}/details'  , ['as' => 'admin.maintainces.details', 'uses' => 'MaintainceItemsController@index']);      //輸入維修項目資料
    Route::post('maintainces/{id}/detail'  , ['as' => 'admin.maintainces.details.store', 'uses' => 'MaintainceItemsController@store']);  //新增維修項目
    Route::post('maintainces/{id}/complete'  , ['as' => 'admin.maintainces.complete', 'uses' => 'MaintaincesController@complete']);  //完成維修
    Route::get('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.edit', 'uses' => 'MaintainceItemsController@edit']);                 //修改維修項目資料(1)
    Route::patch('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.details.update', 'uses' => 'MaintainceItemsController@update']);   //修改維修項目資料(2)
    Route::delete('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.details.destroy', 'uses' => 'MaintainceItemsController@destroy']);  //刪除維修項目


    //耗材
    Route::get('supplies'          , ['as' => 'admin.supplies.index' , 'uses' => 'SuppliesController@index']);
    Route::get('supplies/create'   , ['as' => 'admin.supplies.create' , 'uses' => 'SuppliesController@create']);
    Route::post('supplies'         , ['as' => 'admin.supplies.store'  , 'uses' => 'SuppliesController@store']);
    Route::get('supplies/{id}/edit', ['as' => 'admin.supplies.edit'   , 'uses' => 'SuppliesController@edit']);
    Route::patch('supplies/{id}'   , ['as' => 'admin.supplies.update' , 'uses' => 'SuppliesController@update']);
    Route::delete('supplies/{id}'  , ['as' => 'admin.supplies.destroy', 'uses' => 'SuppliesController@destroy']);
    Route::post('supplies/show'  , ['as' => 'admin.supplies.show', 'uses' => 'SuppliesController@show']);

    //廠商
    Route::get('vendors'         , ['as' => 'admin.vendors.index' , 'uses' => 'VendorsController@index']);
    Route::get('vendors/create'   , ['as' => 'admin.vendors.create' , 'uses' => 'VendorsController@create']);
    Route::post('vendors'         , ['as' => 'admin.vendors.store'  , 'uses' => 'VendorsController@store']);
    Route::get('vendors/{id}/edit', ['as' => 'admin.vendors.edit'   , 'uses' => 'VendorsController@edit']);
    Route::patch('vendors/{id}'   , ['as' => 'admin.vendors.update' , 'uses' => 'VendorsController@update']);
    Route::delete('vendors/{id}'  , ['as' => 'admin.vendors.destroy', 'uses' => 'VendorsController@destroy']);
    Route::post('vendors/show'  , ['as' => 'admin.vendors.show', 'uses' => 'VendorsController@show']);

    //耗材領取
   Route::get('supplies/{id}/receives',['as' => 'admin.receives.create' , 'uses' => 'ReceivesController@create']);
    Route::post('supplies/{id}'   , ['as' => 'admin.receives.store' , 'uses' => 'ReceivesController@store']);    //添購跟新增合起來
   // Route::get('receive/{id}/edit', ['as' => 'admin.receive.edit'   , 'uses' => 'SuppliesController@receiveedit']);
//自動完成

    //使用者
    Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']);              //使用者主畫面
    Route::get('users/create', ['as' => 'admin.users.create', 'uses' => 'UsersController@create']);       //新增使用者(1)
    Route::post('users', ['as' => 'admin.users.store', 'uses' => 'UsersController@store']);               //新增使用者(2)
    Route::get('users/{id}/edit', ['as' => 'admin.users.edit', 'uses' => 'UsersController@edit']);        //修改使用者(1)
    Route::patch('users/{id}', ['as' => 'admin.users.update', 'uses' => 'UsersController@update']);     //修改使用者(2)
    Route::delete('users/{id}', ['as' => 'admin.users.destroy', 'uses' => 'UsersController@destroy']);   //刪除使用者
    Route::post('users/search'  , ['as' => 'admin.users.search', 'uses' => 'UsersController@Search']);  //查詢使用者
    Route::get('users/{id}/data', ['as' => 'admin.users.data', 'uses' => 'UsersController@data']);       //使用者詳細資料
});


Route::get('/tracy',function(){throw new \Exception('Tracy works');});
