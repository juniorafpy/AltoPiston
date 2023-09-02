<?php

use App\Http\Controllers\CategoriaController;
use App\Models\Event;
use App\Models\Categoria;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/new', function () {
    return 'new dashboard';
});

Route::get('/events', function () {
        return view( 'events');
    });

Route::resource('/categoria',CategoriaController::class);
    
Route::get('/events/create', function () {

//trae datos de la base de datos
$event = Event::all();

//asigna la cabecera

$head = [
    'ID',
    'Nombre',
     'Descripcion',
     'Estado',
     'Tipo',
     'Fecha'
];

    return view( 'events-create',compact('event','head'));
});

