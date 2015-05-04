<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\User;

class UserTableSeeder extends Seeder {
    public function run(){
        $this->createAdmin();
    }

    private function createAdmin()
    {
        User::create([
            'name' => 'Duilio Palasios',
            'email' => 'i@duilio.me',
            'password' => bcrypt('admin')
        ]);

    }
}