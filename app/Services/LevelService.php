<?php

namespace App\Services;

use App\Models\Level;

class LevelService
{
    public function getAll()
    {
        return Level::orderBy('sort_order')->simplePaginate();
    }

    public function create(mixed $data): Level
    {
        return Level::create($data) ?? ExceptionService::createFailed();
    }

    public function get(string $id): Level
    {
        return Level::find($id) ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $this
            ->get($id)
            ->update($request->toArray()) == 0 ? ExceptionService::updateFailed() : null;
    }

    public function isPublished(string $id): bool
    {
        return $this->get($id)->published == true;
    }

    public function isParent(string $id): bool
    {
        return $this->get($id)->parent_id == null;
    }
}
