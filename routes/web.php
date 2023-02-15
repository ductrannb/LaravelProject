<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

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

Route::get('/pay', [PaymentController::class, 'index'])->name('pay');

Route::get('/html_dom', function () {
    print file_get_html('http://www.google.com/')->plaintext;
})->name('html_dom');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/res_checkout', function () {
    echo "Success";
});