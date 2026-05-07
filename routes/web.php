

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CampusLifeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdmissionsController;
/*
|--------------------------------------------------------------------------
| INSAN International University Routes
|--------------------------------------------------------------------------
*/
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Academics
Route::get('/academics/programmes', [ProgrammeController::class, 'index'])->name('programmes');
Route::get('/academics/programmes/{slug}', [ProgrammeController::class, 'show'])->name('programmes.show');

// Admissions
Route::prefix('admissions')->name('admissions')->group(function () {
 
    // Main admissions landing
    Route::get('/', [AdmissionsController::class, 'index'])
        ->name('');                                  // route: 'admissions'
 
    // Academic Calendar
    Route::get('/calendar', [AdmissionsController::class, 'calendar'])
        ->name('.calendar');                         // route: 'admissions.calendar'
 
    Route::get('/calendar/export', [AdmissionsController::class, 'calendarExport'])
        ->name('.calendar.export');                  // route: 'admissions.calendar.export'
 
    // Fees & Funding
    Route::get('/fees', [AdmissionsController::class, 'fees'])
        ->name('.fees');                             // route: 'admissions.fees'
 
    // Scholarships index
    Route::get('/scholarships', [AdmissionsController::class, 'scholarships'])
        ->name('.scholarships');                     // route: 'admissions.scholarships'
 
    // Individual scholarship (slug-based)
    Route::get('/scholarships/{slug}', [AdmissionsController::class, 'scholarshipShow'])
        ->name('.scholarships.show');                // route: 'admissions.scholarships.show'
});
 
// Apply page (top-level, kept as is for direct CTA links)
Route::get('/apply', [AdmissionsController::class, 'apply'])->name('apply');


// International
Route::get('/international-students', [HomeController::class, 'international'])->name('international');

// Campus Life
Route::get('/campus-life', [CampusLifeController::class, 'index'])->name('campus-life');

// News & Events
Route::get('/news-events', [EventController::class, 'index'])->name('events-news');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// admin Portal (external)
Route::get('/admin-portal', function () {
    return redirect('/admin');
})->name('admin.portal');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::prefix('about')->name('about')->group(function () {
 
    // /about  — overview landing page
    Route::get('/', [AboutController::class, 'index'])
        ->name('');                       // route name: 'about'
 
    // /about/vice-chancellor
    Route::get('/vice-chancellor', [AboutController::class, 'viceChancellor'])
        ->name('.vice-chancellor');       // route name: 'about.vice-chancellor'
 
    // /about/governance
    Route::get('/governance', [AboutController::class, 'governance'])
        ->name('.governance');            // route name: 'about.governance'
 
    // /about/leadership
    Route::get('/leadership', [AboutController::class, 'leadership'])
        ->name('.leadership');            // route name: 'about.leadership'
 
    // /about/collaborations  (optional ?type= filter)
    Route::get('/collaborations', [AboutController::class, 'collaborations'])
        ->name('.collaborations');        // route name: 'about.collaborations'
 
    // /about/graduation
    Route::get('/graduation', [AboutController::class, 'graduation'])
        ->name('.graduation');            // route name: 'about.graduation'
 
    // /about/graduation/{slug}
    Route::get('/graduation/{slug}', [AboutController::class, 'graduationShow'])
        ->name('.graduation.show');       // route name: 'about.graduation.show'
});
 
