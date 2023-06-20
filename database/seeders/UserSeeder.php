<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      User::create([
        'name' => 'Ahmad',
        'email' => 'ahmad@test.com',
        'password' => bcrypt('admin123'),
        'photo' => 'https://source.unsplash.com/user/sspaula', // get the random photo of user with name sspaula
      ]);

      User::create([
        'name' => 'Azaria',
        'email' => 'azaria@test.com',
        'password' => bcrypt('admin123'),
        'photo' => 'https://source.unsplash.com/user/azariaac',
      ]);

    }
}
