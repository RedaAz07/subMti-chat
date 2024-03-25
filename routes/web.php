<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEtudMessagesController;
use App\Http\Controllers\AdminProfMessagesController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\messageClasseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageformateurController;
use App\Http\Controllers\UtilisateurController;
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
/*
Route::get('/', function () {
    return view('welcome');
});





Route::match(['get', 'post'], '/user/profile', function () {

});


*/

Route::match(['get', 'post'], 'login.login', [loginController::class, 'login'])->name('login.login');

Route::match(['get', 'post'], 'login', [loginController::class, 'show'])->name('login');

Route::match(['get', 'post'], 'etudient', [loginController::class, 'etudient'])->name('etudient');

Route::match(['get', 'post'], 'login.logout', [loginController::class, 'logout'])->name('login.logout');

Route::resource('/message', MessageController::class)->middleware('auth');

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

// message entre formateur et etudient
Route::get('/messageformateur/show_form/{id_for}', [MessageformateurController::class, 'show_form'])->name('messageformateur.show_form');

Route::match(['get', 'post'], '/messageformateur', [MessageformateurController::class, 'store'])->name('messageformateur.store');

// message admin et etudients

Route::get('/adminEtudMessages/showEtuds/{id_etud}', [AdminEtudMessagesController::class, 'showEtuds'])
    ->name('adminEtudMessages.showEtuds');

Route::match(['get', 'post'], '/adminEtudMessages', [AdminEtudMessagesController::class, 'store'])->name('adminEtudMessages.store');

// message admin formateur

Route::get('/adminProfMessages/index/{id_form}', [AdminProfMessagesController::class, 'index'])
    ->name('adminProfMessages.index');

Route::match(['get', 'post'], '/adminProfMessages', [AdminProfMessagesController::class, 'store'])->name('adminProfMessages.store');

/////////////////////////////////////////////////////////////////
Route::resource('/messageformateur', MessageformateurController::class);
Route::resource('/actualites', ActualiteController::class);

Route::resource('/etudient', EtudientController::class);

//***********************criee une actualite**************************

Route::resource('/messageClasse', messageClasseController::class);

Route::match(['get', 'post'], '/messageClasse.groupe/{groupId}', [messageClasseController::class, 'groupe'])->name('messageClasse.groupe');
