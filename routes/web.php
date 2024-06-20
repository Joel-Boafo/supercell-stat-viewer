<?php

use App\Http\Controllers\ClashRoyaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClashRoyaleController::class, 'getPlayer']);
