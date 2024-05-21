<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function getAll()
    {
        return Question::orderBy('sort_order')
            ->with('level')
            ->simplePaginate();
    }

    public function create(mixed $request): Question
    {
        return Question::create($request->toArray()) ?? ExceptionService::createFailed();
    }

    public function get(string $id): Question
    {
        return Question::find($id) ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $this
            ->get($id)
            ->update($request->toArray()) == 0
            ? ExceptionService::updateFailed() : null;
    }
}
