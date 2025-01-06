<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'index']);

//add
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

//edit
Route::get('/products/{id}/edit', [ProductController::class, 'edit']); // Menampilkan form edit
Route::put('/products/{id}', [ProductController::class, 'update']); // Menyimpan perubahan

Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Menghapus produk

