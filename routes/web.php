<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\HomeController;
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


// đây là router web khi gõ vào trình duyệt http://laravelweb.local/ sẽ gọi vào đây trả ra view dự án
Route::get('/', [HomeController::class, 'index'])->name('home');
// url product
Route::get('chi-tiet-san-pham/{id}', [HomeController::class, 'productById'])->name('productById');
// Tìm kiếm sản phẩm bằng phương thức get khi nhập vào input ở form header sẽ thực hiện
// GET Request và search sản phẩm SQL : SELECT * FROM SAN PHAM WHERE NAME LIKE '%giatritimkiem%'
Route::get('tim-kiem', [HomeController::class, 'search'])->name('searchProduct');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('postLogin');

Route::get('gio-hang', [CartController::class, 'index'])->name('cart');
Route::get('them-san-pham/{id}', [CartController::class, 'add'])->name('cart_add');
Route::get('xoa-san-pham/{id}', [CartController::class, 'delete'])->name('cart_delete');
// lấy sản phẩm theo danh mục
Route::get('danh-muc-san-pham/{id:\d+}', [HomeController::class, 'getProductByCategoryId'])->name('category');
Route::get('dat-hang', [CartController::class, 'order'] )->name('nameorder');
require('admin.php');
