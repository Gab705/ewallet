<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupeController;
use App\Models\Groupe;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('inscription');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [WalletController::class, 'index'])->name('index')->middleware('auth');
Route::get('/entree', [WalletController::class, 'showAddEntryForm'])->name('entree')->middleware('auth');
Route::post('/entree', [WalletController::class, 'addEntry']);
Route::get('/sortie', [WalletController::class, 'showAddExpenseForm'])->name('sortie')->middleware('auth');
Route::post('/sortie', [WalletController::class, 'addExpense']);
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
Route::get('/respoerreur', [WalletController::class, 'showerror'])->name('respoerreur');
Route::delete('/reset-transactions', [WalletController::class, 'resetTranslation'])->name('reset.transactions');
Route::delete('/delete/{id}', [WalletController::class, 'delete'])->name('delete');
Route::get('/plafond', [WalletController::class, 'afficherPlafond'])->name('afficherPlafond');
Route::post('/modifierPlafond', [WalletController::class, 'modifierPlafond'])->name('modifierPlafond');
Route::get('/errorplafond', [WalletController::class, 'errorplafond'])->name('errorplafond');
Route::get('/edit/{id}', [WalletController::class, 'showedit'])->name('showedit');
Route::post('/maj/{id}', [WalletController::class, 'editentree'])->name('editentree');
Route::get('/editsortie/{id}', [WalletController::class, 'showsortie'])->name('showsortie');
Route::post('/majsortie/{id}', [WalletController::class, 'majsortie'])->name('majsortie');
Route::get('/Form-groupe', [WalletController::class, 'showformgroupe'])->name('showformgroupe');
Route::post('/inscrigroupe', [GroupeController::class, 'creerGroupe'])->name('creerGroupe');
Route::get('/conectform', [GroupeController::class, 'connectGrou'])->name('connectGrou');
Route::post('/connextionGroupe', [GroupeController::class, 'connexionGroupe'])->name('connexionGroupe');
Route::get('/groupeindex', [GroupeController::class, 'showgroupeindex'])->name('showgroupeindex');
Route::get('/entreegroupe', [GroupeController::class, 'showentreegroupe'])->name('showentreegroupe');
Route::post('/storeentreegroupe', [GroupeController::class, 'storeentreegroupe'])->name('storeentreegroupe');
Route::delete('/deleteTransaction/{id}', [GroupeController::class, 'deleteTransaction'])->name('deleteTransaction');
Route::get('/showmajentreegroupe/{id}', [GroupeController::class, 'majentreegroupe'])->name('majentreegroupe');
Route::post('/updateentreegroupe/{id}', [GroupeController::class, 'majeentreegroupe'])->name('majeentreegroupe');
Route::get('/Profil-Groupe', [GroupeController::class, 'showprofilegroupe'])->name('showprofilegroupe');
Route::delete('/reset', [GroupeController::class, 'resetTransactiongroupe'])->name('resetTransactiongroupe');