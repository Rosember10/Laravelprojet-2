<?php

use App\Http\Controllers\EtudientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RepertoireController;
use App\Http\Controllers\LocalizationController;


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
    return view('welcome');
});
//etudient
Route::get('etudient',                    [EtudientController::class, 'index' ])   ->name('etudient.index');
Route::get('etudient/{etudient}',         [EtudientController::class, 'show'  ])   ->name('etudient.show');
Route::get('etudient-create',             [EtudientController::class, 'create'])   ->name('etudient.create');
Route::post('etudient-create',            [EtudientController::class, 'store']);
Route::get('etudient-edit/{etudient}',    [EtudientController::class, 'edit'])     ->name('etudient.edit');
Route::put('etudient-edit/{etudient}',    [EtudientController::class, 'update']);
Route::delete('etudient/{etudient}',      [EtudientController::class, 'destroy']);

// authentication 
Route::get('registration', [CustomAuthController::class,'create'])         -> name('user.create');
Route::post('registration',[CustomAuthController::class,'store'])          -> name('user.store');
Route::get('login',        [CustomAuthController::class,'index'])          -> name('login');
Route::post('login',       [CustomAuthController::class,'authentication']) -> name('user.auth');
Route::get('logout',       [CustomAuthController::class,'logout'])         -> name('logout');

//Dashboard
Route::get('dashboard',    [CustomAuthController::class,'dashboard'])  ->name('dashboard');

//article
Route::get('articles',               [ArticleController::class,'index'])->name('article.index');
Route::get('articles-create',        [ArticleController::class,'create'])->name('article.create')->middleware('auth');
Route::post('articles-create',       [ArticleController::class,'store'])->name('article.store')->middleware('auth');
Route::get('articles-show',          [ArticleController::class,'showArticles'])->name('articles.show')->middleware('auth');
Route::get('article/{article}',      [ArticleController::class,'show'])->name('unArticle.show')->middleware('auth');
Route::delete('article/{article}',   [ArticleController::class,'destroy']);
Route::get('article-edit/{article}', [ArticleController::class,'edit'])->name('unArticle.edit')->middleware('auth');
Route::put('article-edit/{article}', [ArticleController::class,'update']);

//Répertoire
Route::get('repertoires',                              [RepertoireController::class,'index'])          ->name('repertoires.index');
Route::get('repertoires-create',                       [RepertoireController::class,'create'])         ->name('repertoires.create')->middleware('auth');
Route::post('repertoires-create',                      [RepertoireController::class,'store']);
Route::get('repertoires-edit/{repertoire}',            [RepertoireController::class,'edit'])           ->name('repertoire.edit')->middleware('auth');
Route::put('repertoires-edit/{repertoire}',            [RepertoireController::class,'update']);
Route::get('repertoires-show',                         [RepertoireController::class,'showRepertoires'])->name('repertoires.show')->middleware('auth');
Route::get('repertoire-download/{repertoire}',         [RepertoireController::class,'download'])       ->name('repertoire.download')->middleware('auth');
Route::get('repertoire-delete/{path}/{repertoire}',    [RepertoireController::class,'delete'])         ->name('repertoire.delete')->middleware('auth');
Route::delete('repertoire-delete/{path}/{repertoire}', [RepertoireController::class,'delete'])         ->name('repertoire.delete')->middleware('auth');

//Localization
Route::get('/lang/{locale}', [LocalizationController::class, 'index']) ->name('lang'); 


