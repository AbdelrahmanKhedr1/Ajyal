<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrdersController;
use App\Http\Controllers\Front\PaymentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('products/{product:slug}',[ProductController::class,'show'])->name('products.show'); //ال نقطتين و ال سلج عشان مش هبعت اي دي هبعت ال سلج
Route::resource('cart' , CartController::class);
Route::delete('cart/{cart}' , [CartController::class,'destroy'])->name('cart.destroy');
Route::get('checkout', [CheckoutController::class , 'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class , 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/{provider}/redirect',[SocialLoginController::class,'redirect'])->name( 'auth.socialite.redirect');
Route::get('auth/{provider}/callback',[SocialLoginController::class,'callback'] )->name('auth.socialite.callback');
Route::get('orders/{order}/payments',[PaymentsController::class,'create'])->name('orders.payments.create');
Route::post('orders/{order}/stripe/payment-intent',[PaymentsController::class,'createStripePaymentIntent'])->name('stripe.paymentIntent.create');
Route::get('orders/{order}/stripe/callback',[PaymentsController::class,'confirm'])->name('stripe.return');
Route::get('order/{order}',[OrdersController::class,'show'])->name('order.show');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
