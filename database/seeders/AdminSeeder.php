<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Thanh Tung Hoang',
            'email' => 'admin@gmail.com',
            'role' => '2',
            'password' => Hash::make('12345678'),
            'avatar' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/images/Vw12mgsXSFsmyhsGmLn2ulSxdCui6FiaGObr7ScS.jpg'
        ]);

        DB::table('users')->insert([
            'username' => 'teacher',
            'name' => 'Van Huy Pham',
            'email' => 'teacher@gmail.com',
            'role' => '1',
            'password' => Hash::make('12345678'),
            'avatar' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/images/Vw12mgsXSFsmyhsGmLn2ulSxdCui6FiaGObr7ScS.jpg'
        ]);

        DB::table('users')->insert([
            'username' => 'student',
            'name' => 'Quang Tung Dinh',
            'email' => 'student@gmail.com',
            'role' => '0',
            'password' => Hash::make('12345678'),
            'avatar' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/images/Vw12mgsXSFsmyhsGmLn2ulSxdCui6FiaGObr7ScS.jpg'
        ]);
    }
}
