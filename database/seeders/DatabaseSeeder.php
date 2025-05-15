<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Rdw',
            'email' => 'rdw@gmail.com',
            'password' => Hash::make('rdw123'),
        ]);

        User::create([
            'nama' => 'Coba1',
            'email' => 'coba1@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba2',
            'email' => 'coba2@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba3',
            'email' => 'coba3@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba4',
            'email' => 'coba4@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba5',
            'email' => 'coba5@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba6',
            'email' => 'coba6@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba7',
            'email' => 'coba7@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba8',
            'email' => 'coba8@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba9',
            'email' => 'coba9@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
        User::create([
            'nama' => 'Coba10',
            'email' => 'coba10@gmail.com',
            'password' => Hash::make('coba123'),
        ]);
    }
}
