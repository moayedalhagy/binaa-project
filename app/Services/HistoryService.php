<?php

namespace App\Services;

use App\Models\History;
use App\Models\User;
use App\Services\Classes\Answer;
use Exception;
use Illuminate\Database\UniqueConstraintViolationException;

class HistoryService
{
    public function getAll()
    {
        return History::simplePaginate();
    }

    public function create(Answer $answer): History
    {

        try {
            return History::create([
                'question_id' => $answer->question_id,
                'points' => $answer->points,
                'user_id' => $answer->user_id,
                'version_id' => $answer->version_id
            ]);
        } catch (Exception $ex) {

            if (!($ex instanceof UniqueConstraintViolationException)) {
                throw $ex;
            }
        }
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
}
