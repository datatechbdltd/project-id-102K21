<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::post('/contact-message-store', [FrontendController::class, 'contactMessageStore']);
Route::post('/subscribe/store', [FrontendController::class, 'subscribeStore']);
