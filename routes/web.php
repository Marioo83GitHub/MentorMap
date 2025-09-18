<?php

use App\Livewire\LandingPage;
use App\Livewire\Mentors\Dashboard as MentorDashboard;
use App\Livewire\Mentors\SelectLocation;
use App\Livewire\Mentors\SelectSubjects;
use App\Livewire\Students\Dashboard as StudentDashboard;
use App\Livewire\Users\Login;
use App\Livewire\Users\MentorSignUp;
use App\Livewire\Users\RoleSignUp;
use App\Livewire\Users\StudentSignUp;
use Illuminate\Support\Facades\Route;
use App\Livewire\Chat\ChatComponent;
use App\Livewire\Students\SearchMentor;

Route::get('/', LandingPage::class);
Route::get('/login', Login::class)->name('login');

// Grupo para usuarios autenticados solamente

Route::group(['middleware' => ['auth']], function () {

    Route::get('/sign-up', RoleSignUp::class)->name('users.role-sign-up');
    Route::get('/sign-up/mentor', MentorSignUp::class)->name('users.mentor-sign-up');
    Route::get('/sign-up/student', StudentSignUp::class)->name('users.student-sign-up');


    Route::group(['middleware' => ['role:mentor']], function () {
        Route::get('/mentor/dashboard', MentorDashboard::class)->name('mentors.dashboard');
        Route::get('/mentor/select-location', SelectLocation::class)->name('mentors.select-location');
        Route::get('/mentor/select-subjects', SelectSubjects::class)->name('mentors.select-subjects');
        // Ruta para el chat de mentor
        Route::get('/mentor/chat/{conversationId?}', ChatComponent::class)->name('mentors.chat');
    });


    Route::group(['middleware' => ['role:student']], function () {
        Route::get('/student/dashboard', StudentDashboard::class)->name('students.dashboard');
        //Ruta chat para estudiantes
        Route::get('/student/chat/{conversationId?}', ChatComponent::class)->name('students.chat');
        Route::get('/student/search-mentor', SearchMentor::class)->name('students.search-mentor');
    });

});


