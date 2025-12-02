<?php

namespace App\Services\Forum;

use App\Models\Forum\Section;

class SectionService
{
    public function __construct(
        protected Section $sectionModel
    ) {}

    public function list()
    {
        return $this->sectionModel::query()
            ->withCount(['posts', 'comments'])
            ->with(['latestPost'])
            ->orderBy('order')
            ->get();
    }

    public function create(array $data): Section
    {
        return $this->sectionModel::create($data);
    }

    public function update(Section $section, array $data): Section
    {
        $section->update($data);
        return $section;
    }

    public function delete(Section $section): void
    {
        $section->delete();
    }
}