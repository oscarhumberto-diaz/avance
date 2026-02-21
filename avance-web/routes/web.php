<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PrincipleController as AdminPrincipleController;
use App\Http\Controllers\Admin\PrincipleLessonController;
use App\Http\Controllers\Admin\PrincipleStageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogRssController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\EventCalendarExportController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PrinciplesController;
use App\Http\Controllers\TestimonyController;
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
                Route::resource('blog-posts', AdminPostController::class)->except(['show'])->names('posts');
                Route::resource('principle-stages', PrincipleStageController::class)->except(['show']);
                Route::resource('principle-stages.principles', AdminPrincipleController::class)->except(['index', 'show']);
                Route::resource('principles.lessons', PrincipleLessonController::class)->except(['index', 'show']);
                Route::resource('materiales', AdminMaterialController::class)->except(['show'])->names('materials');
                Route::resource('eventos', AdminEventController::class)->except(['show'])->names('events');
                Route::resource('testimonios', \App\Http\Controllers\Admin\TestimonyController::class)
                    ->except(['show'])
                    ->parameters(['testimonios' => 'testimonio'])
                    ->names('testimonies');
                Route::patch('testimonios/{testimonio}/aprobar', [\App\Http\Controllers\Admin\TestimonyController::class, 'approve'])
                    ->name('testimonies.approve');
                Route::patch('testimonios/{testimonio}/publicar', [\App\Http\Controllers\Admin\TestimonyController::class, 'publish'])
                    ->name('testimonies.publish');
            });

        Route::middleware([EnsureUserHasRole::class . ':admin,leader'])
            ->prefix('reports')
            ->name('reports.')
            ->group(function () {
                Route::view('/', 'admin.dashboard.index')->name('index');
            });
    });

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/rss', BlogRssController::class)->name('blog.rss');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/principios', [PrinciplesController::class, 'index'])->name('principles.index');
Route::get('/principios/{stage:slug}', [PrinciplesController::class, 'show'])->name('principles.show');

Route::get('/materiales', [MaterialsController::class, 'index'])->name('materials.index');
Route::get('/materiales/{material}/archivo', [MaterialsController::class, 'download'])->name('materials.download');

Route::get('/calendario', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendario/{event}/ics', EventCalendarExportController::class)->name('calendar.export.ics');

Route::get('/inscripciones', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('/inscripciones/estudiante', [EnrollmentController::class, 'storeStudent'])
    ->middleware('throttle:5,1')
    ->name('enrollments.student.store');
Route::post('/inscripciones/lider', [EnrollmentController::class, 'storeLeader'])
    ->middleware('throttle:5,1')
    ->name('enrollments.leader.store');

Route::get('/testimonios', [TestimonyController::class, 'index'])->name('testimonies.index');

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/', [PageController::class, 'show'])->defaults('slug', 'inicio')->name('home');
