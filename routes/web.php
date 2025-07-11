<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::prefix('/')->name('front.')->group(function () {

    //============================index============================
    Route::view('', 'front.index')->name('index');

    //============================about============================
    Route::view('about', 'front.about')->name('about');

    //============================contact============================
    Route::view('contact', 'front.contact')->name('contact');

    //============================project============================
    Route::view('project', 'front.project')->name('project');

    //============================service============================
    Route::view('service', 'front.service')->name('service');

    //============================team============================
    Route::view('team', 'front.team')->name('team');

    //============================testimonial============================
    Route::view('testimonial', 'front.testimonial')->name('testimonial');

    //============================404============================
    Route::view('notfound', 'front.404')->name('notfound');
});



//============================Admin Routes============================
Route::prefix('/admin')->name('admin.')->group(function () {

    Route::middleware('admin')->group(function () {
        //============================index============================
        Route::view('', 'admin.index')->name('index');

        //============================settings============================
        Route::view('settings', 'admin.settings.index')->name('settings');

        //============================about-us============================
        Route::view('about-us', 'admin.about-us.index')->name('about-us');

        //============================skills============================
        Route::view('skills', 'admin.skills.index')->name('skills');

        //============================Subscribers============================
        Route::view('subscribers',  'admin.subscribers.index')->name('subscribers');

        //============================Counters============================
        Route::view('counters',  'admin.counters.index')->name('counters');

        //============================Services============================
        Route::view('services',  'admin.services.index')->name('services');

        //============================Messages============================
        Route::view('messages',  'admin.messages.index')->name('messages');

        //============================Categories============================
        Route::view('categories',  'admin.categories.index')->name('categories');

        //============================Our Clients============================
        Route::view('our-clients',  'admin.our-clients.index')->name('our-clients');

        //============================Projects============================
        Route::view('projects',  'admin.projects.index')->name('projects');

        //============================Sliders============================
        Route::view('sliders',  'admin.sliders.index')->name('sliders');

    });
    //============================login============================
    Route::view('/login', 'admin.auth.login')->middleware('guest:admin')->name('login');
});
