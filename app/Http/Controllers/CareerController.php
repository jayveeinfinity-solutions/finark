<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
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
        
        return Inertia::render('Admin/Careers/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Inertia::setRootView($this->layout);
        
        return Inertia::render('Admin/Careers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = NULL;
        if(!$request->hasFile('file')) {
            return response()->json([
                'title' => "Attachment error!",
                'message' => "Please upload you Portfolio/CV in PDF file format!",
                'status' => "error"
            ]);
        }

        $uploadedFile = $request->file('file');
        $filename = Str::slug($request->input('name'), '-') . '.' . $uploadedFile->clientExtension();

        Storage::disk('career_applications')->putFileAs(
            '',
            $uploadedFile,
            $filename
        );

        $career = new CareerApplication;
        $career->name = $request->input('name');
        $career->email = $request->input('email');
        $career->position = $request->input('position');
        $career->file = $filename;
        $career->save();

        return response()->json([
            'title' => "Thank you!",
            'message' => "Successfully submitted your application!",
            'status' => "success"
        ]);
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
