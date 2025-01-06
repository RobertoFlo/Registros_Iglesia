<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::view('/email/verified', 'verifyEmail')->name('email.verified');
