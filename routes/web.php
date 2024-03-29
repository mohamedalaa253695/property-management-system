<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ComplexController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\PropertyStatusController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get(('/'), function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('properties')->group(function () {
        Route::get('/', [PropertyController::class, 'index'])->name('properties');
        Route::get('/create', [PropertyController::class, 'create'])->name('property.create');
        Route::get('/search', [PropertyController::class, 'search'])->name('property.search');
        Route::post('/store', [PropertyController::class, 'store'])->name('property.store');
        Route::get('/{property}', [PropertyController::class, 'show'])->name('property.show');
        Route::get('/{property}/edit', [PropertyController::class, 'edit'])->name('property.edit');
        Route::patch('/{property}', [PropertyController::class, 'update'])->name('property.update');
        Route::delete('/{property}', [PropertyController::class, 'destroy'])->name('property.destroy');
        Route::delete('/', [PropertyController::class, 'bulkDelete'])->name('property.bulkDelete');
    });
    Route::prefix('cities')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('cities');
        Route::get('/create', [CityController::class, 'create'])->name('city.create');
        Route::post('/', [CityController::class, 'store'])->name('city.store');
        Route::get('/{city}', [CityController::class, 'show'])->name('city.show');
        Route::get('/{city}/edit', [CityController::class, 'edit'])->name('city.edit');
        Route::post('/{city}', [CityController::class, 'update'])->name('city.update');
        Route::delete('/{city}', [CityController::class, 'destroy'])->name('city.destroy');
    });

    Route::prefix('governorates')->group(function () {
        Route::get('/', [GovernorateController::class, 'index'])->name('governorates');
        Route::get('/create', [GovernorateController::class, 'create'])->name('governorate.create');
        Route::post('/', [GovernorateController::class, 'store'])->name('governorate.store');
        Route::get('/{governorate}', [GovernorateController::class, 'show'])->name('governorate.show');
        Route::get('/{governorate}/edit', [GovernorateController::class, 'edit'])->name('governorate.edit');
        Route::patch('/{governorate}', [GovernorateController::class, 'update'])->name('governorate.update');
        Route::delete('/{governorate}', [GovernorateController::class, 'destroy'])->name('governorate.destroy');
    });

    Route::resource('buildings', BuildingController::class);
    // Route::resource('cities', CityController::class);

    Route::prefix('complexes')->group(function () {
        Route::get('/', [ComplexController::class, 'index'])->name('complexes');
        Route::get('/create', [ComplexController::class, 'create'])->name('complex.create');
        Route::post('/', [ComplexController::class, 'store'])->name('complex.store');
        Route::get('/{complex}', [ComplexController::class, 'show'])->name('complex.show');
        Route::get('/{complex}/edit', [ComplexController::class, 'edit'])->name('complex.edit');
        Route::patch('/{complex}', [ComplexController::class, 'update'])->name('complex.update');
        Route::delete('/{complex}', [ComplexController::class, 'destroy'])->name('complex.destroy');
    });

    Route::prefix('countries')->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('countries');
        Route::get('/create', [CountryController::class, 'create'])->name('country.create');
        Route::post('/store', [CountryController::class, 'store'])->name('country.store');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::post('/update/{id}', [CountryController::class, 'update'])->name('country.update');
        Route::delete('/destroy/{id}', [CountryController::class, 'destroy'])->name('country.destroy');
    });

    Route::prefix('statuses')->group(function () {
        Route::get('/', [PropertyStatusController::class, 'index'])->name('statuses');
        Route::get('/json', [PropertyStatusController::class, 'getStatusesAsJson'])->name('getStatusesAsJson');
        Route::get('/create', [PropertyStatusController::class, 'create'])->name('status.create');
        Route::post('/', [PropertyStatusController::class, 'store'])->name('status.store');
        // Route::get('/{status}', [PropertyStatusController::class, 'show'])->name('status.show');
        Route::get('/{status}/edit', [PropertyStatusController::class, 'edit'])->name('status.edit');
        Route::patch('/{status}', [PropertyStatusController::class, 'update'])->name('status.update');
        Route::delete('/{status}', [PropertyStatusController::class, 'destroy'])->name('status.destroy');
        Route::delete('/', [PropertyStatusController::class, 'bulkDelete'])->name('status.bulkDelete');
    });
    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices');
        Route::get('/create', [InvoiceController::class, 'create'])->name('invoice.create');
        Route::post('/', [InvoiceController::class, 'store'])->name('invoice.store');
        Route::get('/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
        Route::patch('/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
        Route::delete('/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
        Route::get('/{invoice}/export', [InvoiceController::class, 'export'])->name('invoice.export');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports');
        Route::post('/search', [ReportController::class, 'search'])->name('reports.search');
        Route::post('/exportPDF', [ReportController::class, 'exportPDF'])->name('reports.exportPDF');
    });
});
