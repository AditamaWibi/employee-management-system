<?php

use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardContoller::class)->name('dashboard');

Route::resource('departments',DepartmentController::class)->except('show');

Route::resource('positions',PositionController::class)->except('show');

Route::resource('employees',EmployeeController::class)->except('show');