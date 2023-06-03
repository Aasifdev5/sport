<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamManagementController;
use App\Http\Controllers\PlayerManagementController;
use App\Http\Controllers\MatchesManagementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

/* Frontend Routes */
Route::get('/',[HomeController::class,"index"])->name('index');


/* Login Routes */

Route::get('/login',[LoginController::class,"index"])->name('login');
Route::post('/validate_login',[LoginController::class,"validate_login"])->name('validate_login');


/* Middleware Start */
Route::get('/status_update/{id}', [HomeController::class,"status_update"]);
Route::post('/updatePlayer', [PlayerManagementController::class,'updatePlayer']);


Route::middleware([auth::class])->group(function(){
Route::get('/dashboard',[LoginController::class,"dashboard"])->name('dashboard');
Route::get('/logout',[LoginController::class,"logout"])->name('logout');



/* TeamManagement Routes */

Route::get('/addteam',[TeamManagementController::class,"index"])->name("index");
Route::post('/addteam',[TeamManagementController::class,"store"])->name("addTeam");
Route::get('/showteam',[TeamManagementController::class,"show"])->name("show");
Route::get('/editteam/{id}',[TeamManagementController::class,"edit"])->name('edit');
Route::post('/update/{id}', [TeamManagementController::class,"update"])->name('update');
Route::get('/delete/{id}', [TeamManagementController::class,"destroy"])->name('delete');

/* PlayerManagement Routes */

Route::get('/addplayer',[PlayerManagementController::class,"index"])->name("player.index");
Route::post('/addplayer',[PlayerManagementController::class,"store"])->name("player.addPlayer");
Route::get('/showplayer',[PlayerManagementController::class,"show"])->name("player.show");
Route::get('/editplayer/{id}',[PlayerManagementController::class,"edit"])->name('player.edit');
Route::get('/status-update/{id}', [PlayerManagementController::class,"status_update"]);
Route::post('/updateplayer/{id}', [PlayerManagementController::class,"update"])->name('player.update');
Route::get('/deleteplayer/{id}', [PlayerManagementController::class,"destroy"])->name('player.delete');

/* This Route is used to Edit FPTS and SAL Points from  Frontend template */




/* MatchesManagement Routes */

Route::get('/addmatches',[MatchesManagementController::class,"index"])->name("matches.index");
Route::post('/addmatches',[MatchesManagementController::class,"store"])->name("matches.addmatch");
Route::get('/showmatches',[MatchesManagementController::class,"show"])->name("matches.show");
Route::get('/editmatches/{id}',[MatchesManagementController::class,"edit"])->name('matches.edit');
Route::post('/updatmatches/{id}', [MatchesManagementController::class,"update"])->name('matches.update');
Route::get('/deletematches/{id}', [MatchesManagementController::class,"destroy"])->name('matches.delete');
Route::get('/prediction',[MatchesManagementController::class,"prediction"])->name("matches.prediction");
Route::get('/add_prediction/{id}',[MatchesManagementController::class,"add_prediction"])->name("matches.add_prediction");
Route::post('/add_teams',[MatchesManagementController::class,"add_teams"])->name("add_teams");
Route::get('/team_prediction/{id}',[MatchesManagementController::class,"team_prediction"])->name("team_prediction");
});










