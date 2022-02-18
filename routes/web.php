<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

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
Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/users', [UserController::class, 'user'])->middleware(['auth'])->name('users');

Route::get('/individualusers', [UserController::class, 'individualusers'])->middleware(['auth'])->name('individualusers');

 Route::get('/businessusers', [UserController::class, 'businessusers'])->middleware(['auth'])->name('businessusers');

// Route::get('/search', [UserController::class, 'search'])->middleware(['auth'])->name('search');

 Route::get('/user_details/{id}', [UserController::class, 'user_details'])->middleware(['auth'])->name('user_details');

 Route::get('/user_details_bis/{id}', [UserController::class, 'user_details_bis'])->middleware(['auth'])->name('user_details_bis');

// Route::get('/view_transaction_details/{user_id}', [UserController::class, 'view_transaction_details'])->middleware(['auth'])->name('view_transaction_details');

// Route::get('/view_transaction_details_pending/{user_id}', [UserController::class, 'view_transaction_details_pending'])->middleware(['auth'])->name('view_transaction_details_pending');

// Route::get('/view_transaction_details_success/{user_id}', [UserController::class, 'view_transaction_details_success'])->middleware(['auth'])->name('view_transaction_details_success');

 Route::get('/update_status/{id}', 'App\Http\Controllers\UserController@update_status')->name('update_status');

 Route::get('/transactions', [UserController::class, 'transactions'])->middleware(['auth'])->name('transactions');

 Route::get('/verify', [UserController::class, 'verify'])->middleware(['auth'])->name('verify');

 Route::get('/unverified', [UserController::class, 'unverified'])->middleware(['auth'])->name('unverified');

 Route::get('/status', [UserController::class, 'status'])->middleware(['auth'])->name('status');

// Route::get('/successinfo/{transaction_id}', [UserController::class, 'successinfo'])->middleware(['auth'])->name('successinfo');

// Route::get('/localUsersStatus', [UserController::class, 'localUsersStatus'])->middleware(['auth'])->name('localUsersStatus');

// Route::get('/foreignUsersStatus', [UserController::class, 'foreignUsersStatus'])->middleware(['auth'])->name('foreignUsersStatus');

// Route::get('/selectuser', [UserController::class, 'selectuser'])->middleware(['auth'])->name('selectuser');


Route::get('/statusdeclined', [UserController::class, 'statusdeclined'])->middleware(['auth'])->name('statusdeclined');

Route::get('/pendinginfo/{user_id}', [UserController::class, 'pendinginfo'])->middleware(['auth'])->name('pendinginfo');

Route::get('/ongoingstatus', [UserController::class, 'ongoingstatus'])->middleware(['auth'])->name('ongoingstatus');

Route::get('/ongoinginfo/{user_id}', [UserController::class, 'ongoinginfo'])->middleware(['auth'])->name('ongoinginfo');

Route::get('/show/{id}', [UserController::class, 'show'])->middleware(['auth'])->name('show');

Route::get('/showimage/{id}', [UserController::class, 'showimage'])->middleware(['auth'])->name('showimage');

Route::get('/message/{id}', [UserController::class, 'message'])->middleware(['auth'])->name('message');

Route::post('/messagesend', [UserController::class, 'messagesend'])->middleware(['auth'])->name('messagesend');

// Route::post('/messagesend2', [UserController::class, 'messagesend2'])->middleware(['auth'])->name('messagesendtoUsers');


 Route::get('/update_verify/{id}', 'App\Http\Controllers\UserController@update_verify')->name('update_verify');

 Route::get('/wallet', [UserController::class, 'wallet'])->middleware(['auth'])->name('wallet');

 Route::get('/fupending', [UserController::class, 'fupending'])->middleware(['auth'])->name('fupending');

require __DIR__.'/auth.php';
