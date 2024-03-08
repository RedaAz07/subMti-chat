<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\UtilisateurController;

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
/*
Route::get('/', function () {
    return view('welcome');
});





Route::match(['get', 'post'], '/user/profile', function () {

});


*/




Route::match(["get","post"],"login.login",[loginController::class,"login"])->name("login.login");



Route::match(["get","post"],"login",[loginController::class,"show"])->name("login");


Route::match(["get","post"],"etudient",[loginController::class,"etudient"])->name("etudient");






Route::match(["get","post"],"login.logout",[loginController::class,"logout"])->name("login.logout");



Route::resource('/message', MessageController::class)->middleware("auth");


Route::get('/messages', 'MessageController@fetch')->name('messages.fetch');


// export the data from  etudeient _data.jsone to Acc_etudient.jsno
//Route::get('/export-data-etud', [EtudientController::class, 'exportData'])->name('export.data');

// import  the data from  etudeient _data.jsone to tables utilisateur and etudeint
Route::get('/exportDataTOtableEtudient', [EtudientController::class, 'exportDataTOtableEtudient']);

// export   the data from  etudeient _data.jsone to tables utilisateur and formateur and Acc fornateur .json
Route::get('/exportDataformateur', [FormateurController::class, 'exportDataformateur']);
//the same things for the asmin
Route::get('/exportDataadmin', [AdminController::class, 'exportDataadmin']);


/*

Route::get('/export-data-formateur', [FormateurController::class, 'exportData'])->name('export.data');
// emport a new data

Route::get('/import-data-etud', [UtilisateurController::class, 'importData'])->name('import.data');


Route::get('/import-data-formateur', [UtilisateurController::class, 'importDataf'])->name('import.data');
*/


Route::get('/messages', [MessageController::class, 'fetch'])->name('messages.fetch');





Route::get('/messages', [MessageController::class, 'show_classe'])->name('show_classe');




Route::resource('/etudient', EtudientController::class);



Route::match(["get", "post"], "/message.groupe/{groupId}", [MessageController::class, "groupe"])->name("message.groupe");
