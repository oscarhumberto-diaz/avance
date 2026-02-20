<?php

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::resource('pages', AdminPageController::class)->except(['show']);
    });

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/', [PageController::class, 'show'])->defaults('slug', 'inicio')->name('home');
