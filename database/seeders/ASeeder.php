<?php

namespace Database\Seeders;


use App\Models\History;
use App\Models\Question;
use Illuminate\Database\Seeder;

class ASeeder extends Seeder
{

    public function run(): void
    {

        $questions = Question::all();


        $count = 1;

        foreach ($questions as  $question) {

            $count++;

            History::create([
                'user_id' => 2,
                'version_id' => $question->version->id,
                'question_id' => $question->id,
                'points' => ($count == 3) ? $question->points - 7 : $question->points,
            ]);
        }
    }
}
