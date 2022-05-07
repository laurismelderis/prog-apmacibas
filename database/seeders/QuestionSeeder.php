<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Course;

class QuestionSeeder extends Seeder
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
        $course = Course::where('name', 'python')->pluck('id');
        $questions = [
            [
                'question' => 'Kas ir Python?',
                'answers' => [
                    'No angļu valodas - pitons (čūska)',
                    ['Programmēšanas valoda', 'correct']
                ]
            ],
            [
                'question' => 'Python ir ļoti sarežģīta valoda',
                'answers' => [
                    'patiesi',
                    ['aplami', 'correct']
                ]
            ],
            [
                'question' => 'Kādam nolūkam izmanto funkciju print()?',
                'answers' => [
                    'Printēšanai ar printeri',
                    ['Informācijas izvadīšanai uz ekrāna', 'correct'],
                    'Tāda funkcija neeksistē'
                ]
            ],
            [
                'question' => 'Uzraksti, kā uz ekrāna izvadīt teikumu Python valodā - Man labi sanāk programmēt',
                'answers' => [
                    ['print("Man labi sanāk programmēt")', 'correct']
                    ]
            ],
            [
                'question' => 'Kas ir mainīgais?',
                'answers' => [
                    ['“Mājiņa”, kas uzglabā kādu konkrētu vērtību', 'correct'],
                    'Funkcijas nosaukums',
                    'Cilvēks, kas visu laiku mainās'
                ]
            ],
            [
                'question' => 'Kurā gadījumā x mainīgajam ir pareizi piešķirta vērtība?',
                'answers' => [
                    'x = Labdien!',
                    ['x = "Labdien!"', 'correct']
                ]
            ],
            [
                'question' => 'Iedomājies ka mainīgajam y ir piešķirta vērtība 15, kā izvadīt uz ekrāna tā vērtību formā “y = 15”',
                'answers' => [
                    ['print("y = " + x)', 'correct']
                    ]
            ]
        ];
        foreach($questions as $question){
            Question::factory()
            ->count(1)
            ->question($question['question'], $course[0])
            ->create();
        }
        storeSeed(get_class($this));
    }
}
