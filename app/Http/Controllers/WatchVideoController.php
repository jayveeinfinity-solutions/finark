<?php

namespace App\Http\Controllers;

use App\Models\WatchVideo;
use Illuminate\Http\Request;

class WatchVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function show(WatchVideo $watchVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchVideo $watchVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WatchVideo $watchVideo)
    {
        $watchVideo  = WatchVideo::where('user_id', $request->user_id)
            ->where('video_id', $request->video_id);

        if($watchVideo->count()) {
            $watchVideo->update($request->all());
        } else {
            WatchVideo::create($request->all());
        }

        return response()->json(['data' => $watchVideo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchVideo $watchVideo)
    {
        //
    }
}
