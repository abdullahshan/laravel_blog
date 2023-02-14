<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "abdullah";
        $user->l_name = "abdullah";
        $user->email = "abdullah@gmail.com";
        $user->password = Hash::make('012345678');
       $user->save();

    }
}
