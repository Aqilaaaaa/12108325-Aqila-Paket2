<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
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


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

});

Route::middleware(['auth'])->group(function (){
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/produk', [ProdukController::class, 'getAllProduk']);
    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::get('/detail', [PenjualanController::class, 'getAllPenjualanDetail']);
    Route::get('/penjualan/{id}/download-pdf', [PenjualanController::class, 'downloadPDF']);

    
    Route::get('/penjualan_excel', [PenjualanController::class,'penjualan_excel'])->name('penjualan.excel');

    
    Route::middleware(['isAdmin'])->group(function (){
        Route::get('/addProduk', [ProdukController::class, 'addIndex']);
        Route::post('/addProduk', [ProdukController::class, 'store'])->name('produk.store');
        Route::patch('/update/{id}', [ProdukController::class, 'update'])->name('updateProduk');
        Route::get('/stok/{id}', [ProdukController::class, 'stokIndex'])->name('stokIndex');
        Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('editIndex');
        Route::put('/updateStok/{id}', [ProdukController::class, 'updateStok'])->name('updateStok');
        Route::delete('/delete/{id}', [ProdukController::class, 'delete']);
        Route::get('/user', [AuthController::class, 'getAllUser']);
        Route::get('/createUser', [AuthController::class, 'createUserIndex']);
        Route::post('/createUser', [AuthController::class, 'createUser'])->name('user.store');
        Route::get('/editUser/{id}', [AuthController::class, 'updateIndex'])->name('editUser');
        Route::patch('/updateUser/{id}', [AuthController::class, 'update'])->name('edit.store');
        Route::delete('/deleteUser/{id}', [AuthController::class, 'delete']);
        Route::get('/lihatDetail/{id}', [PenjualanController::class, 'detail']);
        Route::get('/penjualan_excel', [PenjualanController::class,'penjualan_excel'])->name('penjualan.excel');

    });
    
    Route::middleware(['isKasir'])->group(function (){
        Route::post('/penjualan', [PenjualanController::class, 'createPenjualan'])->name('penjualan.store');
        Route::delete('/deleteDetail/{id}', [PenjualanController::class, 'delete']);
        Route::get('/prodduk', [ProdukController::class, 'produkKasir']);
        Route::get('/detailPrint', [PenjualanController::class, 'detailPrint']);
        Route::get('/pelanggan', [PelangganController::class, 'indexPelanggan']);
        Route::post('/pelanggan', [PelangganController::class, 'createPelanggan'])->name('pelanggan');
        Route::get('/penjualan_excel', [PenjualanController::class,'penjualan_excel'])->name('penjualan.excel');

    });
});


