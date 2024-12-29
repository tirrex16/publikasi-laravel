<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtikelController;

Route::apiResource('artikels', ArtikelController::class);
ç