<?php

namespace App\Http\Controllers\Forum;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Forum\Section;
use App\Http\Controllers\Controller;
use App\Services\Forum\SectionService;
use App\Http\Resources\Forum\SectionResource;
use App\Http\Requests\Forum\StoreSectionRequest;
use App\Http\Requests\Forum\UpdateSectionRequest;

class SectionController extends Controller
{
    protected $rootView = 'corporate-ui';

    public function __construct(
        private SectionService $service
    ) {
        Inertia::setRootView($this->rootView);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = $this->service->list();

        return Inertia::render('Admin/Forum/Index', [
            'sections' => SectionResource::collection($sections)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreSectionRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = $this->service->create($request->validated());

        return redirect()->back()
            ->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return Inertia::render('Admin/Forum/Category', compact('section'));
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
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $this->service->update($section, $request->validated());

        return redirect()->back()
            ->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $this->service->delete($section);

        return redirect()->back()
            ->with('success', 'Section deleted successfully.');
    }
}
