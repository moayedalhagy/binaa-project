<?php

namespace App\Services;

use App\Services\Classes\Answer;
use Exception;
use Illuminate\Support\Facades\DB;



class HandleAnswersService
{
    private array $answers;

    public function __construct(array $answers)
    {
        $this->answers = $answers['answers'];
    }

    public function handler()
    {

        DB::beginTransaction();

        try {

            $data = $this->answers;

            foreach ($data as $item) {

                $answer = new Answer(
                    question_id: $item['question_id'],
                    answer: $item['answer'],
                    option_id: $item['option_id'],
                    timestamp: $item['timestamp']
                );

                (new HistoryService)->create($answer->validate());
            } // endfor
            DB::commit();

            //throw event calculation history
            (new MarksCalculationService(auth()->user()))->isSuccess()

                ? (new AssignNextLevelService(auth()->user()))()

                : null;
        } catch (Exception $exception) {
            DB::rollBack();


            throw $exception;
        }
    }
}
