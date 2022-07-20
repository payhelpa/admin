<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ChargesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\IndustryController;
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


Route::get('/', [LoginController ::class, 'index'])->name('login');

//Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('/loginn', [LoginController::class, 'login'])->name('loginn');


// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/users', [UserController::class, 'user'])->middleware(['auth'])->name('users');

Route::get('/subadmin.subusersnig', [UserController::class, 'subusersnig'])->middleware(['auth'])->name('subusersnig');

Route::get('/subadmin.subusersus', [UserController::class, 'subusersus'])->middleware(['auth'])->name('subusersus');

Route::get('/USusers', [UserController::class, 'USusers'])->middleware(['auth'])->name('USusers');

 Route::get('/Nigusers', [UserController::class, 'Nigusers'])->middleware(['auth'])->name('Nigusers');

 Route::get('/profile', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');

 Route::post('/profileupdate', [UserController::class, 'profileUpdate'])->middleware(['auth'])->name('profileupdate');

 Route::post('/changePassword', [UserController::class, 'changePassword'])->middleware(['auth'])->name('changePassword');
//  Route::get('/profile/update/{id}', [ServiceController::class, 'updateprofile'])->middleware(['auth'])->name('profile.update');

// Route::put('/profile/update/{id}', [ServiceController::class, 'updateprofile'])->middleware(['auth'])->name('profile.update');

// Route::get('/search', [UserController::class, 'search'])->middleware(['auth'])->name('search');

 Route::get('/user_details/{id}', [UserController::class, 'user_details'])->middleware(['auth'])->name('user_details');

 Route::get('/user_details_bis/{id}', [UserController::class, 'user_details_bis'])->middleware(['auth'])->name('user_details_bis');

// Route::get('/view_transaction_details/{user_id}', [UserController::class, 'view_transaction_details'])->middleware(['auth'])->name('view_transaction_details');

// Route::get('/view_transaction_details_pending/{user_id}', [UserController::class, 'view_transaction_details_pending'])->middleware(['auth'])->name('view_transaction_details_pending');

// Route::get('/view_transaction_details_success/{user_id}', [UserController::class, 'view_transaction_details_success'])->middleware(['auth'])->name('view_transaction_details_success');

 Route::get('/update_status/{id}', 'App\Http\Controllers\UserController@update_status')->name('update_status');

 Route::get('/transactions', [TransactionController::class, 'transactions'])->middleware(['auth'])->name('transactions');

 Route::get('/verify', [UserController::class, 'verify'])->middleware(['auth'])->name('verify');

 Route::get('/verifyBusiness', [UserController::class, 'verifyBusiness'])->middleware(['auth'])->name('verifyBusiness');

 Route::get('/unverified', [UserController::class, 'unverified'])->middleware(['auth'])->name('unverified');

 Route::get('/status', [TransactionController::class, 'status'])->middleware(['auth'])->name('status');

 Route::get('/single-Solicitors/{id}', [TransactionController::class, 'singleSolicitors'])->middleware(['auth'])->name('singleSolicitors');

 Route::get('/successinfo/{user_id}', [TransactionController::class, 'successinfo'])->middleware(['auth'])->name('successinfo');

// Route::get('/localUsersStatus', [UserController::class, 'localUsersStatus'])->middleware(['auth'])->name('localUsersStatus');

// Route::get('/foreignUsersStatus', [UserController::class, 'foreignUsersStatus'])->middleware(['auth'])->name('foreignUsersStatus');

// Route::get('/selectuser', [UserController::class, 'selectuser'])->middleware(['auth'])->name('selectuser');


Route::get('/statusdeclined', [TransactionController::class, 'statusdeclined'])->middleware(['auth'])->name('statusdeclined');

Route::get('/pendinginfo/{user_id}', [TransactionController::class, 'pendinginfo'])->middleware(['auth'])->name('pendinginfo');

Route::get('/unitedstateTransaction', [TransactionController::class, 'unitedstateTransaction'])->middleware(['auth'])->name('unitedstateTransaction');

Route::get('/singleOngoinginfo/{id}', [TransactionController::class, 'singleOngoinginfo'])->middleware(['auth'])->name('singleOngoinginfo');

Route::get('/ongoinginfo/{user_id}', [UserController::class, 'ongoinginfo'])->middleware(['auth'])->name('ongoinginfo');

Route::get('/show/{id}', [UserController::class, 'show'])->middleware(['auth'])->name('show');

Route::get('/showimage/{id}', [UserController::class, 'showimage'])->middleware(['auth'])->name('showimage');

Route::get('/showdoc/{id}', [UserController::class, 'showdoc'])->middleware(['auth'])->name('showdoc');

Route::get('/showBusiness/{id}', [UserController::class, 'showBusiness'])->middleware(['auth'])->name('showBusiness');

Route::get('/showCofI/{id}', [UserController::class, 'showCofI'])->middleware(['auth'])->name('showCofI');

Route::get('/showmemo/{id}', [UserController::class, 'showmemo'])->middleware(['auth'])->name('showmemo');

Route::get('/showotherdoc/{id}', [UserController::class, 'showotherdoc'])->middleware(['auth'])->name('showotherdoc');

Route::get('/completionprove/{id}', [UserController::class, 'completionprove'])->middleware(['auth'])->name('completionprove');

Route::get('/message/{id}', [UserController::class, 'message'])->middleware(['auth'])->name('message');

Route::post('/messagesend', [UserController::class, 'messagesend'])->middleware(['auth'])->name('messagesend');

Route::get('/user/delete/{id}', [UserController::class, 'deleteuser'])->middleware(['auth'])->name('user.delete');

// Route::post('/messagesend2', [UserController::class, 'messagesend2'])->middleware(['auth'])->name('messagesendtoUsers');


Route::get('/update_verify/{id}', 'App\Http\Controllers\UserController@update_verify')->name('update_verify');

Route::get('/update_verifyBsn/{id}', [UserController::class, 'update_verifyBsn'])->name('update_verifyBsn');

Route::get('/wallet', [TransactionController::class, 'wallet'])->middleware(['auth'])->name('wallet');

Route::get('/fupending', [TransactionController::class, 'fupending'])->middleware(['auth'])->name('fupending');

Route::get('/nairaSolicitation/{id}', [TransactionController::class, 'nairaSolicitation'])->middleware(['auth'])->name('nairaSolicitation');

Route::get('/singlependinginfo/{id}', [TransactionController::class, 'singlependinginfo'])->middleware(['auth'])->name('singlependinginfo');

Route::get('/withdrawals', [TransactionController::class, 'withdrawals'])->middleware(['auth'])->name('withdrawals');

Route::get('/approvewithdrawals/{user_id}', [TransactionController::class, 'approvewithdrawals'])->middleware(['auth'])->name('approvewithdrawals');

Route::get('/services', [ServiceController::class, 'services'])->middleware(['auth'])->name('services');

Route::get('/addServices', [ServiceController::class, 'addServices'])->middleware(['auth'])->name('addServices');

Route::post('/createServices', [ServiceController::class, 'createServices'])->middleware(['auth'])->name('createServices');

Route::get('/services/delete/{id}', [ServiceController::class, 'deleteServices'])->middleware(['auth'])->name('services.delete');

Route::get('/services/edit/{id}', [ServiceController::class, 'editServices'])->middleware(['auth'])->name('services.edit');

Route::get('/services/update/{id}', [ServiceController::class, 'updateServices'])->middleware(['auth'])->name('services.update');

Route::put('/services/update/{id}', [ServiceController::class, 'updateServices'])->middleware(['auth'])->name('services.update');

Route::get('/providuslog', [UserController::class, 'providuslog'])->middleware(['auth'])->name('providuslog');

Route::get('/adminlog', [AdminController::class, 'adminlog'])->middleware(['auth'])->name('adminlog');

Route::get('/calendar', [AdminController::class, 'calendar'])->middleware(['auth'])->name('calendar');

Route::get('/charges', [ChargesController::class, 'charges'])->middleware(['auth'])->name('charges');

Route::get('/charges/setPayhelpaFUCharges', [ChargesController::class, 'setPayhelpaFUCharges'])->middleware(['auth'])->name('charges.setPayhelpaFUCharges');

Route::post('/charges/setPayhelpaFUCharges', [ChargesController::class, 'setPayhelpaFUCharges'])->middleware(['auth'])->name('charges.setPayhelpaFUCharges');

Route::get('/charges/setPayhelpaLUCharges', [ChargesController::class, 'setPayhelpaLUCharges'])->middleware(['auth'])->name('charges.setPayhelpaLUCharges');

Route::post('/charges/setPayhelpaLUCharges', [ChargesController::class, 'setPayhelpaLUCharges'])->middleware(['auth'])->name('charges.setPayhelpaLUCharges');

Route::get('/charges/setPayhelpaTimer', [ChargesController::class, 'setPayhelpaTimer'])->middleware(['auth'])->name('charges.setPayhelpaTimer');

Route::post('/charges/setPayhelpaTimer', [ChargesController::class, 'setPayhelpaTimer'])->middleware(['auth'])->name('charges.setPayhelpaTimer');

Route::get('/charges', [ChargesController::class, 'charges'])->middleware(['auth'])->name('charges');

Route::get('/blog', [BlogController::class, 'blog'])->middleware(['auth'])->name('blog');

Route::post('/createblog', [BlogController::class, 'createblog'])->middleware(['auth'])->name('createblog');

Route::get('/allblog', [BlogController::class, 'allblog'])->middleware(['auth',])->name('allblog');

Route::get('/blogdetails/{id}', [BlogController::class, 'blogdetails'])->middleware(['auth'])->name('blogdetails');

Route::get('/blog/delete/{id}', [BlogController::class, 'deleteblog'])->middleware(['auth'])->name('blog.delete');

Route::get('/industry', [IndustryController::class, 'industry'])->middleware(['auth'])->name('industry');

Route::get('/addindustry', [IndustryController::class, 'addindustry'])->middleware(['auth'])->name('addindustry');

Route::post('/createindustry', [IndustryController::class, 'createindustry'])->middleware(['auth'])->name('createindustry');

Route::get('/industry/delete/{id}', [IndustryController::class, 'deleteindustry'])->middleware(['auth'])->name('industry.delete');

Route::get('/industry/edit/{id}', [IndustryController::class, 'editindustry'])->middleware(['auth'])->name('industry.edit');

Route::get('/industry/update/{id}', [IndustryController::class, 'updateindustry'])->middleware(['auth'])->name('industry.update');

Route::put('/industry/update/{id}', [IndustryController::class, 'updateindustry'])->middleware(['auth'])->name('industry.update');

Route::get('/tag', [BlogController::class, 'tag'])->middleware(['auth'])->name('tag');

Route::get('/addtag', [BlogController::class, 'addtag'])->middleware(['auth'])->name('addtag');

Route::post('/createtag', [BlogController::class, 'createtag'])->middleware(['auth'])->name('createtag');

Route::get('/tag/delete/{id}', [BlogController::class, 'deletetag'])->middleware(['auth'])->name('tag.delete');

Route::get('/tag/edit/{id}', [BlogController::class, 'edittag'])->middleware(['auth'])->name('tag.edit');

Route::get('/tag/update/{id}', [BlogController::class, 'updatetag'])->middleware(['auth'])->name('tag.update');

Route::put('/tag/update/{id}', [BlogController::class, 'updatetag'])->middleware(['auth'])->name('tag.update');

Route::get('export/', [UserController::class, 'export'])->middleware(['auth'])->name('export');

Route::get('exportbiz/', [UserController::class, 'exportbiz'])->middleware(['auth'])->name('exportbiz');

Route::get('/country', [CountryController::class, 'country'])->middleware(['auth'])->name('country');

Route::get('/addcountry', [CountryController::class, 'addcountry'])->middleware(['auth'])->name('addcountry');

Route::post('/createcountry', [CountryController::class, 'createcountry'])->middleware(['auth'])->name('createcountry');

Route::get('/country/delete/{id}', [CountryController::class, 'deletecountry'])->middleware(['auth'])->name('country.delete');

Route::get('/country/edit/{id}', [CountryController::class, 'editcountry'])->middleware(['auth'])->name('country.edit');

Route::get('/country/update/{id}', [CountryController::class, 'updatecountry'])->middleware(['auth'])->name('country.update');

Route::put('/country/update/{id}', [CountryController::class, 'updatecountry'])->middleware(['auth'])->name('country.update');



Route::get('logActivity', 'HomeController@logActivity');

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('admin-view', 'HomeController@adminView')->name('admin.view');
});

Route::middleware(['role:1'])->group(function () {
    //write route hear
  });

require __DIR__.'/auth.php';
