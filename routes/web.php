<?php

use App\Http\Controllers\AdvisorsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Middleware\Admin\CustomAuth;
use Illuminate\Http\Request;
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
Route::get('test',function(Request $request){
    $request->session()->flush();
    return "Session flushed";
})->name('test');

Route::prefix('ajax')->group(function () {
    Route::post('login',[LoginController::class,'ajaxLogin'])->name('ajax.login');
});
Route::get('/',function(){
    return redirect(route('login'));
});

Route::get('login', function () {return view('login');})->name('login');
Route::middleware([CustomAuth::class])->group(function () {
    Route::get('home',[HomeController::class,'home'])->name('home');
    Route::get('sales/advisors',[SalesController::class,'advisors'])->name('sales.advisors');
    Route::get('sales/advisor/{advisorID}',[SalesController::class,'advisorSales'])->name('sales.advisor');
    Route::get('sales/advisors/without-cfdi',[SalesController::class,'withoutCFDI'])->name('without-cfdi');
    Route::get('sales/advisors/with-cfdi',[SalesController::class,'withCFDI'])->name('with-cfdi');
    Route::get('sales/advisors/payed',[SalesController::class,'payed'])->name('advisors-payed');
    Route::get('sales/advisor/receipt/{receiptID}',[SalesController::class,'advisorReceipt'])->name('advisor-receipt');
    Route::get('sales/clients',[SalesController::class,'clients'])->name('sales.clients');
    Route::get('sales/client/{clientID}',[SalesController::class,'client'])->name('sales.client');
    Route::get('sales/client/receipt/{receiptID}',[SalesController::class,'clientReceipt'])->name('sales.client.receipt');
    Route::get('customers/users',[CustomersController::class,'users'])->name('customers.users');
    Route::get('advisors/users/no-visible',[AdvisorsController::class,'noVisible'])->name('advisors.no_visible');
    Route::get('advisors/users/pending-visible',[AdvisorsController::class,'pendingVisible'])->name('advisors.pending_visible');
    Route::get('advisors/users/profile/{advisorID}',[AdvisorsController::class,'profile'])->name('advisors.profile');
    Route::get('advisors/users/verify/stage-1/{advisorID}',[AdvisorsController::class,'stage1'])->name('advisors.stage1');
    Route::post('advisors/verify/stage-1/positive',[AdvisorsController::class,'stage1Positive'])->name('advisors.stage1.positive');
    Route::post('advisors/verify/stage/stillPending',[AdvisorsController::class,'stageStillPending'])->name('advisors.stage.stillPending');
    Route::post('advisors/verify/stage/disable',[AdvisorsController::class,'stageDisable'])->name('advisors.stage.disable');
    Route::get('advisors/users/verify/stage-2/{advisorID}',[AdvisorsController::class,'stage2'])->name('advisors.stage2');
    Route::post('advisors/verify/stage-2/positive',[AdvisorsController::class,'stage2Positive'])->name('advisors.stage2.positive');
    Route::get('advisors/users/visible',[AdvisorsController::class,'visible'])->name('advisors.visible');
    Route::get('advisors/users/disabled',[AdvisorsController::class,'disabled'])->name('advisors.disabled');
});


Route::get('register', function () {
    return view('register');
});
// Route::get('sales/advisors', function () {
//     return view('sales.advisors');
// });
// Route::get('sales/advisor/{id}', function ($id=null) {
//     return view('sales.advisor');
// });
// Route::get('sales/advisors/without-cfdi', function ($id=null) {
//     return view('sales.advisor_without_cfdi');
// })->name('without-cfdi');
// Route::get('sales/advisors/with-cfdi', function ($id=null) {
//     return view('sales.advisor_with_cfdi');
// })->name('with-cfdi');
// Route::get('sales/advisors/payed', function ($id=null) {
//     return view('sales.advisor_payed');
// })->name('advisors-payed');

// Route::get('sales/advisor/receipt/{id}', function ($id=null) {
//     return view('sales.advisor_receipt');
// });
// Route::get('sales/clients', function () {
//     return view('sales.clients');
// });
// Route::get('sales/client/{id}', function ($id=null) {
//     return view('sales.client');
// });
// Route::get('sales/client/receipt/{id}', function ($id=null) {
//     return view('sales.client_receipt');
// });
// Route::get('customers/users', function ($id=null) {
//     return view('customers.users');
// });
// Route::get('advisors/users/no-visible', function ($id=null) {
//     return view('advisors.users_no_visible');
// });
// Route::get('advisors/users/profile/{id}', function ($id=null) {
//     return view('advisors.profile');
// });
Route::get('customers/reports', function ($id=null) {
    //return view('customers.reports');
    return "REPORTS SECTION";
});
// Route::get('advisors/users/visible', function ($id=null) {
//     return view('advisors.users_visible');
// });

// Route::get('advisors/users/pending-visible', function ($id=null) {
//     return view('advisors.users_pending_visible');
// });
// Route::get('advisors/users/disabled', function ($id=null) {
//     return view('advisors.users_disabled');
// });

Route::get('advisors/reports', function ($id=null) {
    //return view('customers.reports');
    return "REPORTS SECTION";
});
// Route::get('advisors/users/verify/stage-1/{id}', function ($id=null) {
//     return view('advisors.verify1');
// });
// Route::get('advisors/users/verify/stage-2/{id}', function ($id=null) {
//     return view('advisors.verify2');
// });
// Route::get('advisors/users/certify/{id}', function ($id=null) {
//     return view('advisors.certify');
// });
Route::get('advisors/reviews/{id}', function ($id=null) {
    return view('advisors.reviews');
});
Route::get('categories', function () {
    return view('categories.index');
});
Route::get('categories/list/{id}', function ($id=null) {
    return view('categories.list');
});
Route::get('categories/expertise/{id}', function ($id=null) {
    return view('categories.expertise');
});

Route::get('advisors', function () {
    return view('advisors');
});
Route::get('pre-registro/login', 'Pre_registroController@login');
Route::get('pre-registro/consultores', 'Pre_registroController@advisors');
Route::get('pre-registro/usuarios', 'Pre_registroController@users');
Route::get('pre-registro/consultores/CSV', 'Pre_registroController@advisorsCSV');
Route::get('pre-registro/usuarios/CSV', 'Pre_registroController@usersCSV');
