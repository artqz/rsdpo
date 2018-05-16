<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'name' => 'Администратор'
        ]);
        \App\Role::create([
            'name' => 'Учитель'
        ]);
        \App\Role::create([
            'name' => 'Модератор'
        ]);
        \App\Role::create([
            'name' => 'Ученик'
        ]);
    }
}
