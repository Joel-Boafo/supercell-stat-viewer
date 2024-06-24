<?php

use App\Http\Controllers\Api\ClashRoyale\Playercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Playercontroller::class, 'getBattleLog']);
