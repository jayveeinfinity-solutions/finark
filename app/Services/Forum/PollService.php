<?php

namespace App\Services\Forum;

use App\Models\Forum\Poll;
use App\Models\Forum\Post;
use App\Models\Forum\PollOption;

class PollService
{
    public function create(Post $post, array $options): Poll
    {
        $poll = Poll::create([
            'post_id' => $post->id,
        ]);

        foreach ($options as $index => $option) {
            PollOption::create([
                'poll_id' => $poll->id,
                'label' => chr(65 + $index),
                'text' => $option['text'],
            ]);
        }

        return $poll;
    }
}