<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@getIndex');
Route::get('san-pham/{id}/{url}.html', 'PageController@getSanPham');
Route::get('chi-tiet/{id}/{url}.html', 'PageController@getChiTiet');
Route::get('loai-san-pham/{id}/{url}.html', 'PageController@getLoaiSp');


Route::get('dang-nhap.html', 'PageController@getLogin');
Route::post('dang-nhap.html', 'PageController@postLogin');
Route::get('dang-xuat.html', 'PageController@getLogout');
Route::get('thong-tin-tai-khoang.html',['middleware' => 'site_check', 'uses' => 'PageController@getInfo']);
Route::get('lien-he.html', 'PageController@getLienHe');
Route::post('lien-he.html', 'PageController@postLienHe');
Route::get('mua-hang/{id}', 'PageController@getMuaHang');
Route::get('gio-hang.html', 'PageController@getGioHang');
Route::get('xoa-san-pham/{id}', 'PageController@getXoaSP');
Route::post('update-gio-hang', 'PageController@postUpdate');

Route::get('admin/', function(){
	return redirect('admin/slide/danh-sach.html');
});



Route::group(['prefix' => 'admin','middleware' => 'admin_check'], function(){
	Route::group(['prefix' => 'cate'], function(){
		Route::get('danh-sach.html', 'CateController@getDanhSach');

		Route::get('them-cate.html', 'CateController@getThem');
		Route::post('them-cate.html', 'CateController@postThem');

		Route::get('{id}/sua-cate.html', 'CateController@getSua');
		Route::post('{id}/sua-cate.html', 'CateController@postSua');

		Route::get('xoa/{id}', 'CateController@getXoa');
	});

	Route::group(['prefix' => 'slide'], function(){
		Route::get('danh-sach.html', 'SlideController@getDanhSach');

		Route::get('them.html', 'SlideController@getThem');
		Route::post('them.html', 'SlideController@postThem');

		Route::get('{id}/sua.html', 'SlideController@getSua');
		Route::post('{id}/sua.html', 'SlideController@postSua');

		Route::get('xoa/{id}', 'SlideController@getXoa');
	});

	Route::group(['prefix' => 'lien-he'], function(){
		Route::get('danh-sach.html', 'LienHeController@getDanhSach');
		Route::get('xoa/{id}', 'LienHeController@getXoa');
	});

	Route::group(['prefix' => 'user'], function(){
		Route::get('danh-sach.html', 'UserController@getDanhSach');

		Route::get('them-user.html', 'UserController@getThem');
		Route::post('them-user.html', 'UserController@postThem');

		Route::get('{id}/sua-user.html', 'UserController@getSua');
		Route::post('{id}/sua-user.html', 'UserController@postSua');

		Route::get('xoa/{id}', 'UserController@getXoa');
	});

	Route::group(['prefix' => 'san-pham' ], function(){
		Route::get('danh-sach.html', 'ProductController@getDanhSach');

		Route::get('them-san-pham.html', 'ProductController@getThem');
		Route::post('them-san-pham.html', 'ProductController@postThem');

		Route::get('{id}/sua-san-pham.html', 'ProductController@getSua');
		Route::post('{id}/sua-san-pham.html', 'ProductController@postSua');

		Route::get('xoa/{id}', 'ProductController@getXoa');

	});
});

Route::get('admin/dang-nhap.html', function(){
	return view('admin.login');
});
Route::post('admin/dang-nhap.html', 'UserController@postlogin');
Route::get('admin/dang-xuat.html', 'UserController@getDangXuat');