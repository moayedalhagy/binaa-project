<?php

namespace App\Services;

use App\Enums\QuestionType;
use App\Models\Question;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        if ((new LevelService)->isPublished($request['level_id'])) {
            ExceptionService::updatingForPublishedForbidden();
        }
        return Question::create($request) ?? ExceptionService::createFailed();
    }

    public function get(string $id): Question
    {
        return Question::find($id) ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $question = $this->get($id);

        if ($question->level->published == 1) {
            ExceptionService::updatingForPublishedForbidden();
        }

        $question->update($request) == 0
            ? ExceptionService::updateFailed() : null;
    }

    //options
    public function getOptions(string $ques_id): Question
    {
        $question = $this->get($ques_id);

        $question->load('options');

        return $question;
    }

    public function createOption(mixed $request, string $ques_id)
    {
        $question = $this->get($ques_id);

        if ($question->level->published == 1) {
            ExceptionService::updatingForPublishedForbidden();
        }

        if ($question->type != QuestionType::Multichoice) {
            ExceptionService::questionTypeNotMultichoice();
        }

        return $question
            ->options()
            ->create($request)  ?? ExceptionService::createFailed();
    }

    // TODO try to refatcoring this updateOption methods
    public function updateOption(mixed $request, string $ques_id, string $option_id)
    {

        DB::beginTransaction();
        try {

            $question = $this->get($ques_id);

            if ($question->level->published == 1) {
                ExceptionService::updatingForPublishedForbidden();
            }

            $correctOptionDuplicated =
                key_exists('is_correct', $request)
                && self::hasCorrectOption($question)
                && $request['is_correct'] == 1;


            $option = $question
                ->options()
                ->where('id', $option_id)
                ->first() ?? ExceptionService::notFound();

            if ($correctOptionDuplicated && $option->is_correct != 1) {

                self::setQuestionOptionsCorrectToFalse($question);
            }

            $option->update($request)  ?? ExceptionService::updateFailed();

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }

    //utilities
    public static function setQuestionOptionsCorrectToFalse(Question | string $question): bool
    {
        $model = $question instanceof Question ? $question :  Question::find($question);

        return
            $model
            ->options()
            ->update(['is_correct' => false]);
    }
    public static function hasCorrectOption(Question | string $question): bool
    {
        $model = $question instanceof Question ? $question :  Question::find($question);

        return
            $model
            ->options()
            ->whereIsCorrect(true)
            ->count() > 0 ? true : false;
    }

    public static function hasOptions(Question | string $question): bool
    {

        $model = $question instanceof Question ? $question :  Question::find($question);

        return $model->options()->count() > 0 ? true : false;
    }
}
