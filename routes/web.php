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

Route::get('/','WelcomeController@index')->middleware('guest');
Route::group(['middleware' => 'prevent-back-history'],function(){
Auth::routes();
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');
//SUPERADMIN ROUTES
//Superadmin dashboard route
Route::prefix('superadmin')->name('superadmin.')->middleware(['doNotCacheResponse'])->group(function(){
   Route::get('/', 'SuperadminController@index')->name('dashboard'); 
});
//superadmin namespace Auth routes
Route::namespace('Auth')->prefix('superadmin')->name('superadmin.')->middleware(['doNotCacheResponse'])->group(function () {
    Route::get('/login', 'SuperadminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'SuperadminLoginController@login')->name('login.submit');
    Route::get('/logout','SuperadminLoginController@logout')->name('logout');

    //superadmin password reset routes
    Route::post('/password/email','SuperadminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','SuperadminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','SuperadminResetPasswordController@reset');
    Route::get('/password/reset/{token}','SuperadminResetPasswordController@showResetForm')->name('password.reset');
});

//Superadmin namespace Superadmin routes
Route::prefix('superadmin')->name('superadmin.')->namespace('Superadmin')->middleware(['doNotCacheResponse'])->group(function(){
    // Admin bann routes
    Route::get('/admin-bann/{id}','AdminBannController@ban')->name('admin.bann');
    Route::get('/admin-revoke-bann/{id}','AdminBannController@revoke')->name('admin.revoke');
    //Admin Change Password Routes
    Route::get('/change-password','SuperadminChangePasswordController@index')->name('change-password.form');
    Route::post('/change-password','SuperadminChangePasswordController@store')->name('change-password.save');

    //Superadmin category routes
    Route::get('/categories/','CategoryController@index')->name('categories.index');
    Route::get('/categories/create','CategoryController@create')->name('categories.create');
    Route::get('/categories/show/{id}','CategoryController@show')->name('categories.show');
    Route::post('/categories','CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}/edit','CategoryController@edit')->name('categories.edit');
    Route::post('/categories/{id}','CategoryController@update')->name('categories.update');
    Route::get('/categories/{id}','CategoryController@destroy')->name('categories.delete');

    //Superadmin tag routes
    Route::get('/tags','TagController@index')->name('tags.index');
    Route::get('/tags/create','TagController@create')->name('tags.create');
    Route::get('/tags/show/{id}','TagController@show')->name('tags.show');
    Route::post('/tags','TagController@store')->name('tags.store');
    Route::get('/tags/{id}/edit','TagController@edit')->name('tags.edit');
    Route::post('/tags/{id}','TagController@update')->name('tags.update');
    Route::get('/tags/{id}','TagController@destroy')->name('tags.delete');

    //Impersonation Controller
    Route::get('impersonate/{admin_id}','ImpersonateController@impersonate')->name('impersonate');
    Route::get('impersonate_leave','ImpersonateController@impersonate_leave')->name('impersonate.leave');

    //Superadmin comment routes
    Route::get('/comments','CommentController@index')->name('comments.index');
    Route::get('/show/comments','CommentController@show')->name('comments.show');
    Route::get('/comments/{comment}','CommentController@delete')->name('comments.delete');

    //Optimized Superadmin Posts And Admins Routes
    Route::group(['middleware'=>'optimizeImages'],function(){
        Route::resource('admins','AdminController');
        Route::resource('posts','PostController');
    });
    //Superadmin Videos Routes
    Route::resource('videos','VideoController');
});// END OF SUPERADMIN ROUTES

//START OF ADMIN ROUTES
//Admin dashboard route
Route::prefix('admin')->name('admin.')->middleware('admin_ban')->group(function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
});
//admin route for our multi-auth system
Route::namespace('Auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminLoginController@login')->name('login.submit');
    Route::get('/logout','AdminLoginController@logout')->name('logout');
 
    //admin password reset routes
    Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('password.reset');
});

//Admin posts and videos routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['doNotCacheResponse','admin_ban','optimizeImages'])->group(function(){
    //Admin posts routes
    Route::get('/posts','PostController@index')->name('posts.index');
    Route::get('/posts/create','PostController@create')->name('posts.create');
    Route::get('/posts/show/{id}','PostController@show')->name('posts.show');
    Route::post('/posts','PostController@store')->name('posts.store');
    Route::get('/posts/{id}/edit','PostController@edit')->name('posts.edit');
    Route::post('/posts/{id}','PostController@update')->name('posts.update');
    Route::get('/posts/{id}','PostController@destroy')->name('posts.delete');
    Route::post('/upload-image','CKEditorController@upload')->name('upload');

    //Admin videos routes
    Route::get('/videos','VideoController@index')->name('videos.index');
    Route::get('/videos/create','VideoController@create')->name('videos.create');
    Route::get('/videos/show/{id}','VideoController@show')->name('videos.show');
    Route::post('/videos','VideoController@store')->name('videos.store');
    Route::get('/videos/{id}/edit','VideoController@edit')->name('videos.edit');
    Route::post('/videos/{id}','VideoController@update')->name('videos.update');
    Route::get('/videos/{id}','VideoController@destroy')->name('videos.delete');
    Route::get('/tool','ToolController@index')->name('KDTool');
    Route::post('/tool/calculate-and-get-density', 'ToolController@CalculateAndGetDensity');

    //Admin view contacts messages
    Route::get('/contacts/','GeneralController@getContacts')->name('contacts');
    Route::get('/contacts/{contact}/show','GeneralController@getContact')->name('contact.show');
    Route::get('/contacts/{id}','GeneralController@destroy')->name('contact.destroy');
    //Admin Change Password Routes
    Route::get('/change-password','AdminChangePasswordController@index')->name('change-password.form');
    Route::post('/change-password','AdminChangePasswordController@store')->name('change-password.save');
}); //END OF ADMIN ROUTES

//FRONTEND USER ROUTES
//Minified Routes
Route::group(['middleware'=>'HtmlMinifier'],function(){
    //Static pages routes
Route::group(['namespace'=>'User'],function(){
    Route::get('/about-us','PageController@about')->name('users.pages.about');
    Route::get('/contact-us','PageController@contact')->name('users.pages.contact')->middleware('doNotCacheResponse');
    Route::post('/contact-us','PageController@store')->name('contactus.store')->middleware('doNotCacheResponse');
    Route::get('/private-policy','PageController@privatePolicy')->name('private.policy');
    Route::get('/portfolio','PageController@portfolio')->name('pages.portfolio');
    //Front end Users posts routes
    Route::get('/{slug}/articles', 'PostController@getIndex')->name('category.articles');
    Route::get('/article/{slug}', 'PostController@getFullNews')->name('users.posts.read');
    Route::get('/article-tag/{slug}', 'PostController@tags')->name('post.tags');
    Route::get('/article-author/{slug}', 'PostController@authors')->name('author.posts');
    Route::get('/{slug}/videos', 'VideoController@getIndex')->name('category.videos');
    Route::get('/video/{slug}', 'VideoController@getFullVideos')->name('users.videos.read');
    Route::get('/video-tag/{slug}', 'VideoController@tags')->name('video.tags');
    Route::get('/video-author/{slug}', 'VideoController@authors')->name('author.videos');
    Route::post('/comments','CommentController@store')->name('comments.store');
    //Timeframe data retrival 
    Route::get('/seven-days-posts','TimeframeDataController@sevendaysData')->middleware('doNotCacheResponse');
    // Send SMS
    Route::get('/sms','PageController@sendSms')->name('send.sms');
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
    //Article search route
    Route::get('search-results','SearchController@search')->name('search.result');
    });
}); 
});
//RSS Feed route
Route::feeds();
