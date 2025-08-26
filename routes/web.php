<?php

use App\Livewire\LandingPage;
use App\Livewire\Users\Login;
use App\Livewire\Users\SignUp;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/login', Login::class)->name('login');
Route::get('/signup', SignUp::class)->name('signup');
