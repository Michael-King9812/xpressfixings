<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\SendPosition;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/view/{orderdetails:remember_token}', function (Request $request) {
    $lat = $request->input(key:'lat');
    $long = $request->input(key:'long');

    $location = ["lat" => $lat, "long" => $long];

    event(new SendPosition($location));
    return response()->json(['status' => 'success', 'data' => $location]);
});
 