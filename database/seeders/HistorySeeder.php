<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $vid = \App\Models\Level::first()->versions->first()->id;

        $LevelQuestions = \App\Models\Question::whereVersionId($vid)->get();

        $huser =  \App\Models\User::find(2)->histories();
        $ids1Zero = [1, 4, 8, 20, 7];
        $huser2 =   \App\Models\User::find(3)->histories();
        $ids2Zero = [5, 21];

        foreach ($LevelQuestions as $question) {
            # code... ->history()
            if ($question->type == \App\Enums\QuestionType::Multichoice) {
                $ids1Zero[] = $question->id;
                $ids2Zero[] = $question->id;
            }
            $huser->create([

                'version_id' => $question->version_id,
                'question_id' => $question->id,
                'points' => in_array($question->id, $ids1Zero) ? 0.00 : $question->points,
            ]);

            $huser2->create([
                'version_id' => $question->version_id,
                'question_id' => $question->id,
                'points' => in_array($question->id, $ids2Zero) ? 0.00 : $question->points,
            ]);
        }
    }
}
