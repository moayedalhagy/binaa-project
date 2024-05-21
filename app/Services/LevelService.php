<?php

namespace App\Services;

use App\Models\Level;

class LevelService
{
    public function getAll()
    {
        return Level::orderBy('sort_order')->simplePaginate();
    }

    public function create(mixed $request): Level
    {
        return Level::create($request->toArray()) ?? ExceptionService::createFailed();
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
}
