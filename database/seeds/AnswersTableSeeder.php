<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Answer::create([
            'name' => 'целевое',
            'question_id' => '1',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'рабочее',
            'question_id' => '1',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'дежурное',
            'question_id' => '1',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'аварийное',
            'question_id' => '1',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'II',
            'question_id' => '2',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'III',
            'question_id' => '2',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'IV',
            'question_id' => '2',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'V',
            'question_id' => '2',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '5',
            'question_id' => '3',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '6',
            'question_id' => '3',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => '7',
            'question_id' => '3',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '8',
            'question_id' => '3',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '24 ч',
            'question_id' => '4',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '28 ч',
            'question_id' => '4',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '32 ч',
            'question_id' => '4',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => '36 ч',
            'question_id' => '4',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'собственник',
            'question_id' => '5',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'руководитель службы охраны труда',
            'question_id' => '5',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'представитель профсоюза',
            'question_id' => '5',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'руководитель подразделения',
            'question_id' => '5',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'анемометр',
            'question_id' => '6',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'термометр',
            'question_id' => '6',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'термограф',
            'question_id' => '6',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'психрометр',
            'question_id' => '6',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'люкс',
            'question_id' => '7',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'кандела',
            'question_id' => '7',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'люмен',
            'question_id' => '7',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'нит',
            'question_id' => '7',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'дым',
            'question_id' => '8',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'токсические продукты сгорания',
            'question_id' => '8',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'паника',
            'question_id' => '8',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'недостаток кислорода',
            'question_id' => '8',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'безопасные',
            'question_id' => '9',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'малоопасные',
            'question_id' => '9',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'сильно опасные',
            'question_id' => '9',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'особо опасные',
            'question_id' => '9',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'электрический знак',
            'question_id' => '10',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'электрический ожог',
            'question_id' => '10',
            'correct' => 0
        ]);
        \App\Answer::create([
            'name' => 'электроофтальмия',
            'question_id' => '10',
            'correct' => 1
        ]);
        \App\Answer::create([
            'name' => 'электрический удар',
            'question_id' => '10',
            'correct' => 0
        ]);
    }
}
