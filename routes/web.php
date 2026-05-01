<?php

use Inertia\Inertia;
use App\Models\Partner;
use App\Models\Feedback;
use App\Models\Appointment;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WatchVideoController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\ExtranetController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::name('extranet.')->group(function() {
    Route::get('/', [ExtranetController::class, 'landing'])->name('landing');
    Route::get('/about', [ExtranetController::class, 'about'])->name('about');
    Route::get('/services', [ExtranetController::class, 'services'])->name('services');
    Route::get('/services/{slug}', [ExtranetController::class, 'service'])->name('service');
    Route::post('/appointment/timeslots', [AppointmentController::class, 'getAvailableTimeSlots']);
    Route::get('/events', [ExtranetController::class, 'events'])->name('events');
    Route::get('/blogs', [ExtranetController::class, 'blogs'])->name('blogs');
    Route::get('/careers', [ExtranetController::class, 'careers'])->name('careers');
    Route::get('/contacts', [ExtranetController::class, 'contacts'])->name('contacts');
    Route::get('/partners', [ExtranetController::class, 'partners'])->name('partners');

    Route::post('/appointment/store', [AppointmentController::class, 'store']);
    Route::post('/feedback/store', [FeedbackController::class, 'store']);
    Route::post('/careers/store', [CareerController::class, 'store']);

    Route::get('/signin', [LoginController::class, 'index'])->name('signin');
    Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
    Route::get('/signout', [LoginController::class, 'deauth'])->name('deauth');
});

Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/', function() {
            $user = Auth::user();
            if(in_array($user->roles->first()->name, ['developer', 'admin', 'virtual-assistant'])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin/forum');
            }
        });
        Route::get('/courses', [CourseController::class, 'index']);
        Route::get('/courses/{id}', [CourseController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/courses/posters/{course}', [CourseController::class , 'getPoster']);

        Route::get('/videos/{uid}', [VideoController::class, 'show']);
        Route::post('/videos/watch/update', [WatchVideoController::class, 'update']);
        // Route::get('/videos/play/{video}', [VideoController::class , 'getVideo']);
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
| Below are routes that accessible to developer and admin
|
*/
        // Route::middleware(['role:developer,admin'], function () {
            
            Route::get('/dashboard', function() {
                Inertia::setRootView('corporate-ui');
            
                $appointments_count = Appointment::where('active', 1)->count();
                $career_applications_count = CareerApplication::where('active', 1)->count();
                $feedback_count = Feedback::where('active', 1)->count();
                $partners_count = Partner::where('active', 1)->count();
            
                return Inertia::render('Admin/Dashboard/Index', [
                    'appointmentsCount' => number_format($appointments_count),
                    'careerApplicationsCount' => number_format($career_applications_count),
                    'feedbackCount' => number_format($feedback_count),
                    'partnersCount' => number_format($partners_count)
                ]);
            });
            Route::get('/appointments', [AppointmentController::class, 'index']);
            Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->where('id', '[0-9]+');;

            Route::get('/partners', [PartnerController::class, 'index']);
            Route::get('/partners/create', [PartnerController::class, 'create']);
            Route::post('/partners/store', [PartnerController::class, 'store']);

            Route::get('/blogs', [BlogController::class, 'index']);
            Route::get('/blogs/create', [BlogController::class, 'create']);
            // Route::post('/upload-image', function() {
            //     return back()->with(['data' => ['url' => 'https://scontent.fcrk1-5.fna.fbcdn.net/v/t39.30808-1/365157665_2514060665435935_3431411587185054972_n.jpg?stp=cp6_dst-jpg_p200x200&_nc_cat=104&ccb=1-7&_nc_sid=7206a8&_nc_eui2=AeHStHQ90s2X3MWbOLkF9sMTe7SxSuI_l8p7tLFK4j-XymAvMxjZ4_VYuw-taC79RX78ZwqZ8ZhUz4j_54IOExqO&_nc_ohc=vzPrFt7PF68AX8mxzAf&_nc_ht=scontent.fcrk1-5.fna&oh=00_AfDB5WirPTaZLdwVDURtqFWXu6MziBNdfnLGVQ5nLanvxg&oe=64F1ED35']]);
            // });

            Route::get('/careers', [CareerController::class, 'index']);
            Route::get('/careers/create', [CareerController::class, 'create']);

            Route::get('/users', [UserController::class, 'index']);
            Route::get('/users/create', [UserController::class, 'create']);
            Route::get('/users/edit/{id}', [UserController::class, 'edit'])->where('id', '[0-9]+');
            Route::get('/users/export/', [UserController::class, 'export']);
            Route::get('/users/profile/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
            Route::get('/profile/{id}', [ProfileController::class, 'show'])->where('id', '[0-9]+');

            Route::post('/users/store', [UserController::class, 'store']);
            Route::post('/users/update', [UserController::class, 'update']);
            Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+');

            Route::get('/courses/create', [CourseController::class, 'create']);
            Route::get('/courses/edit/{course_id}', [CourseController::class, 'edit']);
            Route::post('/courses/store', [CourseController::class, 'store']);
            Route::post('/courses/update', [CourseController::class, 'update']);
            
            Route::get('/videos/create/{course_id?}', [VideoController::class, 'create']);
            Route::get('/videos/edit/{video_id}', [VideoController::class, 'edit']);
            Route::post('/videos/store', [VideoController::class, 'store']);
            Route::post('/videos/upload', [VideoController::class, 'upload']);
            Route::post('/videos/update', [VideoController::class, 'update']);
            Route::post('/videos/upload/chunks', [VideoController::class, 'uploadChunks']);
            
            Route::get('/clients', [ClientController::class, 'index']);
            
            Route::patch('/okrs/key-results/{id}', [\App\Http\Controllers\Admin\OkrController::class, 'updateKeyResult'])->where('id', '[0-9]+');
        // });
    });
});

Route::prefix('intranet')->name('intranet.')->group(function () {
    Route::get('/auth', [\App\Http\Controllers\Intranet\AuthController::class, 'index'])->name('auth');
    Route::post('/auth', [\App\Http\Controllers\Intranet\AuthController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\Intranet\AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Intranet\DashboardController::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/forum.php';