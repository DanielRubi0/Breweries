<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreweryController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
// |
*/

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/about', function (){
    return view("about");
})->name('about');

Route::get('/main', function (){
    return view("home");
})->name('home');

Route::get('/contacto', function (){
    $nombre = 'Daniel';
    $apellido = 'Rubio';
    $tel = '987 654 321';
    $email = 'correofalso@gmail.com';

    return view("contact", ['nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $tel, 'email' => $email]);
})->name('contact');



Route::post('/contact', [ContactController::class, 'store']);

Route::get ('/cerveceria', [BreweryController::class, 'index'])->name ('breweries.index');

Route::get('/brewery/{brewery}', [BreweryController::class, 'show'])->name ('brewery.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get ('/breweries/create', [BreweryController::class, 'create'])->name ('brewery.create');
    Route::post ('/brewery', [BreweryController::class, 'store'])->name ('brewery.store');

    Route::get ('/brewery/{brewery}/edit', [BreweryController::class, 'edit'])->name ('brewery.edit');
    Route::put ('/brewery/{brewery}', [BreweryController::class, 'update'])->name ('brewery.update');

    Route::delete ('/brewery/{brewery}', [BreweryController::class, 'destroy'])->name ('brewery.destroy');
});

Route::get('/cerveceria/{name}', [BreweryController::class, 'friendly'])->name('breweries.friendly');

Route::resource('/beers', BeerController::class)->parameters(['beer']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
