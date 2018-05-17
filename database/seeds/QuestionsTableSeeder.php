<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Question::create([
            'name' => 'Какого вида естественного освещения нет?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'К какой степени тяжести относится электрический удар если человек потерял сознание, но с сохранением дыхания?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Максимально допустимый груз для женщин при постоянном подъёме и перемещении в течении рабочей смены?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Количество часов работы в неделю допустимое для несовершеннолетних от 16 до 18 лет?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Кто не входит в комиссию по расследованию несчастных случаев на производстве?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Для определения относительной влажности воздуха в помещении применяют?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Какой единицей измеряют яркость?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Какой из вредных факторов обусловлен потерей координации движения, слабостью и затормаживанием сознания?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Какого разряда по степени опасности к воспламенению нет?',
            'program_id' => '1' //Ohrana truda
        ]);
        \App\Question::create([
            'name' => 'Повреждение поверхности тела под воздействием электрической дуги или больших токов проходящих через тело человека?',
            'program_id' => '1' //Ohrana truda
        ]);
    }
}
