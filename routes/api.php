<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/fig04', function () {
    $data4 = [
        ['name' => 'John', 'data' => [5, 3, 4, 7, 2]], 
        ['name' => 'Jane', 'data' => [2, 2, 3, 2, 1]], 
        ['name' => 'Joe', 'data' => [3, 4, 4, 2, 5]]];  

    $series4 = [
        'title' => 'Stacked column chart',
        'subtitle' => '',
        'y_axis' => 'Total fruit consumption',
        'categories' => ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas'],
        'data' => $data4, 
    ];

    return $series4;
});
