<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;  
use App\Http\Controllers\MapDataController; 
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
Route::get('/', function () {
    return view('landingPage');
});
Route::get('/HandsOn1', [MapController::class, 'ShowMapsTugas1']); 
Route::get('/Latihan1', [MapController::class, 'ShowMapsLatihan1']); 
Route::get('/Latihan2', [MapDataController::class, 'showLatihan2']);

Route::get('/interactive', [MapDataController::class, 'index'])->name('map.index');
Route::get('/api/markers', [MapDataController::class, 'getMarkers']);
Route::get('/api/polygons', [MapDataController::class, 'getPolygons']);
Route::post('/api/markers', [MapDataController::class, 'storeMarker']);
Route::post('/api/polygons', [MapDataController::class, 'storePolygon']);

Route::delete('/api/markers/{id}', [MapDataController::class, 'deleteMarker']);
Route::delete('/api/polygons/{id}', [MapDataController::class, 'deletePolygon']);
Route::get('/api/markers/{id}', [MapDataController::class, 'viewMarker']);
Route::get('/api/polygons/{id}', [MapDataController::class, 'viewPolygon']);