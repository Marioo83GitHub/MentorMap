<?php

use App\Livewire\LandingPage;
use App\Livewire\Mentors\Dashboard as MentorDashboard;
use App\Livewire\Students\Dashboard as StudentDashboard;
use App\Livewire\Users\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/login', Login::class)->name('login');

Route::group(['middleware' => ['role:mentor']], function () {
    Route::get('/mentor/dashboard', MentorDashboard::class)->name('mentor.dashboard');
});
Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student/dashboard', StudentDashboard::class)->name('student.dashboard');
});
