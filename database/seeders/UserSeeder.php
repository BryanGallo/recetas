<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $user=User::create([
            'name'=> 'Bryan',
            'email'=> 'bryan@gmail.com',
            'password'=> Hash::make('12345678'),//hash::encrypta los datos
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=> 'Carlos',
            'email'=> 'carlos@gmail.com',
            'password'=> Hash::make('12345678'),//hash::encrypta los datos
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=> 'Viviana',
            'email'=> 'viviana@gmail.com',
            'password'=> Hash::make('12345678'),//hash::encrypta los datos
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
