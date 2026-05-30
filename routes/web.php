<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userstableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ToDoController;

Route::get('/', function () {
    return view('welcome');
});

//Show Registration Page
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Submit Register
Route::post('/register', [AuthController::class, 'register']);

// Show Login Page
Route::get('/login', [AuthController::class, 'showLogin'])->name('signin');

// execute login backend
Route::post('login', [AuthController::class, 'login']);

//Display dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

//Display users page
Route::get('/user', [userstableController::class, 'userstable'])->name('user');

//Display Profile Page
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('displayProfile');

//Update Profile
Route::post('/updateProfile', [ProfileController::class, 'update_profile']);

//Log out
Route::get('/logout', [LogoutController::class, 'logout']);

// Add Users
Route::get('/users', [userstableController::class, 'userstable'])->name('users');

Route::post('/users', [userstableController::class, 'addUser'])->name('users.add');

// Update Users
Route::post('/user/update/{id}', [userstableController::class, 'update'])->name('users.update');

//Deleting Users
Route::post('/user/delete/{id}', [userstableController::class, 'deleteUser'])->name('users.deleteUser');

// Add Record
Route::get('/todo', [ToDoController::class, 'showToDo'])->name('todo');

Route::post('/todo', [ToDoController::class, 'ToDo'])->name('add.todo');

// Update Record
Route::post('to_do/update/{id}', [ToDoController::class, 'updateToDo']);

// Delete Record
Route::post('to_do/delete/{id}', [ToDoController::class, 'deleteToDo']);
