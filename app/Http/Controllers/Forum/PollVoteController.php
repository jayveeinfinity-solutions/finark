<?php

namespace App\Http\Controllers\Forum;

use App\Models\Forum\Poll;
use Illuminate\Http\Request;
use App\Services\Forum\PollService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PollVoteController extends Controller
{
    public function vote(
        Request $request,
        Poll $poll,
        PollService $pollService
    ) {
        $request->validate([
            'option_id' => 'required|exists:poll_options,id',
        ]);

        try {
            $pollService->switchVote($poll, $request->option_id, 14);
            return redirect()->back()->with('success', 'Your vote has been recorded.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
