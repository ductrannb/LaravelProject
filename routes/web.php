<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/test-connect', function () {
//     $users = DB::table('users')->get();
//     foreach($users as $user) {
//         echo($user->email . "<br/>");
//     }
// });

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/html_dom', function () {
    print file_get_html('http://www.google.com/')->plaintext;
})->name('html_dom');
Route::controller(PaymentController::class)->group(function () {
    Route::post('/checkout', 'create');
    Route::delete('/delete_order', 'delete')->name('delete')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [PaymentController::class, 'index'])->name('checkout');
    Route::get('/orders', function () {
        return view('order.orders');
    });
    Route::get('payment', [PaymentController::class, 'showPaymentUI'])->name('payment.ui');
    Route::get('notifications', [HomeController::class, 'viewNotifications'])->name('notification');
    Route::post('notifications', [UserController::class, 'createNotification'])->name('notification.create');
});
