<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminUpdatePasswordController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminMealController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminEvaluationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCouponController;

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

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('login_control', [AdminLoginController::class, 'login'])->name('admin.login.control');
Route::get('admin/update/password/control', [AdminUpdatePasswordController::class, 'update_control'])->name('admin.update.password.control');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::view('barbecue', 'Layout.barbecue')->name('barbecue');

Route::get('admin/category/index', [AdminCategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/category/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
Route::post('admin/category/update/control', [AdminCategoryController::class, 'update_control'])->name('admin.category.update.control');
Route::get('admin/category/insert', [AdminCategoryController::class, 'insert'])->name('admin.category.insert');
Route::post('admin/category/insert/control', [AdminCategoryController::class, 'insert_control'])->name('admin.category.insert.control');
Route::get('admin/category/delete/control', [AdminCategoryController::class, 'delete_control'])->name('admin.category.delete.control');

Route::get('admin/meal/index', [AdminMealController::class, 'index'])->name('admin.meal.index');
Route::get('admin/meal/update', [AdminMealController::class, 'update'])->name('admin.meal.update');
Route::post('admin/meal/update/control', [AdminMealController::class, 'update_control'])->name('admin.meal.update.control');
Route::get('admin/meal/insert', [AdminMealController::class, 'insert'])->name('admin.meal.insert');
Route::post('admin/meal/insert/control', [AdminMealController::class, 'insert_control'])->name('admin.meal.insert.control');
Route::get('admin/meal/delete/control', [AdminMealController::class, 'delete_control'])->name('admin.meal.delete.control');

Route::get('admin/user/index', [AdminUserController::class, 'index'])->name('admin.user.index');
Route::get('admin/user/update', [AdminUserController::class, 'update'])->name('admin.user.update');
Route::post('admin/user/update/control', [AdminUserController::class, 'update_control'])->name('admin.user.update.control');
Route::get('admin/user/insert', [AdminUserController::class, 'insert'])->name('admin.user.insert');
Route::post('admin/user/insert/control', [AdminUserController::class, 'insert_control'])->name('admin.user.insert.control');
Route::get('admin/user/delete/control', [AdminUserController::class, 'delete_control'])->name('admin.user.delete.control');

Route::get('admin/order/index', [AdminOrderController::class, 'index'])->name('admin.order.index');

Route::get('admin/evaluation/index', [AdminEvaluationController::class, 'index'])->name('admin.evaluation.index');

Route::get('admin/coupon/index', [AdminCouponController::class, 'index'])->name('admin.coupon.index');
Route::get('admin/coupon/update', [AdminCouponController::class, 'update'])->name('admin.coupon.update');
Route::post('admin/coupon/update/control', [AdminCouponController::class, 'update_control'])->name('admin.coupon.update.control');
Route::get('admin/coupon/insert', [AdminCouponController::class, 'insert'])->name('admin.coupon.insert');
Route::post('admin/coupon/insert/control', [AdminCouponController::class, 'insert_control'])->name('admin.coupon.insert.control');
Route::get('admin/coupon/delete/control', [AdminCouponController::class, 'delete_control'])->name('admin.coupon.delete.control');


Route::resource('category', \App\Http\Controllers\CategoryController::class);

Route::resource('meal', \App\Http\Controllers\MealController::class);

Route::resource('user', \App\Http\Controllers\UserController::class);

Route::post('user/login',\App\Http\Controllers\LoginController::class);

Route::post('user/receive', \App\Http\Controllers\ReceiveController::class);

Route::post('user/clearCoupon', \App\Http\Controllers\ClearCouponController::class);

Route::post('user/updatePoints', \App\Http\Controllers\UpdatePointsController::class);

Route::apiResource('order', \App\Http\Controllers\OrderController::class);

Route::apiResource('evaluation', \App\Http\Controllers\EvaluationController::class);

Route::post('user/updateCoupon', \App\Http\Controllers\UpdateCouponController::class);

Route::resource('coupon', \App\Http\Controllers\CouponController::class);
