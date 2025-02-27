<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        // 'feedable.choices'
        $feeds = Feed::with(['feedable'])->latest()->get();
        return response()->json($feeds);
    }

    public function storePost(Request $request)
    {
        $post = Post::create(['content' => $request->content]);
        $post->feed()->create(['user_id' => auth()->id()]);
        return response()->json(['message' => 'Post created successfully']);
    }
}
