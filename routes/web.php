<?php

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Partner;
use App\Models\Feedback;
use App\Models\Appointment;
use App\Models\PartnerGroups;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\PartnerGroupReferences;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WatchVideoController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', function () {
    $groups = PartnerGroups::where('active', 1)->orderBy('sequence')->get();
    $partner_group_references = PartnerGroupReferences::select(DB::raw('partner_group_id AS id, COUNT(*) AS count'))->groupBy('partner_group_id')->get();
    
    $data = [];
    $i = 0;
    foreach($groups as $group) {
        $temp = [];
        $temp['id'] = $group->id;
        $temp['name'] = $group->name;
        $temp['icon'] = $group->icon;
        $temp['sequence'] = ($i < 3 ? $i : ($i + 1)) + 1;
        $temp['lg'] = $i < 3 ? TRUE : FALSE;
        $temp['col'] = $i < 4 ? 1 : 2;

        foreach($partner_group_references as $pgr) {
            if($group->id == $pgr->id) {
                $temp['count'] = $pgr->count;
                break;
            }
        }
        $i++;
        $data[] = $temp;
    }

    $data[] = [
        'id' => 0,
        'name' => "Bank Partners",
        'icon' => $data[3]['icon'],
        'sequence' => 4,
        'count' => $data[3]['count'] + $data[4]['count'],
        'lg' => FALSE,
        'col' => 0
    ];

    usort($data, fn($x, $y) => $x['sequence'] <=> $y['sequence']);

    return Inertia::render('Landing', [
        'groups' => $data
    ]);
});
Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/services', function () {
    return Inertia::render('Services');
});
Route::get('/services/{slug}', function(string $slug) {
    $dateToday = Carbon::now()->addDays(1);

    if($dateToday->isSaturday()) {
        $dateToday->addDays(2);
    }
    if($dateToday->isSunday()) {
        $dateToday->addDays(1);
    }

    return Inertia::render('Service', [
        'page' => $slug,
        'minDate' => $dateToday->format('Y-m-d')
    ]);
});
Route::post('/appointment/timeslots', [AppointmentController::class, 'getAvailableTimeSlots']);
Route::get('/events', function () {
    return Inertia::render('Events');
});
Route::get('/blogs', function () {
    return Inertia::render('Blogs');
});
Route::get('/careers', function () {
    return Inertia::render('Careers');
});
Route::get('/contacts', function () {
    return Inertia::render('Contact');
});
Route::get('/partners', function () {
    $groups = PartnerGroups::where('active', 1)->orderBy('sequence')->get();
    $partners = Partner::where('active', 1)->orderBy('name')->get();

    $groups = $groups->map(function($group) {
        return [
            'id' => $group->id,
            'name' => $group->name,
            'isActive' => false
        ];
    });

    $partners = $partners->map(function($partner) {
        $partner_group_references = PartnerGroupReferences::select('partner_group_id')->where('partner_id', $partner->id)->get();
        $groups = [];
        foreach($partner_group_references as $pgr) {
            $groups[] = $pgr->partner_group_id;
        }

        return [
            'id' => $partner->id,
            'name' => $partner->name,
            'logo' => $partner->web_logo,
            'url' => $partner->web_url,
            'groups' => implode(',', $groups)
        ];
    });

    return Inertia::render('Partners', [
        'groups' => $groups,
        'partners' => $partners
    ]);
});

Route::post('/appointment/store', [AppointmentController::class, 'store']);
Route::post('/feedback/store', [FeedbackController::class, 'store']);
Route::post('/careers/store', [CareerController::class, 'store']);

Route::get('/signin', [LoginController::class, 'index'])->name('signin');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/signout', [LoginController::class, 'deauth'])->name('deauth');

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
        // });

/*
|--------------------------------------------------------------------------
| Forum routes
|--------------------------------------------------------------------------
|
| Below are routes that not restricted to consultant and unit manager
|
*/
        Route::prefix('forum')->group(function () {
            Route::get('/', [ForumController::class, 'index']);
        });
    });
});

require __DIR__.'/auth.php';
