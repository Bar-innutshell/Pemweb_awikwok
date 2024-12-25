<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
})->name('contact');

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
})->name('blog');

Route::get('/about',  function () {
    return view('about', ['nama' => 'Mujadid Akbar Paryono'], ['title' => 'About']);
})->name('about');


