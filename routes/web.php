<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\CarController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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

// Bài tập Bán hàng
Route::get('/trangchu',[PageController::class,'getIndex'])->name('banhang.index');
Route::get('/chitiet/{sanpham_id}',[PageController::class,'getChiTiet'])->name('banhang.chitiet');
Route::get('/loai-san-pham/{id}',[PageController::class,'getCategory'])->name('banhang.category');
Route::get('/add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addtocart');
Route::post('/update-cart/{id}',[PageController::class,'updateCart'])->name('banhang.updatecart');
Route::get('/del-cart/{id}',[PageController::class,'delCart'])->name('banhang.delcart');
Route::get('/search',[PageController::class,'getSearch'])->name('banhang.search');
Route::get('/shopping-cart',[PageController::class,'getCart'])->name('banhang.getcart');
Route::get('/checkout',[PageController::class,'getCheckout'])->name('banhang.getcheckout');
Route::post('/checkout',[PageController::class,'postCheckout'])->name('banhang.postcheckout');

Route::get('/lienhe',[PageController::class,'getContact'])->name('banhang.getcontact');
Route::post('/lienhe',[PageController::class,'postContact'])->name('banhang.postcontact');

//đăng ký và đăng nhập của khách hàng
Route::get('/dangky',[PageController::class,'getSignin'])->name('getsignin');
Route::post('/dangky',[PageController::class,'postSignin'])->name('postsignin');

Route::get('/dangnhap',[PageController::class,'getLogin'])->name('getlogin');
Route::post('/dangnhap',[PageController::class,'postLogin'])->name('postlogin');

//đăng xuất
Route::get('/dangxuat',[PageController::class,'getLogout'])->name('getlogout');

Route::group(['prefix' => 'khach-hang', 'middleware' => 'auth'], function() {
    Route::get('/thong-tin', [PageController::class, 'getProfile'])->name('khachhang.profile');
    Route::post('/thong-tin', [PageController::class, 'postProfile'])->name('khachhang.postProfile');
    Route::get('/wishlist', [PageController::class, 'getWishlist'])->name('khachhang.wishlist');
    Route::get('/add-to-wishlist/{id}', [PageController::class, 'addToWishlist'])->name('khachhang.addwishlist');
    Route::get('/del-wishlist/{id}', [PageController::class, 'delWishlist'])->name('khachhang.delwishlist');
});

// Admin routes
Route::get('/admin/dangnhap',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('/admin/dangnhap',[UserController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/dangxuat',[UserController::class,'getLogout'])->name('admin.getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
       Route::group(['prefix'=>'category'],function(){
            Route::get('danhsach',[CategoryController::class,'getCateList'])->name('admin.getCateList');
            Route::get('them',[CategoryController::class,'getCateAdd'])->name('admin.getCateAdd');
            Route::post('them',[CategoryController::class,'postCateAdd'])->name('admin.postCateAdd');
            Route::get('xoa/{id}',[CategoryController::class,'getCateDelete'])->name('admin.getCateDelete');
            Route::get('sua/{id}',[CategoryController::class,'getCateEdit'])->name('admin.getCateEdit');
            Route::post('sua/{id}',[CategoryController::class,'postCateEdit'])->name('admin.postCateEdit');
        });

        Route::group(['prefix'=>'product'],function(){
            Route::get('danhsach',[ProductController::class,'getProductList'])->name('admin.getProductList');
            Route::get('them',[ProductController::class,'getProductAdd'])->name('admin.getProductAdd');
            Route::post('them',[ProductController::class,'postProductAdd'])->name('admin.postProductAdd');
            Route::get('xoa/{id}',[ProductController::class,'getProductDelete'])->name('admin.getProductDelete');
            Route::get('sua/{id}',[ProductController::class,'getProductEdit'])->name('admin.getProductEdit');
            Route::post('sua/{id}',[ProductController::class,'postProductEdit'])->name('admin.postProductEdit');
        });

        Route::group(['prefix'=>'user'],function(){
            Route::get('danhsach',[UserController::class,'getUserList'])->name('admin.getUserList');
            Route::get('them',[UserController::class,'getUserAdd'])->name('admin.getUserAdd');
            Route::post('them',[UserController::class,'postUserAdd'])->name('admin.postUserAdd');
            Route::get('xoa/{id}',[UserController::class,'getUserDelete'])->name('admin.getUserDelete');
            Route::get('sua/{id}',[UserController::class,'getUserEdit'])->name('admin.getUserEdit');
            Route::post('sua/{id}',[UserController::class,'postUserEdit'])->name('admin.postUserEdit');
        });

        Route::group(['prefix'=>'order'],function(){
            Route::get('danhsach',[OrderController::class,'getOrderList'])->name('admin.getOrderList');
            Route::get('chitiet/{id}',[OrderController::class,'getOrderDetail'])->name('admin.getOrderDetail');
            Route::get('xoa/{id}',[OrderController::class,'getOrderDelete'])->name('admin.getOrderDelete');
            Route::post('capnhat-trangthai/{id}',[OrderController::class,'postUpdateStatus'])->name('admin.postUpdateOrderStatus');
        });

        Route::group(['prefix'=>'contact'],function(){
            Route::get('danhsach',[ContactController::class,'getList'])->name('admin.getContactList');
            Route::post('traloi/{id}',[ContactController::class,'postReply'])->name('admin.postContactReply');
        });
});

// Bài tập Website Food
Route::prefix('food')->group(function() {
    Route::get('/', [\App\Http\Controllers\FoodController::class, 'index'])->name('food.index');
    Route::get('/create', [\App\Http\Controllers\FoodController::class, 'create'])->name('food.create');
    Route::post('/', [\App\Http\Controllers\FoodController::class, 'store'])->name('food.store');
});