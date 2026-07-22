<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Ali Khan', 'ali@gmail.com', '03001234567'],
            ['Ahmad Khan', 'ahmad@gmail.com', '03001234568'],
            ['Bilal Khan', 'bilal@gmail.com', '03001234569'],

            ['Hamza Ali', 'hamza@gmail.com', '03001234570'],
            ['Usman Ali', 'usman@gmail.com', '03001234571'],
            ['Fahad Ali', 'fahad@gmail.com', '03001234572'],

            ['Saad Khan', 'saad@gmail.com', '03001234573'],
            ['Zubair Khan', 'zubair@gmail.com', '03001234574'],
            ['Danish Khan', 'danish@gmail.com', '03001234575'],
        ];

        foreach ($users as $user) {

            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'phone' => $user[2],
                'password' => Hash::make('123456'),
                'role' => 'worker',
            ]);
        }
    }
}
