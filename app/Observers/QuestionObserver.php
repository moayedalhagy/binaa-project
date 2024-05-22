<?php

namespace App\Observers;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Services\ExceptionService;
use App\Services\QuestionService;


class QuestionObserver
{

    public function updating(Question $question): void
    {
        if ($question->isDirty('type')) {

            if (
                $question->getOriginal('type') == QuestionType::Multichoice
                && QuestionService::hasOptions($question)
            ) {
                ExceptionService::questionTypeChangeForbidden();
            }
        }
    }
}
