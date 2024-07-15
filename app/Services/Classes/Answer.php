<?php


namespace App\Services\Classes;

use App\Enums\QuestionType;
use App\Models\Option;
use App\Models\Question;
use App\Services\QuestionService;


class Answer
{


    public bool|null $answer;

    public $question_id;
    public $timestamp;

    public $version_id;
    public $user_id;
    private Question $question;

    private bool $isMultichoice;

    public Option|null $option;

    public float $points;
    public function __construct($question_id, $answer, $option_id, $timestamp)
    {

        $this->question = (new QuestionService)->get($question_id);

        $this->version_id = $this->question->version_id;

        $this->user_id = auth()->user()->id;

        $this->isMultichoice =  ($this->question->type == QuestionType::Multichoice);

        $this->answer = $this->isMultichoice ? null : $answer;


        $this->option = $this->isMultichoice ?
            $this->question->options()->where('id', $option_id)->first()
            : null;


        $this->question_id = $question_id;

        $this->timestamp = $timestamp;
    }

    private function correct(): bool
    {
        if ($this->isMultichoice) {
            return ($this->option == null) ? false : ($this->option->is_correct == true);            
        } else {
            return (bool) $this->answer;
        }
    }
    public function validate(): self
    {
        $this->points =  $this->correct() ? $this->question->points : 0;

        return $this;
    }
}
