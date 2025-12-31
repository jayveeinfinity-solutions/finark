<?php

namespace App\Services\Forum;

use App\Models\Forum\Post;
use Illuminate\Http\Request;

class ThreadService
{
    public function create(Post $post, Request $request): Thread
    {
        $thread = Thread::create([
            'post_id' => $post->id,
        ]);

        // Handle attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments/threads', 'public');

                $thread->attachments()->create([
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return $thread;
    }
}