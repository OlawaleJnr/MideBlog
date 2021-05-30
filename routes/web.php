<?php

use App\Post;
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


Route::get('/', function () {
    $posts = Post::all();
    return view('index', compact('posts'));
});

// User Auth Routes
Auth::routes(['verify' => true]);


// Admin Web Routes
Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function() {
    Route::get('/', 'Auth\LoginController@index')->name('login');
    Route::post('/', 'Auth\LoginController@login')->name('auth.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});


//User Web Routes
Route::group(['prefix' => '/user', 'middleware' => 'verified'], function() {
    Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::get('/account-settings', 'UserAccountsController@index')->name('user.account.settings');
});


// Post Route
Route::get('/post/{post}', 'AdminPostsController@post')->name('blog.post');



Route::group(['middleware' => ['admin', 'verified']], function () {
    // Admin Route View
    Route::get('/admin/dashboard', function () {
		return view('layouts.admin');
	})->name('admin.home');

    // Admin Users Resource view
    Route::resource('/admin/users', 'AdminUsersController');

    // Admin Users Manage View
    Route::get('/admin/user/manage', 'AdminUsersController@manage')->name('users.manage');

    // Admin Post Resource view
    Route::resource('/admin/posts', 'AdminPostsController');

    // Admin Posts Manage View
    Route::get('/admin/post/manage', 'AdminPostsController@manage')->name('posts.manage');

    // Admin Categories Resource view
    Route::resource('/admin/categories', 'AdminCategoriesController');

    // Admin Medias Resource view
    Route::resource('/admin/media', 'AdminMediasController');

    // Post Comments Resource View
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::patch('/admin/comments/approve/{comment}', 'PostCommentsController@approve')->name('comments.approve');
    Route::patch('/admin/comments/unapprove/{comment}', 'PostCommentsController@unapprove')->name('comments.unapprove');

    // Admin Comment Reply Resource View
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('/comment/reply', 'CommentRepliesController@storeReply')->name('comment.store.replies');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'admin', 'verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
