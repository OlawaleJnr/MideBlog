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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Post Route
Route::get('/post/{post}', 'AdminPostsController@post')->name('post');

// Unlock Screen
Route::get('/login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');

Route::post('/login/locked', 'Auth\LoginController@unlock')->name('login.unlock');


Route::group(['middleware' => ['admin']], function () {

    // Admin Route View
    Route::get('/admin', function () {
        return view('layouts.admin');
    })->name('admin')->middleware('auth.lock');

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




