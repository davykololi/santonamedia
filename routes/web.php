<?php

use App\Models\Post;
use App\Models\Category;

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

Route::get('/', function () {
	$categories = Category::with('posts')->latest()->get();

        foreach($categories as $category){
    	$posts = $category->posts;
    	$archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);

    return view('welcome',['categories'=>$categories,'posts'=>$posts,'archives'=>$archives,'category'=>$category]);
}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

//admin route for our multi-auth system
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
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
Route::group(['namespace' => 'Admin','prefix'=>'posts'],function(){
    Route::get('/','PostController@index')->name('admin.posts.index');
    Route::get('/create','PostController@create')->name('admin.posts.create');
    Route::get('/show/{post}','PostController@show')->name('admin.posts.show');
    Route::post('/','PostController@store')->name('admin.posts.store');
    Route::get('/{post}/edit','PostController@edit')->name('admin.posts.edit');
    Route::post('/{post}','PostController@update')->name('admin.posts.update');
    Route::get('/{post}','PostController@destroy')->name('admin.posts.delete');
    });

//Admin category routes
Route::group(['namespace' => 'Admin','prefix'=>'sections'],function(){
    Route::get('/','CategoryController@index')->name('admin.categories.index');
    Route::get('/create','CategoryController@create')->name('admin.categories.create');
    Route::get('/show/{category}','CategoryController@show')->name('admin.categories.show');
    Route::post('/','CategoryController@store')->name('admin.categories.store');
    Route::get('/{category}/edit','CategoryController@edit')->name('admin.categories.edit');
    Route::post('/{category}','CategoryController@update')->name('admin.categories.update');
    Route::get('/{category}','CategoryController@destroy')->name('admin.categories.delete');
    });
//Static pages routes
Route::group(['namespace'=>'User'],function(){
    Route::get('/about-us','PageController@about')->name('users.pages.about');
    Route::get('/contact-us','PageController@contact')->name('users.pages.contact');
    Route::post('/contact-us','PageController@store')->name('contactus.store');
    Route::get('/private-policy','PageController@privatePolicy')->name('private.policy');
    //Front end Users posts routes
    Route::get('/categories/{slug}/posts', 'PostController@getIndex')->name('categories');
    Route::get('/posts/read/{post_slug}', 'PostController@getFullNews')->name('users.posts.read');
    //Most popular post route
    Route::get('/popular/{slug}', 'PopularPostController@popular')->name('popular');
    // Social login routes
    Route::get('/auth/redirect/{provider}','SocialController@redirect');
    Route::get('/callback/{provider}','SocialController@callback');
    //Newsletter routes
    Route::get('newsletter','NewsletterController@create');
    Route::post('newsletter','NewsletterController@store');
    //User Profile Routes
    Route::get('profile','UserController@profile');
    Route::post('profile','UserController@update_avatar');
    // Comments Routes
    Route::get('/{post}/comments','CommentController@index');
    Route::post('/{post}/comments','CommentController@store');
    //One week old Articles
    Route::get('/seven-days','GeneralController@getData')->name('seven.days');
    });

//Admin view contacts messages
Route::group(['namespace' => 'Admin','prefix'=>'contacts'],function(){
    Route::get('/','GeneralController@getContacts')->name('contactus.contacts');
    Route::get('/{contact}/show','GeneralController@getContact')->name('contact.show');
    Route::get('/{id}','GeneralController@destroy')->name('contact.destroy');
    });
//Sitemap Routes
Route::group(['prefix' => 'sitemap.xml'],function(){
    Route::get('/', 'SitemapController@index');
    Route::get('/posts', 'SitemapController@posts');
    Route::get('/categories', 'SitemapController@categories');
    Route::get('/about', 'SitemapController@about');
    Route::get('/contact', 'SitemapController@contact');
    Route::get('/home', 'SitemapController@home');
    });
