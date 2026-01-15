<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Forum\Post;
use Illuminate\Http\Request;

class IntranetController extends Controller
{
    public function __construct() {
        Inertia::setRootView('forum');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $latestPoll = Post::where('type', 'poll')
            ->whereHas('poll.options')
            ->with('poll.options.votes')
            ->latest()
            ->first();

        if($latestPoll?->poll) {
            $poll = $latestPoll->poll;

            $totalVotes = $poll->options->sum(fn($option) => $option->votes_count);

            $optionsWithPercentage = $poll->options->map(function($option) use ($totalVotes) {
                $count = $option->votes_count;
                $percentage = $totalVotes > 0 ? ($count / $totalVotes) * 100 : 0;
                
                return [
                    'id' => $option->id,
                    'label' => $option->label,
                    'text' => $option->text,
                    'votes' => $count,
                    'percentage' => round($percentage),
                ];
            });
        }
        
        return Inertia::render('Intranet/Dashboard', [
            'poll' => $latestPoll,
            'options' => $optionsWithPercentage
        ]);
    }

    public function discussions()
    {
        return Inertia::render('Intranet/Discussions/Index');
    }

    public function courses()
    {
        return Inertia::render('Intranet/Courses/Index');
    }

    public function signin()
    {
        return Inertia::render('Intranet/Signin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
