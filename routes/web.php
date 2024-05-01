<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEtudMessagesController;
use App\Http\Controllers\AdminProfMessagesController;
use App\Http\Controllers\ClasseFormMessageController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\messageClasseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageformateurController;
use App\Http\Controllers\UtilisateurController;
use App\Models\actualite;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/messages', 'MessageController@fetch')->name('messages.fetch')->middleware('auth');

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

Route::get('/messages', [MessageController::class, 'show_classe'])->name('show_classe')->middleware('auth');

// message entre formateur et etudient

// -----> in the page etud
Route::get('/messageformateur/show_form/{id_for}', [MessageformateurController::class, 'show_form'])->name('messageformateur.show_form')->middleware('auth');

Route::match(['get', 'post'], '/messageformateur', [MessageformateurController::class, 'store'])->name('messageformateur.store')->middleware('auth');

// -----> in the page formateur

Route::get('/messageformateur/show_Etud/{id_for}', [MessageformateurController::class, 'show_Etud'])->name('messageformateur.show_Etud')->middleware('auth');

Route::match(['get', 'post'], '/messageformateur/storeEtud', [MessageformateurController::class, 'storeEtud'])->name('messageformateur.storeEtud')->middleware('auth');

// message admin et etudients
//----->  admin

Route::get('/adminEtudMessages/showEtuds/{id_etud}', [AdminEtudMessagesController::class, 'showEtuds'])
    ->name('adminEtudMessages.showEtuds')->middleware('auth');

Route::get('/adminEtudMessages/showLastAdminMessage/{id_etud}', [AdminEtudMessagesController::class, 'showLastAdminMessage'])
    ->name('adminEtudMessages.showLastAdminMessage')->middleware('auth');

Route::match(['get', 'post'], '/adminEtudMessages/admin', [AdminEtudMessagesController::class, 'store'])->name('adminEtudMessages/admin.store')->middleware('auth');

//----->  etudient

Route::get('/adminEtudMessages/showAdmins/{id_admin}', [AdminEtudMessagesController::class, 'showAdmins'])
    ->name('adminEtudMessages.showAdmins')->middleware('auth');

Route::match(['get', 'post'], '/adminEtudMessages', [AdminEtudMessagesController::class, 'storeAdmin'])->name('adminEtudMessages.storeAdmin')->middleware('auth');

// message admin formateur

//---> admin
Route::get('/adminProfMessages/index/{id_form}', [AdminProfMessagesController::class, 'index'])
    ->name('adminProfMessages.index')->middleware('auth');

Route::match(['get', 'post'], '/adminProfMessages', [AdminProfMessagesController::class, 'store'])->name('adminProfMessages.store')->middleware('auth');
//---> formateur

Route::get('/adminProfMessages/prof/{id_form}', [AdminProfMessagesController::class, 'showAdmin'])
    ->name('adminProfMessages.prof')->middleware('auth');

Route::match(['get', 'post'], '/adminProfMessages/prof', [AdminProfMessagesController::class, 'storeAdmin'])->name('adminProfMessages/prof.store')->middleware('auth');

/////////////////////////////////////////////////////////////////
Route::resource('/messageformateur', MessageformateurController::class)->middleware('auth');
Route::resource('/actualites', ActualiteController::class)->middleware('auth');

Route::resource('/actualites', ActualiteController::class)->middleware('auth');

Route::resource('/etudient', EtudientController::class)->middleware('auth');

//***********************criee une actualite**************************

//     message  etudient et votre classe

Route::match(['get', 'post'], '/messageClasse.index/{id_classe}', [messageClasseController::class, 'index'])->name('messageClasse.index')->middleware('auth');

Route::match(['get', 'post'], '/messageClasse.store', [messageClasseController::class, 'store'])->name('messageClasse.store')->middleware('auth');

//     message  formateur et votre classes
Route::match(['get', 'post'], '/classeFormMessage.index/{id_classe}', [ClasseFormMessageController::class, 'index'])->name('classeFormMessage.index')->middleware('auth');

Route::match(['get', 'post'], '/classeFormMessage.store', [ClasseFormMessageController::class, 'store'])->name('classeFormMessage.store')->middleware('auth');
//------   show etud

Route::match(['get', 'post'], '/classeFormMessage.indexEtud/{id_classe}', [ClasseFormMessageController::class, 'indexEtud'])->name('classeFormMessage.indexEtud')->middleware('auth');

// messages  file

Route::get('/download/{filename}', [MessageController::class, 'download'])->name('file.download');


Route::match(['get', 'post'], 'message.search/for', [loginController::class, 'searchFormateur'])->name('message.searchFormateur/for')->middleware('auth');
Route::match(['get', 'post'], 'message.search', [loginController::class, 'searchEtudient'])->name('message.searchEtudient')->middleware('auth');







Route::delete('/message/{message}', 'MessageController@destroy')->name('message.destroy')->middleware('auth');

Route::get('/Accueil', [loginController::class, 'Accueil'])->name('Accueil');
