<?php

use App\Http\Controllers\CongregationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('marriages', App\Http\Controllers\MarriageController::class);

    Route::resource('baptisms', App\Http\Controllers\BaptismController::class);

    Route::resource('serviceCategories', App\Http\Controllers\ServiceCategoryController::class);

    Route::resource('incomes', App\Http\Controllers\IncomeController::class);

    Route::resource('outcomes', App\Http\Controllers\OutcomeController::class);

    Route::resource('adultBaptisms', App\Http\Controllers\AdultBaptismController::class);

    Route::resource('congregations', App\Http\Controllers\CongregationController::class);

    Route::resource('congregations-death', App\Http\Controllers\CongregationDeathController::class);

    Route::resource('congregationDeaths', App\Http\Controllers\CongregationDeathController::class);

    Route::resource('congregationOuts', App\Http\Controllers\CongregationOutController::class);

    Route::put('congregation-death-status/{id}', [App\Http\Controllers\CongregationDeathController::class, 'death'])->name('congregation-death-status');

    Route::put('congregation-out-status/{id}', [App\Http\Controllers\CongregationOutController::class, 'out'])->name('congregation-out-status');
});

Route::prefix('api')->group(function () {
    Route::get('report', [IncomeController::class, 'getIncomeMonthlyReport']);
    Route::get('outcome', [OutcomeController::class, 'getOutcomeMonthlyReport']);
    Route::get('income-outcome', [HomeController::class, 'getIncomeOutcome']);
    Route::get('total-enter-out', [CongregationController::class, 'getTotalEnterOutCongregation']);
});
