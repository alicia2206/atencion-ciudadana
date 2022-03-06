<?php

use App\Http\Controllers\AplicationController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

//  Route::get('/', function () {
//      return redirect()->route('aplications.create');
//  });

  Route::get('/', function () {
      return view('welcome');
  });

Route::resource('aplications', AplicationController::class);
Route::match(['get', 'post'], '/resumen', [AplicationController::class, 'resumen'])->name('aplications.resumen');
Route::post('/upload', [AplicationController::class, 'upload'])->name('aplications.upload');
Route::post('/generatepdf', [AplicationController::class, 'generatePdf'])->name('aplications.generatepdf');
Route::post('/getpdf', [AplicationController::class, 'getpdf'])->name('aplications.getpdf');
Route::match(['get', 'post'], '/tracking', [AplicationController::class, 'tracking'])->name('aplications.tracking');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'areas' => AreaController::class,
        'positions' => PositionController::class,
        'notifications' => NotificationController::class,
    ]);

    Route::get('getareas', [AreaController::class, 'getAreas'])->name('getAreas');
    Route::post('sendnotification', [NotificationController::class, 'sendNotification'])->name('sendNotification');
    Route::get('notificationcargo/{notification}', [NotificationController::class, 'notificationcargo'])->name('notificationcargo');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/changePassword', 'showChangePasswordGet')->name('changePasswordForm');
        Route::post('/changePassword', 'changePasswordPost')->name('changePasswordSave');
    });

});
