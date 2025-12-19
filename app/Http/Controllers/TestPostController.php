<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\TestPost;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateTestPostRequest;

class TestPostController extends Controller
{
    public function index()
    {
        $testPosts = TestPost::all();

        return Inertia::render('Test/Index', [
            'testPosts' => $testPosts
        ]);
    }

    public function create()
    {
        return Inertia::render('Test/Create');
    }

    public function store(StorePostRequest $request)
    {
        TestPost::create([
            'title'   => $request->title,
            'content' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Post created successfully');
    }

    public function edit(TestPost $testPost)
    {
        return Inertia::render('Test/Edit', [
            'testPost' => $testPost,
        ]);
    }
    
    public function update(UpdateTestPostRequest $request, TestPost $testPost)
    {
        $testPost->update([
            'title'   => $request->title,
            'content' => $request->body,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Post updated successfully.');
    }
}
