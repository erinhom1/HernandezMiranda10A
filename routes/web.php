<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlumnosController;
use App\Http\Controllers\Admin\GuardiasController;
use App\Http\Controllers\Admin\EstacionamientoController;
use App\Http\Controllers\Admin\AutomovilesController;
use App\Http\Controllers\Admin\StatsController;



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
    return view('Home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::redirect('/dashboard', '/dashboard/estacionamiento');

    Route::get('/dashboard/estacionamiento', function () {
        return view('estacionamiento.index');
    })->name('dashboard.estacionamiento');
    
    Route::get('/dashboard/users', function () {
        return view('users.index');
    })->name('Alumnos');

    Route::get('/dashboard/create', function () {
        return view('users.create');
    })->name('registrar');

    Route::get('/dashboard/guardias', function () {
        return view('guardias.index');
    })->name('index');


    Route::post('/dashboard/estacionamiento/{NumEstacionamientoMenos}', 'App\Http\Controllers\Admin\EstacionamientoController@restar')->name('estacionamiento.restar');

    Route::resource('/dashboard/users',AlumnosController::class)->names('users');
    Route::resource('/dashboard/guardias',GuardiasController::class)->names('guardias');
    Route::resource('/dashboard/estacionamiento',EstacionamientoController::class)->names('estacionamiento');
    Route::resource('/dashboard/automoviles',AutomovilesController::class)->names('automoviles');
    Route::resource('/dashboard/stats',StatsController::class)->names('stats');     
    Route::get('/dashboard/stats/data', 'App\Http\Controllers\Admin\StatsController@getData')->name('stats.data');

});



