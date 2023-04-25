<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Create_first_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>"ebrahem",
            'email'=>"ebrahemk968@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("12345678"),
            'remember_token' => Str::random(10),
 
        ]);
       
    }
}
