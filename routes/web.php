<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
// rotta che gestice la homepage visibile agli utenti
Route::get('/', 'HomeController@index')->name('index');

// serie di rotte che gestiscono tutto il meccanismo di autenticazione
Auth::routes();
// Serie di rotte che gestiscono il backoffice
// tutto quello che sta qui dentro è collegato ad una sezione autenticata
// QUESTA forma una rotta composta: (admin.index);
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
    ->group(function(){
        // pagina di atterraggio dopo il login(con il prefix, l'url è /admin)
        Route::get('/', 'HomeController@index')->name('index');
    });
