<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;
use App\Models\PartnerGroups;
use Inertia\Inertia;

class PartnerController extends Controller
{
    protected $layout = 'corporate-ui';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Inertia::setRootView($this->layout);

        $partners = Partner::query()
            ->when($request->input('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString()
            ->through(fn($partner) => [
                'id' => $partner->id,
                'name' => $partner->name,
                'url' => $partner->web_url,
                'logo' => $partner->web_logo
            ]);

        return Inertia::render('Admin/Partners/Index', [
            'partners' => $partners,
            'filters' => $request->only(['search', 'type'])
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
        
        $groups = PartnerGroups::where('active', 1)->orderBy('name')->get();
    
        $groups = $groups->map(function($group) {
            return [
                'id' => $group->id,
                'name' => $group->name,
                'checked' => false
            ];
        });
        
        return Inertia::render('Admin/Partners/Create', [
            'groups' => $groups
        ]);
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
        if($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $filename = time() . '.' . $uploadedFile->clientExtension();

            Storage::disk('images')->putFileAs(
                'uploads',
                $uploadedFile,
                $filename
            );
        }
        $partner = new Partner;
        $partner->name = $request->input('name');
        $partner->web_url = $request->input('url');
        $partner->web_logo = $filename;
        $partner->created_by = 1;
        $partner->save();

        $partner_id = $partner->id;

        $groups = explode(',', $request->input('groups'));
        $newGroups = [];
        foreach($groups as $group) {
            $temp = [];
            $temp['partner_id'] = $partner_id;
            $temp['partner_group_id'] = $group;

            $newGroups[] = $temp;
        }
        DB::table('partner_group_references')->insert($newGroups);

        return response()->json([
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
