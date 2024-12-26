<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
})->name('contact');


Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('posts/{slug}', function ($slug) {

    $post = Arr::first(Post::all(), function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Mujadid Akbar Paryono', 'title' => 'About']);
})->name('about');


