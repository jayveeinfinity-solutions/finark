<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Partner;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $layout = 'corporate-ui';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Inertia::setRootView($this->layout);
        
        $count = Partner::count();
        $partners = Partner::where('active', 1)->orderBy('name')->take(20)->get();
    
        $partners = $partners->map(function($partner) {
            return [
                'id' => $partner->id,
                'name' => $partner->name,
                'url' => $partner->web_url,
                'logo' => $partner->web_logo
            ];
        });
        
        return Inertia::render('Admin/Blogs/Index', [
            'partners' => $partners,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Inertia::setRootView($this->layout);
        
        
        return Inertia::render('Admin/Blogs/Create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
