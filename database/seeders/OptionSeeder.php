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
        if (checkIfSeeded(get_class($this))) {
            echo "Already seeded \n";
            return;
        }
        $data = [
            [
                'question' => 'Kas ir Python?',
                'answers' => [
                    ['Programmēšanas valoda', 'correct'],
                    'No angļu valodas - pitons (čūska)'
                ],
                'type' => 'radio',
                'id' => '5'
            ],
            [
                'question' => 'Python ir ļoti sarežģīta valoda',
                'answers' => [
                    ['Aplami', 'correct'],
                    'Patiesi'
                ],
                'type' => 'radio',
                'id' => '6'
            ],
            [
                'question' => 'Kādam nolūkam izmanto funkciju print()?',
                'answers' => [
                    ['Informācijas izvadīšanai uz ekrāna', 'correct'],
                    'Printēšanai ar printeri',
                    'Tāda funkcija neeksistē'
                ],
                'type' => 'radio',
                'id' => '7'
            ],
            [
                'question' => 'Uzraksti, kā uz ekrāna izvadīt teikumu Python valodā – Man labi sanāk programmēt',
                'answers' => [
                    ['print("Man labi sanāk programmēt")', 'correct'],
                ],
                'type' => 'text',
                'id' => '8'
            ],
            [
                'question' => 'Kas ir mainīgais?',
                'answers' => [
                    ['“Mājiņa”, kas uzglabā kādu konkrētu vērtību', 'correct'],
                    'Funkcijas nosaukums',
                    'Cilveks, kas visu laiku mainās'
                ],
                'type' => 'radio',
                'id' => '9'
            ],
            [
                'question' => 'Python programmēšanas valodu var izmantot arī kā kalkulatoru',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'type' => 'radio',
                'id' => '12'
            ],
            [
                'question' => 'Veikt aritmētiskas operācijas drīkst arī funkcijas print() iekšienē',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'type' => 'radio',
                'id' => '13'
            ],
            [
                'question' => 'Kas ir saraksts?',
                'answers' => [
                    ['Datu kopa', 'correct'],
                    'Lapiņa ar vārdiem',
                    'Funkija Python valodā'
                ],
                'type' => 'radio',
                'id' => '14'
            ],
            [
                'question' => 'Ko apzīmē “in” for cikla sintaksē',
                'answers' => [
                    ['Kurā sarakstā notiks cikla darbība', 'correct'],
                    'Kur tiks izvadīta informācija',
                    'Kurā mainīgajā saglabāt datus'
                ],
                'type' => 'radio',
                'id' => '15'
            ],
            [
                'question' => 'Kādu rezultātu izvadīs komanda print(5+5)',
                'answers' => [
                    ['10', 'correct'],
                ],
                'type' => 'text',
                'id' => '16'
            ],
        ];

        $questions = Question::pluck('text', 'id')->toArray();

        foreach ($data as $option) {
            $questionId = array_search($option['question'], $questions);
            foreach ($option['answers'] as $answer) {
                $isCorrect = false;
                if (is_array($answer) && array_search('correct', $answer)) {
                    $isCorrect = true;
                    $answer = $answer[0];
                }
                Option::factory()
                    ->count(1)
                    ->option($answer, $option['type'], $isCorrect, $option['id'])
                    ->create();
            }
        }

        storeSeed(get_class($this));
    }
}
