<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::middleware([EnsureUserHasRole::class . ':admin,editor'])
            ->group(function () {
                Route::resource('pages', AdminPageController::class)->except(['show']);
            });

        Route::middleware([EnsureUserHasRole::class . ':admin,leader'])
            ->prefix('reports')
            ->name('reports.')
            ->group(function () {
                Route::view('/', 'admin.dashboard.index')->name('index');
            });
    });

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/', [PageController::class, 'show'])->defaults('slug', 'inicio')->name('home');
