<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FournisseurController;
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

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Produit routes
Route::middleware('auth')->group(function () {
    Route::get('/Produit',[ProduitController::class,'index'])->name('Produit');

    Route::get('/Produit/Create',function(){
        return Inertia::render('Produit/Create');
    })->name('Produit.create');

    Route::post('/Produit/Create',[ProduitController::class,'create'])->name('creating');


    Route::get('/Produit/edit', [ProduitController::class,'edit'])->name('Produit.edit');
    Route::put('/Produit/edit', [ProduitController::class,'update'])->name('Produit.update');

    Route::delete('/Produit/delete/{id}',[ProduitController::class,'delete'])->name('Produit.delete');

});
//User Routes
Route::middleware('auth')->group(function () {
    Route::get('/Users',[UserController::class,'index'])->name('Users.index');
    Route::get('/User/Create',function(){
        return Inertia::render('User/Create');
    })->name('Users.craete');
    Route::get('User-Create',[UserController::class,'create'])->name('Users.create');
});

//Fournisseur

Route::middleware('auth')->group(function () {
    Route::get('/Fournisseurs',[FournisseurController::class,'index'])->name('Fournisseur.index');
    Route::get('/Fournisseur/Create',function(){
        return Inertia::render('Fournisseur/Create');
    })->name('Fournisseur.create.index');
    Route::post('Fournisseur-Create',[FournisseurController::class,'create'])->name('Fournisseur.create');
    Route::get('/Fournisseur/Edit',[FournisseurController::class,'edit'])->name('Fournisseur.edit');
    Route::put('/Fournisseur/update',[FournisseurController::class,'update'])->name('Fournisseur.update');
    Route::delete('/Fournisseur/delete/{id}',[FournisseurController::class,'delete'])->name('Fournisseur.delete');
});
require __DIR__.'/auth.php';
