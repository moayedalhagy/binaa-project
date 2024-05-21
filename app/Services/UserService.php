<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAll()
    {
        return User::simplePaginate();
    }

    public function create(mixed $request): User
    {
        return User::create($request->toArray()) ?? ExceptionService::createFailed();
    }

    public function get(string $id): User
    {
        return User::find($id) ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $this
            ->get($id)
            ->update($request->toArray()) == 0 ? ExceptionService::updateFailed() : null;
    }
}
