<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PrincipleController as AdminPrincipleController;
use App\Http\Controllers\Admin\PrincipleLessonController;
use App\Http\Controllers\Admin\PrincipleStageController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventCalendarExportController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PrinciplesController;
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
                Route::resource('principle-stages', PrincipleStageController::class)->except(['show']);
                Route::resource('principle-stages.principles', AdminPrincipleController::class)->except(['index', 'show']);
                Route::resource('principles.lessons', PrincipleLessonController::class)->except(['index', 'show']);
                Route::resource('materiales', AdminMaterialController::class)->except(['show'])->names('materials');
                Route::resource('eventos', AdminEventController::class)->except(['show'])->names('events');
            });

        Route::middleware([EnsureUserHasRole::class . ':admin,leader'])
            ->prefix('reports')
            ->name('reports.')
            ->group(function () {
                Route::view('/', 'admin.dashboard.index')->name('index');
            });
    });

Route::get('/principios', [PrinciplesController::class, 'index'])->name('principles.index');
Route::get('/principios/{stage:slug}', [PrinciplesController::class, 'show'])->name('principles.show');

Route::get('/materiales', [MaterialsController::class, 'index'])->name('materials.index');
Route::get('/materiales/{material}/archivo', [MaterialsController::class, 'download'])->name('materials.download');

Route::get('/calendario', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendario/{event}/ics', EventCalendarExportController::class)->name('calendar.export.ics');

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/', [PageController::class, 'show'])->defaults('slug', 'inicio')->name('home');
