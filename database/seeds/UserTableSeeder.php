<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {
    public function run(){
        $this->createAdmin();
        $this->createUser(50);
    }

    private function createAdmin()
    {
        User::create([
            'name' => 'Duilio Palasios',
            'email' => 'i@duilio.me',
            'password' => bcrypt('admin')
        ]);

    }

    public function createUser($total)
    {
        $faker = Faker::create();

        for ($i = 0; $i < $total; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }
}