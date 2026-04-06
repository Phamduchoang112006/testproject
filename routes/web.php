<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\CarController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoomController;

// 1. Trang chủ (Hiện bảng 2 sự lựa chọn)
Route::get('/', function () {
    return view('examples.menu');
});

// 2. Chức năng Giải phương trình bậc nhất
Route::get('ptb1', function(){
    return view('examples.ptb1');
});
Route::post('ptb1', function(Request $req){
    $a = $req->input('hsa');
    $b = $req->input('hsb');
    if($a == 0) $kq = ($b == 0) ? 'Vô số nghiệm' : 'Vô nghiệm';
    else $kq = 'Nghiệm x = ' . number_format(-$b/$a, 2);
    return view('examples.ptb1', compact('kq', 'a', 'b'));
});

// 3. Chức năng Bảng tính (Calculator)
Route::get('calculator', function(){
    return view('examples.calculator');
});
Route::post('calculator', function(Request $req){
    // Validation
    $req->validate([
        'num1' => 'required|numeric',
        'num2' => 'required|numeric',
    ], [
        'required' => 'Không được để trống!',
        'numeric' => 'Phải nhập số!'
    ]);

    $n1 = $req->num1;
    $n2 = $req->num2;
    $op = $req->op;
    $res = 0;

    switch($op) {
        case '+': $res = $n1 + $n2; break;
        case '-': $res = $n1 - $n2; break;
        case '*': $res = $n1 * $n2; break;
        case '/': $res = ($n2 != 0) ? $n1 / $n2 : 'Lỗi chia cho 0'; break;
    }

    return view('examples.calculator', compact('res', 'n1', 'n2', 'op'));
});

// 4. Chức năng Quản lý xe (Cars)
Route::get('cars', 'App\Http\Controllers\CarController@index')->name('cars.index');
Route::get('cars/create', 'App\Http\Controllers\CarController@create')->name('cars.create');
Route::post('cars', 'App\Http\Controllers\CarController@store')->name('cars.store');
Route::delete('cars/{car}', 'App\Http\Controllers\CarController@destroy')->name('cars.destroy');

// 5. Chức năng Quản lý nhà hàng (Restaurant)
Route::prefix('restaurant')->group(function() {
    Route::get('/', 'App\Http\Controllers\RestaurantController@index')->name('restaurant.index');
    Route::get('/create', 'App\Http\Controllers\RestaurantController@create')->name('restaurant.create');
    Route::post('/', 'App\Http\Controllers\RestaurantController@store')->name('restaurant.store');
    Route::get('/{restaurant}', 'App\Http\Controllers\RestaurantController@show')->name('restaurant.show');
});

// 6. Chức năng Quản lý phòng (Room - Yêu cầu 4)
Route::prefix('rooms')->group(function() {
    Route::get('/create', 'App\Http\Controllers\RoomController@create')->name('rooms.create');
    Route::post('/', 'App\Http\Controllers\RoomController@store')->name('rooms.store');
});