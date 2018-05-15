<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'login' => 'kuznetsov',
            'rang' => 'Иженер',
            'name' => 'Кузнецов А.А.',
            'email' => 'djoctuk@yandex.ru',
            'birthdate' => '1989-07-11',
            'password' => bcrypt(110789),
            'ip_address' => '127.0.0.1',
            'role_id' => 1
        ]);
        \App\User::create([
            'login' => 'kalashnikova',
            'rang' => 'Преподаватель по Охране труда',
            'name' => 'Калашникова О.В.',
            'email' => 'info@serov112.ru',
            'birthdate' => '1989-07-11',
            'password' => bcrypt(110789),
            'ip_address' => '127.0.0.1',
            'role_id' => 2
        ]);
        \App\User::create([
            'login' => 'bochkarev',
            'rang' => 'Преподаватель по Пожарно-техническому минимуму',
            'name' => 'Бочкарев П.И.',
            'email' => 'bpi@serov112.ru',
            'birthdate' => '1989-07-11',
            'password' => bcrypt(110789),
            'ip_address' => '127.0.0.1',
            'role_id' => 2
        ]);
    }
}
