<?php

    use App\Http\Controllers\PageController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::get('/', [PageController::class, 'show']);
Route::post('/addAlbum', [PageController::class, 'addAlbum'])->name("addAlbum");
Route::post('/addGenres', [PageController::class, 'addGenres'])->name("addGenres");
Route::get('/deleteOfAlbum/{id}', [PageController::class, 'deleteOfAlbum'])->name("deleteOfAlbum");
