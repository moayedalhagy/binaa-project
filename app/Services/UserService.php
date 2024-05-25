<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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


    public function changePassword(User | string $model, $new_password): bool
    {
        $user = $model instanceof User ? $model : $this->get($model);

        return $user->update(['password' => $new_password]);
    }

    public static function checkPassword(User $user, $current_password): bool
    {
        return Hash::check($current_password, $user->password);
    }
}
