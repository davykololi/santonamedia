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

Route::feeds();

Route::get('/','WelcomeController@index');

Route::group(['middleware' => 'prevent-back-history'],function(){
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

//admin route for our multi-auth system
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
 
    //admin password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

//Admin news posts
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/posts','PostController@index')->name('admin.posts.index');
    Route::get('/posts/create','PostController@create')->name('admin.posts.create');
    Route::get('/posts/show/{post}','PostController@show')->name('admin.posts.show');
    Route::post('/posts','PostController@store')->name('admin.posts.store');
    Route::get('/posts/{post}/edit','PostController@edit')->name('admin.posts.edit');
    Route::post('/posts/{post}','PostController@update')->name('admin.posts.update');
    Route::get('/posts/{post}','PostController@destroy')->name('admin.posts.delete');
    });

//Admin news videos
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/videos','VideoController@index')->name('admin.videos.index');
    Route::get('/videos/create','VideoController@create')->name('admin.videos.create');
    Route::get('/videos/show/{video}','VideoController@show')->name('admin.videos.show');
    Route::post('/videos','VideoController@store')->name('admin.videos.store');
    Route::get('/videos/{video}/edit','VideoController@edit')->name('admin.videos.edit');
    Route::post('/videos/{video}','VideoController@update')->name('admin.videos.update');
    Route::get('/videos/{video}','VideoController@destroy')->name('admin.videos.delete');
    });

//Admin category routes
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/categories/','CategoryController@index')->name('admin.categories.index');
    Route::get('/categories/create','CategoryController@create')->name('admin.categories.create');
    Route::get('/categories/show/{category}','CategoryController@show')->name('admin.categories.show');
    Route::post('/categories','CategoryController@store')->name('admin.categories.store');
    Route::get('/categories/{category}/edit','CategoryController@edit')->name('admin.categories.edit');
    Route::post('/categories/{category}','CategoryController@update')->name('admin.categories.update');
    Route::get('/categories/{category}','CategoryController@destroy')->name('admin.categories.delete');
    });

//Admin tag routes
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/tags','TagController@index')->name('admin.tags.index');
    Route::get('/tags/create','TagController@create')->name('admin.tags.create');
    Route::get('/tags/show/{tag}','TagController@show')->name('admin.tags.show');
    Route::post('/tags','TagController@store')->name('admin.tags.store');
    Route::get('/tags/{tag}/edit','TagController@edit')->name('admin.tags.edit');
    Route::post('/tags/{tag}','TagController@update')->name('admin.tags.update');
    Route::get('/tags/{tag}','TagController@destroy')->name('admin.tags.delete');
    });

//Admin comment routes
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/comments','CommentController@index')->name('admin.comments.index');
    Route::get('/comments/{comment}','CommentController@delete')->name('admin.comments.delete');
    });

//Static pages routes
Route::group(['namespace'=>'User','prefix'=>'news'],function(){
    Route::get('/about-us','PageController@about')->name('users.pages.about');
    Route::get('/contact-us','PageController@contact')->name('users.pages.contact');
    Route::post('/contact-us','PageController@store')->name('contactus.store');
    Route::get('/private-policy','PageController@privatePolicy')->name('private.policy');
    Route::get('/portfolio','PageController@portfolio')->name('pages.portfolio');
    //Front end Users posts routes
    Route::get('/{slug}/articles', 'PostController@getIndex')->name('category.articles');
    Route::get('/articles/details/{post_slug}', 'PostController@getFullNews')->name('users.posts.read');
    Route::get('/articles/{slug}', 'PostController@tags')->name('post.tags');
    Route::get('/{slug}/videos', 'VideoController@getIndex')->name('category.videos');
    Route::get('/videos/details/{video_slug}', 'VideoController@getFullVideos')->name('users.videos.read');
    Route::get('/videos/{slug}', 'VideoController@tags')->name('video.tags');
    Route::post('/comments','CommentController@store')->name('comments.store');
    //Most popular post route
    Route::get('/popular/{slug}', 'PopularPostController@popular')->name('popular');
    Route::get('/seven-days','GeneralController@getData')->name('seven.days');
    });

Route::group(['namespace'=>'User'],function(){
    // Social login routes
    Route::get('/auth/redirect/{provider}','SocialController@redirect');
    Route::get('/callback/{provider}','SocialController@callback');
    //Newsletter routes
    Route::get('newsletter','NewsletterController@create');
    Route::post('newsletter','NewsletterController@store');
    //User Profile Routes
    Route::get('profile','UserController@profile');
    Route::post('profile','UserController@update_avatar');
    //One week old Articles
    });

Route::group(['namespace'=>'Search'],function(){
    Route::get('/post.lists','SearchPostController@search')->name('post.list');
    Route::get('/video.lists','SearchVideoController@search')->name('video.list');
    });

//Admin view contacts messages
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/contacts/','GeneralController@getContacts')->name('contactus.contacts');
    Route::get('/contacts/{contact}/show','GeneralController@getContact')->name('contact.show');
    Route::get('/contacts/{id}','GeneralController@destroy')->name('contact.destroy');
    });
//Sitemap Routes
Route::group(['prefix' => 'sitemap.xml',],function(){
    Route::get('/', 'SitemapController@index');
    Route::get('/articles', 'SitemapController@posts');
    Route::get('/videos', 'SitemapController@videos');
    Route::get('/tags/videos', 'SitemapController@tagVideos');
    Route::get('/tags/articles', 'SitemapController@tagArticles');
    Route::get('/category/videos', 'SitemapController@categoryVideos');
    Route::get('/category/articles', 'SitemapController@categoryArticles');
    Route::get('/about', 'SitemapController@about');
    Route::get('/contact', 'SitemapController@contact');
    Route::get('/home', 'SitemapController@home');
    });
});
