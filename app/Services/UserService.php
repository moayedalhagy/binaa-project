<?php

namespace App\Services;

use App\Models\History;
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

        $request['version_id'] = (new LevelService)
            ->firstLevel()
            ->currentVersion
            ->id;

        return User::create($request) ?? ExceptionService::createFailed();
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


    public function currentLevelHistories(string $id)
    {
        return History::where('user_id', $id)
            ->select('id', 'points', 'question_id', 'option_id')
            ->with([
                'questions:id,points,label,type,day',
                'options:id,label,is_correct'
            ])            
            ->get()
            ->groupBy('questions.day');
    }
}
