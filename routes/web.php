<?php
namespace App\Http\Controllers;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('products');
})->middleware(['auth', 'verified'])->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/products', 'ProductController@index')->name('products');

// Route::get('products',[ProductController::class,'index']);
Route::resource('products', ProductController::class);

// rout pour crud client
Route::resource('clients',  ClientController::class);
























// Route::controller(ProductController::class)->group(function(){
    
// // Route pour afficher tous les éléments
// Route::get('/products', 'ProductController@index');

// // Route pour afficher un élément spécifique
// Route::get('/products/{id}', 'ProductController@show');

// // Route pour afficher le formulaire de création d'un nouvel élément
// Route::get('/products/create', 'ProductController@create');

// // Route pour traiter la création d'un nouvel élément
// Route::post('/products', 'ProductController@store');

// // Route pour afficher le formulaire de modification d'un élément
// Route::get('/products/{id}/edit', 'ProductController@edit');

// // Route pour mettre à jour un élément existant
// Route::put('/products/{id}', 'ProductController@update');

// // Route pour supprimer un élément
// Route::delete('/products/{id}', 'ProductController@destroy');
// });