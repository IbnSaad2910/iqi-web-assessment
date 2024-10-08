<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('property', [PropertyController::class, 'index'])->name('property.index');
