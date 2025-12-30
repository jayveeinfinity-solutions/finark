<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
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
        return Inertia::render('Intranet/Dashboard');
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
