<?php

namespace App\Services\Forum;

use App\Models\User;
use App\Models\Forum\Poll;
use App\Models\Forum\Post;
use App\Models\Forum\PollVote;
use App\Models\Forum\PollOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function vote(Poll $poll, int $optionId, int $userId)
    {
        return DB::transaction(function () use ($poll, $optionId, $userId) {

            // Prevent duplicate vote
            $existing = PollVote::where('poll_id', $poll->id)
                ->where('user_id', $userId)
                ->first();

            if ($existing) {
                throw new \Exception('User has already voted.');
            }

            // Record the vote
            PollVote::create([
                'poll_id' => $poll->id,
                'poll_option_id' => $optionId,
                'user_id' => $userId,
            ]);

            // Recalculate votes_count for all options
            $poll->options->each(function ($option) {
                $option->votes_count = $option->votes()->count();
                $option->save();
            });

            return true;
        });
    }

    public function switchVote(Poll $poll, int $newOptionId, int $userId)
    {
        return DB::transaction(function () use ($poll, $newOptionId, $userId) {

            // Find existing user (if any)
            $existingUser = User::where('user_id', $userId)
                ->exists();

            // User not exists
            if(!$existingUser) {
                return false;
            }

            // Find existing vote (if any)
            $existingVote = PollVote::where('poll_id', $poll->id)
                ->where('user_id', $userId)
                ->first();

            if ($existingVote) {
                // Remove old vote if different
                if ($existingVote->poll_option_id != $newOptionId) {
                    $existingVote->delete();
                } else {
                    // User clicked the same option, do nothing
                    return false;
                }
            }

            // Add new vote
            PollVote::create([
                'poll_id' => $poll->id,
                'poll_option_id' => $newOptionId,
                'user_id' => $userId,
            ]);

            // Recalculate votes_count for all options
            $poll->options->each(function ($option) {
                $option->votes_count = $option->votes()->count();
                $option->save();
            });

            return true;
        });
    }
}