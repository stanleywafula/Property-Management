<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email', 'admin@test.com')->first();

        if(!$user){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'role' => 'admin',
                'password' => Hash::make('Kenya@2023'),
            ]);
        }
    }
}
