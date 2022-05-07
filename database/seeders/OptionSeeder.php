<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;
use App\Models\Question;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(checkIfSeeded(get_class($this))){
            echo "Already seeded \n";
            return;
        }
        $data = [
            [
                'question' => 'Kas ir Python?',
                'answers' => [
                    'No angļu valodas - pitons (čūska)',
                    ['Programmēšanas valoda', 'correct']
                ],
                'type' => 'radio'
            ],
            [
                'question' => 'Python ir ļoti sarežģīta valoda',
                'answers' => [
                    'patiesi',
                    ['aplami', 'correct']
                ],
                'type' => 'radio'
            ],
            [
                'question' => 'Kādam nolūkam izmanto funkciju print()?',
                'answers' => [
                    'Printēšanai ar printeri',
                    ['Informācijas izvadīšanai uz ekrāna', 'correct'],
                    'Tāda funkcija neeksistē'
                ],
                'type' => 'radio'
            ],
            [
                'question' => 'Uzraksti, kā uz ekrāna izvadīt teikumu Python valodā - Man labi sanāk programmēt',
                'answers' => [
                    ['print("Man labi sanāk programmēt")', 'correct']
                ],
                'type' => 'text'
            ],
            [
                'question' => 'Kas ir mainīgais?',
                'answers' => [
                    ['“Mājiņa”, kas uzglabā kādu konkrētu vērtību', 'correct'],
                    'Funkcijas nosaukums',
                    'Cilvēks, kas visu laiku mainās'
                ],
                'type' => 'radio'
            ],
            [
                'question' => 'Kurā gadījumā x mainīgajam ir pareizi piešķirta vērtība?',
                'answers' => [
                    'x = Labdien!',
                    ['x = "Labdien!"', 'correct']
                ],
                'type' => 'radio'
            ],
            [
                'question' => 'Iedomājies ka mainīgajam y ir piešķirta vērtība 15, kā izvadīt uz ekrāna tā vērtību formā “y = 15”',
                'answers' => [
                    ['print("y = " + x)', 'correct']
                ],
                'type' => 'text'
            ]
        ];

        $questions = Question::pluck('text', 'id')->toArray();

        foreach($data as $option){
            $questionId = array_search($option['question'], $questions);
            foreach($option['answers'] as $answer){
                $isCorrect = false;
                if(is_array($answer) && array_search('correct', $answer)) {
                    $isCorrect = true;
                    $answer = $answer[0];
                }
                Option::factory()
                ->count(1)
                ->option($answer, $option['type'], $isCorrect, $questionId)
                ->create();
            }
        }

        storeSeed(get_class($this));
    }
}
