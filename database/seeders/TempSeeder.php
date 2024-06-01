<?php

namespace Database\Seeders;

use App\Enums\Days;
use App\Enums\QuestionType;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Database\Seeder;

class TempSeeder extends Seeder
{

    public function run(): void
    {

        $LevelOne = Level::create([
            'label' => 'One',
            'sort_order' => 1,
        ]);

        $versionOne = $LevelOne->versions()->create([
            'value' => 60,
            'published' => false
        ]);

        $versionTwo = $LevelOne->versions()->create([
            'value' => 70,
            'published' => false
        ]);

        $versionThree = $LevelOne->versions()->create([
            'value' => 80,
            'published' => false
        ]);
        //////////////////////////
        Level::create([
            'label' => 'two',
            // 'value' => 50,
            'sort_order' => 2,
        ]);

        Level::create([
            'label' => 'three',
            // 'value' => 50,
            'sort_order' => 3,
        ]);
        ///////
        Question::create([
            'version_id' => $versionOne->id,
            'label' => 'هل صليت الفجر ؟',
            'points' => 10,
            'type' => QuestionType::Yes_no,
            'day' => Days::Saturday,
            'sort_order' => 1
        ]);

        Question::create([
            'version_id' => $versionOne->id,
            'label' => 'هل صليت الظهر ؟',
            'points' => 10,
            'type' => QuestionType::Yes_no,
            'day' => Days::Saturday,
            'sort_order' => 2
        ]);
        Question::create([
            'version_id' => $LevelOne->id,
            'label' => 'هل صليت العصر ؟',
            'points' => 10,
            'type' => QuestionType::Yes_no,
            'day' => Days::Saturday,
            'sort_order' => 3
        ]);
        $question = Question::create([
            'version_id' => $versionOne->id,
            'label' => 'ما هو العام الحالي',
            'points' => 10,
            'type' => QuestionType::Multichoice,
            'day' => Days::Sunday,
            'sort_order' => 4
        ]);

        $question->options()->createMany([
            ['label' => '2024', 'is_correct' => true],
            ['label' => '2023', 'is_correct' => false],
            ['label' => '2026', 'is_correct' => false],
        ]);
    }
}
