<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/command', function () {
    return view('pages.command');
});

Route::get('/rating', function () {
    return view('pages.rating');
});