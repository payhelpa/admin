<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controller;
use App\Http\Controllers\UserApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Request\UserApiRequest;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [UserApiController::class, 'register']);
Route::post('/login', [UserApiController::class, 'login'])/*->middleware('verified')*/;
Route::post('/verify-account', [UserApiController::class, 'verifyEmailAddress']);
//Route::get('/verify-account', [App\Http\Controllers\Api\EmailVerificationRequest::class, 'verify'])->name('verification.verify');
 



//protected routes
Route::group(['middleware' => ['auth:sanctum']], function (){
    //Auth::routes(['verify' => true]);
    // Route::get('/users/{user}', [UsersController::class, 'show']);
   

 
     Route::get('/users', [UsersController::class, 'index']);
 
     Route::post('/email/sendNotification', [EmailVerificationController::class, 'SendVerificationEmail'])->name('verification.send');
     
     //Route::get('/verify', [VerifyEmailController::class, 'verify'])->name('verification.verify');

    
     /*Route::get('/email/verify/{id}', function (EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify'); */
     Route::post('/email/resend', [App\Http\Controllers\Api\VerificationController::class, 'resend'])->name('verification.resend');
 //    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Api\VerificationController::class, 'verify'])->name('verification.verify');
 
 
 });
 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
