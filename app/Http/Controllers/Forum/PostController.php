<?php

namespace App\Http\Controllers\Forum;

use Inertia\Inertia;
use App\Models\Forum\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Forum\PollService;
use App\Http\Controllers\Controller;
use App\Services\Forum\ThreadService;
use App\Http\Requests\Post\StorePostRequest;

class PostController extends Controller
{
    public function __construct() {
        Inertia::setRootView('forum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Intranet/Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StorePostRequest $request,
        ThreadService $threadService,
        PollService $pollService
    ) {
        return DB::transaction(function () use ($request, $threadService, $pollService) {

            // Base post
            $post = Post::create([
                'user_id' => $request?->user()?->id ?? 1,
                'type' => $request->type,
                'title' => $request->title,
                'content' => $request->type === 'thread'
                    ? $request->content
                    : null,
                'section_id' => 1
            ]);

            // Delegate logic
            match ($post->type) {
                'thread' => $threadService->create($post, $request),
                'poll' => $pollService->create($post, $request->options),
            };

            return redirect()
                ->route('intranet.posts.show', $post)
                ->with('success', 'Post created successfully.');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Admin/Forum/Show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
