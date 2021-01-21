<?php
use App\Http\Controllers\Api\CobaController;
use App\Http\Controllers\Api\GroupsController;
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
route::get('', [CobaController::class, 'index']);
route::resources([
    'friends' =>CobaController::class,
    'groups' =>groupscontroller::class,
    'groups' =>GroupsController::class,
]);