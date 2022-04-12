<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingUnitResultController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\PollingUnitResultController@index');
Route::post('/filter_by_polling_unit','App\Http\Controllers\PollingUnitResultController@show');

Route::get('/add','App\Http\Controllers\PollingUnitResultController@create');
Route::POST('/create','App\Http\Controllers\PollingUnitResultController@store');

Route::post('/view-result-by-lga','App\Http\Controllers\PollingUnitResultController@viewResultByLga');



