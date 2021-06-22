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

Auth::routes();
Route::post('register', 'Login\RegisterController@register');

Route::group(['middleware' => ['auth']],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/fetchComments/{id}', 'HomeController@fetchComment');
    Route::post('/like/{id}', 'HomeController@createLike');
    Route::get('/get-post-like/{id}', 'HomeController@getPostLike');
    Route::post('/dislike/{id}', 'HomeController@createDislike');
    Route::get('/get-post-dislike/{id}', 'HomeController@getPostDislike');
    Route::post('create-comment', 'HomeController@createComment');
    Route::post('create-new-post', 'HomeController@createPost');

    Route::get('/profile/{username}', 'HomeController@viewProfile');
    Route::get('/user/profile/{username}', 'HomeController@viewUserProfile');
    Route::get('user/about', 'HomeController@viewProfileAbout');
    Route::get('people-you-may-know', 'Friends\FriendsController@viewFriendPage');
    Route::post('friend-add/{id}', 'Friends\FriendsController@addNewFriend');
    Route::get('search-friends/{id}', 'Friends\FriendsController@findFriends');
    Route::post('change-profile-pic', 'Friends\FriendsController@changeProfilePic');

    // Blogs Route 
    Route::get('/my/article', 'Blog\BlogController@index')->name('my.articles');
    Route::get('/create/blog', 'Blog\BlogController@create');
    Route::get('/blogs', 'Blog\BlogController@blog')->name('blogs');
    Route::post('/store/blog', 'Blog\BlogController@store')->name('store.blog');
    Route::get('/blog/details/{slug}', 'Blog\BlogController@details')->name('blog.details');
    Route::post('/comment/{singleBlog}', 'Blog\CommentController@store')->name('comment.store');
    Route::get('/delete/{id}', 'Blog\BlogController@deleteblog')->name('delete.blog');
    Route::get('/edit/{id}', 'Blog\BlogController@editblog')->name('edit.blog');
    Route::post('/update/{id}', 'Blog\BlogController@updateblog')->name('update.blog');

    // Album Routes
    Route::get('album', 'Album\AlbumController@showAlbum');
    Route::get('videos', 'Album\AlbumController@showVideoAlbum');

    // Sidebar footer routes 
    Route::get('/about', 'sidebar\SidebarFooterController@about');
    Route::get('/privacy', 'sidebar\SidebarFooterController@privacy');
    Route::get('/terms', 'sidebar\SidebarFooterController@terms');

    // Wallet section start
    Route::get('/wallet/show', 'Wallet\WalletController@showWallet');
});

//*********************Admin DashBoard Start**************************
Route::get('/login7778899', 'Admin\AdminController@loginView')->name('/login7778899');
Route::post('/loginPost', 'Admin\AdminController@loginVarify')->name('/loginPost');

Route::group(['middleware' => ['Admin']], function() {
    Route::get('/dashboard7778899', 'Admin\AdminController@index')->name('/dashboard7778899');
    Route::get('user/{id}', 'Admin\AdminController@adminViewUser');
    Route::post('/update-user/{id}', 'Admin\AdminController@updateUserInfo');
    Route::get('/logoutAdmin', 'Admin\AdminController@logoutAdmin')->name('/logoutAdmin');
    Route::get('/withdraw-reqtoadmin', 'Admin\AdminController@seeRequest')->name('withdraw-reqtoadmin');
    Route::get('/Approve-Request/{id}', 'Admin\AdminController@AcceptPaymentReq')->name('Approve-Request');
    Route::get('/Delete-Request/{id}', 'Admin\AdminController@DeletePaymentReq')->name('Delete-Request');
    Route::get('/all_users_view', 'Admin\AdminController@seeAllUser')->name('all_users');
    Route::get('/AdminEdit/{id}', 'Admin\AdminController@EditUser')->name('AdminEdit');
    Route::post('/AdminEdit/{id}', 'Admin\AdminController@UpdateUser')->name('AdminEdit');
    Route::get('pointRest', 'PointController@PointRest')->name('PointRest');
});