<?php

use App\Http\Controllers\Api\ClashRoyale\Playercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/player', [Playercontroller::class, 'getPlayer']);
Route::get('/chest-cycle', [Playercontroller::class, 'getChestCycle']);
Route::get('/battlezlog', [Playercontroller::class, 'getBattleLog']);
