<?php

namespace App\Services;

use App\Models\History;


class HistoryService
{
    public function getAll()
    {
        return History::simplePaginate();
    }

    public function create(mixed $request): History
    {
        return History::create($request->toArray()) ?? ExceptionService::createFailed();
    }

    public function get(string $id): History
    {
        return History::find($id) ?? ExceptionService::notFound();
    }

    // public function update(mixed $request, string $id)
    // {
    //     $this
    //         ->get($id)
    //         ->update($request->toArray()) == 0 ? ExceptionService::updateFailed() : null;
    // }
}
