<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\MetricController;
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
Route::get('/', [MetricController::class, 'index'])->name('metrics.index');
Route::post('/fetch-metrics', [MetricController::class, 'fetchMetrics'])->name('metrics.fetch');
Route::post('/metrics/save', [MetricController::class, 'saveMetrics'])->name('metrics.save');
Route::get('/historyMetrics', [MetricController::class, 'history'])->name('metric.history');



