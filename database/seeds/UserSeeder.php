<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'John Smith',
            'email' => Str::random(10).'@gmail.com',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'comments' => 'Director',
        ]);
    }
}
