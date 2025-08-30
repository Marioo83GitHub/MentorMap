<?php

use App\Livewire\LandingPage;
use App\Livewire\Mentors\Dashboard as MentorDashboard;
use App\Livewire\Students\Dashboard as StudentDashboard;
use App\Livewire\Users\Login;
use App\Livewire\Users\MentorSignUp;
use App\Livewire\Users\RoleSignUp;
use App\Livewire\Users\StudentSignUp;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/login', Login::class)->name('login');

// Grupo para usuarios autenticados solamente

Route::group(['middleware' => ['auth']], function () {

    Route::get('/role-sign-up', RoleSignUp::class)->name('users.role-sign-up');
    Route::get('/mentor-sign-up', MentorSignUp::class)->name('users.mentor-sign-up');
    Route::get('/student-sign-up', StudentSignUp::class)->name('users.student-sign-up');

    Route::group(['middleware' => ['role:mentor']], function () {
        Route::get('/mentor/dashboard', MentorDashboard::class)->name('mentor.dashboard');
    });

    Route::group(['middleware' => ['role:student']], function () {
        Route::get('/student/dashboard', StudentDashboard::class)->name('student.dashboard');
    });

});


