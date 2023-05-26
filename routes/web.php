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
Route::get('/get-phone', function () {
    $html = file_get_html('https://ladorax.com/diem-ban/');
        foreach ($html->find('a') as $element) {
            if (strpos($element->href, "dia_diem")) {
                $index = 1;
                foreach (file_get_html($element->href)->find('td') as $sub_element) {
                    if ($sub_element->innertext && $index % 5 == 0) {
                        echo ($sub_element->innertext . "<br>");
                    }
                    $index++;
                }
            }
        }
})->name('get-phone');
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
