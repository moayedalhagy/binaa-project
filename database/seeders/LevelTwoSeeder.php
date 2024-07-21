<?php

namespace Database\Seeders;

use App\Enums\Days;
use App\Enums\QuestionType;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Database\Seeder;

class LevelTwoSeeder extends Seeder
{

    public function run(): void
    {

        $version =  Level::create(['label' => 'two', 'sort_order' => 2])
            ->versions()->create([
                'value' => 80,
                'published' => false
            ]);

        $days = Days::cases();


        $questions = [
            ['label' => 'صلاة الضحى', 'sort_order' => 1],
            ['label' => 'صلاة الظهر', 'sort_order' => 2],
            ['label' => 'صلاة المغرب', 'sort_order' => 3],
        ];


        // loop in questions
        foreach ($questions as $item) {
            // loop in day (1-6) only
            foreach ($days as $day) {

                if ($day == Days::Friday) {
                    continue;
                }

                if ($day == Days::Saturday && $item['sort_order'] == 2) {

                    $daySatQ2 = Question::create([
                        'version_id' => $version->id,
                        'label' => 'تجريب مستوى ثاني',
                        'points' => 1,
                        'type' => QuestionType::Multichoice,
                        'day' => $day,
                        'sort_order' => $item['sort_order']
                    ]);

                    $daySatQ2->options()->createMany([
                        ['label' => '2024', 'is_correct' => true],
                        ['label' => '2023', 'is_correct' => false],
                    ]);
                    continue;
                }

                Question::create([
                    'version_id' => $version->id,
                    'label' => $item['label'],
                    'points' => 1,
                    'type' => QuestionType::Checkbox,
                    'day' => $day,
                    'sort_order' => $item['sort_order']
                ]);
            }
        }

        // friday (all questions is multichoice)
        $optionsQOne = [
            ['label' => '2024', 'is_correct' => true],
            ['label' => '2023', 'is_correct' => false],
            ['label' => '2026', 'is_correct' => false],
        ];

        $optionsQTwo = [
            ['label' => '1900', 'is_correct' => false],
            ['label' => '1800', 'is_correct' => false],
            ['label' => '1200', 'is_correct' => true],
        ];

        $optionsQThree = [
            ['label' => '1000', 'is_correct' => false],
            ['label' => '5000', 'is_correct' => true],
            ['label' => '2026', 'is_correct' => false],
        ];

        $questionForFriday = [
            ['label' => 'العام الحالي هجريا', 'options' =>  $optionsQOne, 'sort_order' => 1],
            ['label' => 'معركة بدر', 'options' =>  $optionsQTwo, 'sort_order' => 2],
            ['label' => 'معركة احد', 'options' =>  $optionsQThree, 'sort_order' => 3],
        ];

        foreach ($questionForFriday as $item) {

            $question = Question::create([
                'version_id' => $version->id,
                'label' => $item['label'],
                'points' => 1,
                'type' => QuestionType::Multichoice,
                'day' => Days::Friday,
                'sort_order' => $item['sort_order']
            ]);


            $question->options()->createMany($item['options']);
        }


        $version->update(['published' => true]);
    }
}
