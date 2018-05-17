<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Program::create([
            'name' => 'Охрана труда',
            'user_id' => '2' //Kalashnikova
        ]);
    }
}
