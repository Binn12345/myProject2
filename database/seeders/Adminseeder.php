<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\laravelUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => bcrypt('admin')
        ]);

        laravelUsers::create([
            'sid' => '1',
            'user_type' => '0',
            'userdesc' => 'Superadmin'
        ]);


    }
}
