<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
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

Route::get('/sell', function () {
    return view('sell');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/rent', function () {
    return view('rent');
});
Route::get('/', [PropertyController::class, 'showUserProperties'])->name('buy');
Route::get('/buy', [PropertyController::class, 'showUserProperties'])->name('buy');
Route::get('/home', [PropertyController::class, 'showUserPropertiesHome'])->name('home');
Route::get('/user/{id}', [UserController::class, 'showUserAccount'])->name('user.account');
Route::put('/user/{id}', [UserController::class, 'updateUserAccount'])->name('user.updateaccount');




Route::get('/signinsignup', [UserController::class, 'showSigninSignup'])->name('signup');
Route::post('/signinsignup', [UserController::class, 'login'])->name('login');
Route::post('/signinsignup/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

// ---------------ADMIN-----------------//
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::post('/admin/addproperty', [PropertyController::class, 'addproperty'])->name('addproperty');
    Route::post('/admin/addpropertylot', [PropertyController::class, 'addpropertylot'])->name('addpropertylot');
    Route::get('/admin', [PropertyController::class, 'showProperties']);
    Route::get('/admin/hl/{id}', [PropertyController::class, 'showPropertyInfo']);
    Route::put('/admin/hl/{id}', [PropertyController::class, 'updateProperty'])->name('admin.updateProperty');
    Route::delete('/admin/hl/{propertyId}/image/{imageId}', [PropertyController::class, 'deletePropertyImage'])
        ->name('admin.deletePropertyImage');
    Route::post('/admin/hl/{id}/add-image', [PropertyController::class, 'addPropertyImage'])->name('admin.addPropertyImage'); // routes/web.php
    Route::delete('/admin/deleteProperty/{id}', [PropertyController::class, 'deleteProperty'])->name('admin.deleteProperty');
    Route::delete('/admin/deletePropertyCondo/{id}', [PropertyController::class, 'deletePropertyCondo'])->name('admin.deletePropertyCondo');
    Route::delete('/admin/deletePropertyLot/{id}', [PropertyController::class, 'deletePropertyLot'])->name('admin.deletePropertyLot');
    Route::post('/admin/addpropertycondo', [PropertyController::class, 'addpropertycondo'])->name('addpropertycondo');
    Route::get('/admin/condo/{id}', [PropertyController::class, 'showPropertyInfoCondo']);
    Route::put('/admin/condo/{id}', [PropertyController::class, 'updatePropertyCondo'])->name('admin.updatePropertyCondo');
    Route::delete('/admin/condo/{propertyId}/image/{imageId}', [PropertyController::class, 'deletePropertyImageCondo'])
        ->name('admin.deletePropertyImageCondo');
    Route::post('/admin/condo/{id}/add-image', [PropertyController::class, 'addPropertyImageCondo'])->name('admin.addPropertyImageCondo');
    Route::post('/admin/addpropertylot', [PropertyController::class, 'addpropertylot'])->name('addpropertylot');
    Route::get('/admin/lot/{id}', [PropertyController::class, 'showPropertyInfoLot']);
    Route::put('/admin/lot/{id}', [PropertyController::class, 'updatePropertyLot'])->name('admin.updatePropertyLot');
    Route::delete('/admin/lot/{propertyId}/image/{imageId}', [PropertyController::class, 'deletePropertyImageLot'])
        ->name('admin.deletePropertyImageLot');
    Route::post('/admin/lot/{id}/add-image', [PropertyController::class, 'addPropertyImageLot'])->name('admin.addPropertyImageLot');
});

Route::group(['middleware' => ['auth', 'isUser']], function () {
    //House and Lot
    Route::post('/property/hl/{propertyId}/schedule-tour/{propertyImageId}', [PropertyController::class, 'scheduleTour'])->name('scheduled.tour');
    Route::get('/property/hl/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property.details');
    Route::get('/property/hl/{propertyId}/schedule-tour/{propertyImageId}/form', [PropertyController::class, 'showScheduleTourForm'])->name('scheduled.tour.form');

    //Condo
    Route::get('/property/condo/{id}', [PropertyController::class, 'showPropertyCondoDetails'])->name('propertycondo.details');
    Route::get('/property/condo/{propertyId}/schedule-tour/{propertyImageId}/form', [PropertyController::class, 'showScheduleCondoTourForm'])->name('scheduledcondo.tour.form');
    Route::post('/property/condo/{propertyId}/schedule-tour/{propertyImageId}', [PropertyController::class, 'scheduleCondoTour'])->name('scheduledcondo.tour');

    //Lot
    Route::get('/property/lot/{id}', [PropertyController::class, 'showPropertyLotDetails'])->name('propertylot.details');
    Route::get('/property/lot/{propertyId}/schedule-tour/{propertyImageId}/form', [PropertyController::class, 'showScheduleLotTourForm'])->name('scheduledlot.tour.form');
    Route::post('/property/lot/{propertyId}/schedule-tour/{propertyImageId}', [PropertyController::class, 'scheduleLotTour'])->name('scheduledlot.tour');
});
