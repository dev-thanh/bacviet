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
Route::get('trang-chu', 'IndexController@getHome')->name('home.index');

Route::get('/tin-tuc', 'IndexController@getListPost')->name('home.posts');

Route::get('/tin-tuc/{slug}', 'IndexController@getSingleNews')->name('home.post.single');

Route::get('/danh-muc-du-an/{slug}', 'IndexController@getCatetoryProjects')->name('home.category-project');

Route::get('/du-an/{slug}', 'IndexController@getSingleProject')->name('home.single-project');

Route::get('/du-an', 'IndexController@getListProjects')->name('home.project');

Route::get('san-pham/{slug}', 'IndexController@getSingleProduct')->name('home.single-product');
Route::get('san-pham', 'IndexController@getListProducts')->name('home.product');


Route::get('/lien-he', 'IndexController@getContact')->name('home.contact');

Route::post('/lien-he', 'IndexController@postContact')->name('home.contact.post');

Route::get('/dich-vu', 'IndexController@getServices')->name('home.services');

Route::get('/dich-vu/{slug}', 'IndexController@getServicesDetail')->name('home.services');

Route::get('/gioi-thieu', 'IndexController@getAbout')->name('home.about');

Route::get('/load-more-ajax', 'IndexController@getLoadMoreAjax')->name('home.load-more-ajax');

Route::get('/load-more-project', 'IndexController@loadMoreProject')->name('load-more-project');

Route::get('/load-more-product', 'IndexController@loadMoreProduct')->name('load-more-product');

Route::get('/load-more-post', 'IndexController@loadMorePost')->name('load-more-post');

Route::get('/search', 'IndexController@searchfunction')->name('search');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'IndexController@changeLanguage')->name('user.change-language');
});

Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
       	Route::get('/home', 'HomeController@index')->name('backend.home');

        Route::resource('users', 'UserController', ['except' => [
            'show'
        ]]);
        Route::resource('images', 'ImageController', ['except' => [
            'show'
        ]]);
        Route::post('images/postMultiDel', ['as' => 'images.postMultiDel', 'uses' => 'ImageController@deleteMuti']);

        Route::resource('cateproduct', 'CategoryProductsController', ['except' => ['show']]);

        Route::resource('products', 'ProductsController', ['except' => ['show']]);
        Route::post('products/postMultiDel', ['as' => 'products.postMultiDel', 'uses' => 'ProductsController@deleteMuti']);
        Route::get('products/get-slug', 'ProductsController@getAjaxSlug')->name('products.get-slug');

        Route::resource('posts', 'PostController', ['except' => ['show']]);
        Route::post('posts/postMultiDel', ['as' => 'posts.postMultiDel', 'uses' => 'PostController@deleteMuti']);
        Route::get('posts/get-slug', 'PostController@getAjaxSlug')->name('posts.get-slug');

        Route::resource('projects', 'ProjectController', ['except' => ['show']]);
        Route::post('projects/postMultiDel', ['as' => 'projects.postMultiDel', 'uses' => 'ProjectController@deleteMuti']);
        Route::get('projects/get-slug', 'ProjectController@getAjaxSlug')->name('projects.get-slug');


        Route::resource('category', 'CategoryController', ['except' => ['show']]);

        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', ['as' => 'pages.list', 'uses' => 'PagesController@getListPages']);
            Route::get('build', ['as' => 'pages.build', 'uses' => 'PagesController@getBuildPages']);
            Route::post('build', ['as' => 'pages.build.post', 'uses' => 'PagesController@postBuildPages']);
            Route::post('/create', ['as' => 'pages.create', 'uses' => 'PagesController@postCreatePages']);
        });

        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', ['as' => 'get.list.contact', 'uses' => 'ContactController@getListContact']);
            Route::post('/delete-muti', ['as' => 'contact.postMultiDel', 'uses' => 'ContactController@postDeleteMuti']);
            Route::get('{id}/edit', ['as' => 'contact.edit', 'uses' => 'ContactController@getEdit']);
            Route::post('{id}/edit', ['as' => 'contact.post', 'uses' => 'ContactController@postEdit']);
            Route::delete('{id}/delete', ['as' => 'contact.destroy', 'uses' => 'ContactController@getDelete']);
        });


        Route::group(['prefix' => 'options'], function() {
            Route::get('/general', 'SettingController@getGeneralConfig')->name('backend.options.general');
            Route::post('/general', 'SettingController@postGeneralConfig')->name('backend.options.general.post');

            Route::get('/developer-config', 'SettingController@getDeveloperConfig')->name('backend.options.developer-config');
            Route::post('/developer-config', 'SettingController@postDeveloperConfig')->name('backend.options.developer-config.post');
        });

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', ['as' => 'setting.menu', 'uses' => 'MenuController@getListMenu']);
            Route::get('edit/{id}', ['as' => 'backend.config.menu.edit', 'uses' => 'MenuController@getEditMenu']);
            Route::post('add-item/{id}', ['as' => 'setting.menu.addItem', 'uses' => 'MenuController@postAddItem']);
            Route::post('update', ['as' => 'setting.menu.update', 'uses' => 'MenuController@postUpdateMenu']);
            Route::get('delete/{id}', ['as' => 'setting.menu.delete', 'uses' => 'MenuController@getDelete']);
            Route::get('edit-item/{id}', ['as' => 'setting.menu.geteditItem', 'uses' => 'MenuController@getEditItem']);
            Route::post('edit', ['as' => 'setting.menu.editItem', 'uses' => 'MenuController@postEditItem']);
        });

       Route::get('/get-layout', 'HomeController@getLayOut')->name('get.layout');


    });
});

Auth::routes(
    [
        'register' => false,
        'verify' => false,
        'reset' => false,
    ]
);
