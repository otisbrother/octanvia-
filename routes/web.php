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

use App\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/room', function () {
    return view('frontend/room');
});

// xu ly de lam sao user dang nhap moi dung dc, se lam sau khi test xong viec get giu lieu = ajax

Route::get('/user/getAllRoomViewed', 'UserViewedController@getAllRoomViewed')->name('userviewed.getAllRoomViewed');
Route::get('/user/storeRoomViewed/{user_id}/{room_id}', 'UserViewedController@storeViewed')->name('userviewed.store');
Route::get('/user/storeVoted/{user_id}/{room_id}/{count_star}', 'UserVotedController@storeVoted')->name('uservoted.store');
Route::get('/user/storeLiked/{user_id}/{room_id}', 'UserLikedController@storeLiked')->name('userliked.store');

Route::get('/admin/login', 'AdminController@login')->name('admin.login');
//Route::get('/login', 'ShopController@login')->name('shop.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');

//Route::get('/sendNoti/{title}/{msg}/{receiver_id}', 'AdminController@sendNoti');

Route::get('/getListDistrict/{city_id}', 'AdminController@getListDistrict');





Route::group(['prefix' => 'admin','as' => 'admin.', 'middleware' => ['checkLogin']], function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('room', 'RoomController');
    Route::get('/user/getListOwnerRequested', 'UserController@getListRequestedOwner')->name('user.getListOwnerRequested');
    Route::resource('user', 'UserController');
    Route::resource('roomtype', 'RoomTypeController');
    Route::resource('city', 'CityController');
    Route::resource('district', 'DistrictController');
    Route::get('/comment/getAllUnApprovedComments', 'CommentController@getAllUnApprovedComments')->name('comment.getAllUnApprovedComments');
    Route::resource('comment', 'CommentController');
    Route::get('/report/getAllUnApprovedReports', 'ReportController@getAllUnApprovedReports')->name('report.getAllUnApprovedReports');
    Route::resource('report', 'ReportController');
    Route::delete('/roomimage/{id}', 'RoomController@deleteRoomImage')->name('room/deleteRoomImage');
    Route::get('/showAllExtendRoomRequest', 'AdminController@showAllExtendRoomRequest')->name('showAllExtendRoomRequest');
    Route::get('/test', 'AdminController@test');
    Route::get('/approveExtendRequest/{request_id}','AdminController@extendDate')->name('approveExtendRequest');
    Route::get('/deleteRequest/writeReason/{request_id}', 'AdminController@writeReason')->name('deleteRequest.writeReason');
    Route::post('/deleteRequest/refuseRequest/{request_id}', 'AdminController@refuseExtendDate')->name('deleteRequest.refuseExtendDate');
    Route::get('/approveOwnerAccount/{owner_id}', 'AdminController@approveOwnerAccount');
});

Route::get('/owner/login', 'OwnerController@login')->name('owner.login');
Route::post('/owner/postLogin', 'OwnerController@postLogin')->name('owner.postLogin');

Route::get('/owner/register', 'OwnerController@register')->name('owner.register');
Route::post('/owner/postRegister', 'OwnerController@postRegister')->name('owner.postRegister');

Route::group(['prefix' => 'owner','as' => 'owner.', 'middleware' => ['checkLoginOwner']], function() {
    Route::get('/','OwnerController@getAllRoom')->name('room.index');
    Route::get('/show/{id}', 'OwnerController@showRoomDetail')->name('room.show');
    Route::get('/create', 'OwnerController@viewCreateRoom')->name('room.create');
    Route::post('/postCreateRoom', 'OwnerController@storeRoom')->name('room.storeRoom');
    Route::get('/edit/{id}', 'OwnerController@viewEditRoom')->name('room.edit');
    Route::post('/postEdit', 'OwnerController@update')->name('room.update');
    Route::get('/room/extendDate/{roomId}', 'OwnerController@extendDate')->name('room.extendDate');
    Route::post('/room/extendDate/{roomId}', 'OwnerController@require_extendDate')->name('room.postextendDate');
//    Route::post('/extend/{roomId}', 'OwnerController@viewExtend')->name('room.extend');
    Route::get('/requestEditRoom/{roomId}', 'OwnerController@requestEditRoom')->name('room.requestEdit');
    Route::post('/sendRequestEditRoom', 'OwnerController@sendRequestEditRoom')->name('room.sendRequestEditRoom');
    Route::get('/showProfile', 'OwnerController@showProfile')->name('showProfile');
});
