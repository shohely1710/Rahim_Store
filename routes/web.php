<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Frontend\HomeController@index');

Route::get('/product','Frontend\ProductsController@create');
Route::get('/product','Frontend\ProductsController@index')->name('product');
Route::get('/contact','Frontend\ContactController@create');
Route::post('/contact','Frontend\ContactController@store');


/*all the routes for product controller for frontend pages*/

Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/new/search', 'Frontend\HomeController@search')->name('search');
Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');


/* end all the routes for product controller for frontend pages*/

//Route::get('/contact','RFQController@create');
//Route::post('/contact','RFQController@store');








/*
** backend routes
*/
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
});


//require 'admin.php';

/*login & registration routes*/
Route::get('/', 'HomeController@index')->name('home');

/* special routes */
//Route::get('/admin/protected', function (){
//    echo 'admin.route';
//
//})->middleware('admin');


Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth']],function (){
    Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
});



Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function(){
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
});


Route::get('/', 'Frontend\HomeController@index')->name('home');






;



/*products routes*/

Route::get('/admin/products','Backend\ProductsController@index')->name('admin.products');
//    Route::get('/admin/products','Backend\ProductsController@manage_products')->name('admin.products');
Route::get('/admin/products/create','Backend\ProductsController@create')->name('admin.products.create');

Route::post('/admin/products/store','Backend\ProductsController@store')->name('admin.product.store');
Route::get('/admin/products/edit/{id}','Backend\ProductsController@edit')->name('admin.products.edit');
Route::post('/admin/products/edit/{id}','Backend\ProductsController@update')->name('admin.products.update');

Route::post('/admin/products/delete/{id}','Backend\ProductsController@delete')->name('admin.products.delete');


/*end products routes*/
/*categories routes*/

Route::get('/admin/categories','Backend\CategoriesController@index')->name('admin.categories');
//    Route::get('/admin/products','Backend\ProductsController@manage_products')->name('admin.products');
Route::get('/admin/categories/create','Backend\CategoriesController@create')->name('admin.categories.create');

Route::post('/admin/category/store','Backend\CategoriesController@store')->name('admin.category.store');
Route::get('/admin/categories/edit/{id}','Backend\CategoriesController@edit')->name('admin.categories.edit');
Route::post('/admin/categories/edit/{id}','Backend\CategoriesController@update')->name('admin.categories.update');

Route::post('/admin/categories/delete/{id}','Backend\CategoriesController@delete')->name('admin.categories.delete');



/*end categories routes*/



/*brands routes*/

Route::get('/admin/brands','Backend\BrandsController@index')->name('admin.brands');
//    Route::get('/admin/products','Backend\ProductsController@manage_products')->name('admin.products');
Route::get('/admin/brands/create','Backend\BrandsController@create')->name('admin.brands.create');

Route::post('/admin/brand/store','Backend\BrandsController@store')->name('admin.brand.store');
Route::get('/admin/brands/edit/{id}','Backend\BrandsController@edit')->name('admin.brands.edit');
Route::post('/admin/brands/edit/{id}','Backend\BrandsController@update')->name('admin.brands.update');

Route::post('/admin/brands/delete/{id}','Backend\BrandsController@delete')->name('admin.brands.delete');



/*end brands routes*/






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
