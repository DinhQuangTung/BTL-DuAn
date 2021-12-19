<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'tungdq',
            'email' => 'tung.dq@gmail.com',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
        ]);
        User::factory(100)->create();
    }
}
