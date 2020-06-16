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

Route::get('/',"PublicController@Index")->name('Index');
Route::get('post/{id}',"PublicController@Singlepost")->name('Singlepost');
Route::get('About',"PublicController@About")->name('About');
Route::get('Contact',"PublicController@Contact")->name('Contact');
Route::Post('Contact',"PublicController@ContactPost")->name('ContactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route:: prefix('user')->group(function(){
    Route::get('/dashboard','UserController@dashboard')->name('UserDashboard');
    Route::get('/Comments','UserController@Comments')->name('UserComments');
    Route::post('/NEWComments','UserController@NEWComments')->name('UserNEWComments');
    Route::get('/Profile','UserController@Profile')->name('UserProfile');
    Route::Post('/Profile','UserController@ProfilePost')->name('UserProfilePost');
});
Route:: prefix('author')->group(function(){
    Route::get('/dashboard','AuthorController@dashboard')->name('AuthorDashboard');
    Route::get('/Profile','AuthorController@Profile')->name('AuthorProfile');
    Route::Post('/Profile','AuthorController@ProfilePost')->name('AuthorProfilePost');

    //author post controller
    Route::get('/Posts','AuthorController@Posts')->name('AuthorPosts');
    Route::get('/Posts/new','AuthorController@NewPost')->name('AuthorNewPosts');
    Route::Post('/Posts/new','AuthorController@CreatePost')->name('AuthorCreatePost');
    Route::get('/Posts/{id}','AuthorController@EditPost')->name('AuthorEditPost');
    Route::Post('/Posts/{id}','AuthorController@PostEditPost')->name('AuthorPostEditPost');
    Route::get('/PostsDelete/{id}','AuthorController@DeletePost')->name('AuthorDeletePost');

//author comment controller
    Route::get('/Comments','AuthorController@Comments')->name('AuthorComments');
});

Route:: prefix('admin')->group(function(){
  Route::get('/dashboard','AdminController@dashboard')->name('AdminDashboard');
//post admin
  Route::get('/Posts','AdminController@Posts')->name('AdminPosts');
  Route::get('/Posts/new','AdminController@NewPost')->name('NewPosts');
  Route::Post('/Posts/new','AdminController@CreatePost')->name('CreatePost');
    Route::get('/Posts/{id}','AdminController@EditPost')->name('EditPost');
    Route::Post('/Posts/{id}','AdminController@PostEditPost')->name('PostEditPost');
    Route::get('/PostsDelete/{id}','AdminController@DeletePost')->name('DeletePost');


  Route::get('/Comments','AdminController@Comments')->name('AdminComments');
  Route::get('/Profile','AdminController@Profile')->name('AdminProfile');
  Route::Post('/Profile','AdminController@ProfilePost')->name('AdminProfilePost');
  Route::get('/Users','AdminController@Users')->name('AdminUsers');


  //admin Product controller
    Route::get('/Products','AdminController@Products')->name('AdminProducts');
    Route::get('/Products/New','AdminController@NewProducts')->name('AdminNewProducts');
    Route::post('/Products/New','AdminController@NewProductsPost')->name('AdminNewProductsPost');
    Route::get('/Products/{id}','AdminController@EditProducts')->name('AdminEditProducts');
    Route::post('/Products/{id}','AdminController@EditProductsPost')->name('AdminEditProductsPost');
    Route::get('/DeleteProducts/{id}','AdminController@DeleteProduct')->name('AdminDeleteProducts');

});

Route::prefix('Shop')->group(function(){
    Route:: get('/','ShopController@Index')->name('Shop_Index');
    Route:: get('/product/{id}','ShopController@SingleProduct')->name('Shop_SingleProduct');
    Route:: get('/product/{id}/Order','ShopController@OrderProduct')->name('Shop_OrderBy');

});
