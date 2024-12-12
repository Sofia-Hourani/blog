<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $admin->role = 'admin';
        $admin->save();

        $user = User::create([
            'name' => 'User',
            'email' => 'user@blog.com',
            'password' => bcrypt('password'),
        ]);

        $user->role = 'user';
        $user->save();
    }
}
