<?php

namespace App\Services;

use App\Models\History;
use App\Models\User;

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

    public function getForUser(string|User $_user)
    {
        $user = $_user instanceof User ? $_user : User::find($_user);

        return $user->histories->sum('points');
    }
    // public function update(mixed $request, string $id)
    // {
    //     $this
    //         ->get($id)
    //         ->update($request->toArray()) == 0 ? ExceptionService::updateFailed() : null;
    // }
}
