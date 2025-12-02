<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forum\PostController;
use App\Http\Controllers\Forum\SectionController;

/*
|--------------------------------------------------------------------------
| Forum routes
|--------------------------------------------------------------------------
|
| Below are routes that not restricted to consultant and unit manager
|
*/
Route::middleware(['web', 'forum.audit'])
    ->prefix('admin/forum')
    ->as('admin.forum.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Forum Sections
        |--------------------------------------------------------------------------
        */

        Route::get('/', [SectionController::class, 'index'])
            ->name('sections.index');
        Route::get('/{section:slug}', [SectionController::class, 'show'])
            ->name('sections.show');

        Route::middleware(['permission:manage forum'])->group(function () {
            Route::post('/sections', [SectionController::class, 'store'])
                ->name('sections.store');

            Route::put('/sections/{section}', [SectionController::class, 'update'])
                ->name('sections.update');

            Route::delete('/sections/{section}', [SectionController::class, 'destroy'])
                ->name('sections.destroy');
        });

        /*
        |--------------------------------------------------------------------------
        | Posts
        |--------------------------------------------------------------------------
        */

        // Route::get('/sections/{section}/threads', [ForumThreadController::class, 'index'])
        //     ->name('threads.index');
        
        Route::get('/section/post', [PostController::class, 'show'])
            ->name('post.show');
        // Route::get('/{section:slug}/{post}', [PostController::class, 'show'])
        //     ->name('post.show');

        // Route::middleware(['auth'])->group(function () {

        //     Route::post('/sections/{section}/threads', [ForumThreadController::class, 'store'])
        //         ->name('threads.store');

        //     Route::put('/threads/{thread}', [ForumThreadController::class, 'update'])
        //         ->name('threads.update');

        //     Route::delete('/threads/{thread}', [ForumThreadController::class, 'destroy'])
        //         ->name('threads.destroy');
        // });

        /*
        |--------------------------------------------------------------------------
        | Replies
        |--------------------------------------------------------------------------
        */

        // Route::middleware(['auth'])->group(function () {

        //     Route::post('/threads/{thread}/replies', [ForumReplyController::class, 'store'])
        //         ->name('replies.store');

        //     Route::put('/replies/{reply}', [ForumReplyController::class, 'update'])
        //         ->name('replies.update');

        //     Route::delete('/replies/{reply}', [ForumReplyController::class, 'destroy'])
        //         ->name('replies.destroy');
        // });

    });
