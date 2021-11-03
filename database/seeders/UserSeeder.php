<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('test1'),
            'created_at' => Carbon::now()->addMonth(-1),
        ]);

        User::create([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('test2'),
            'created_at' => Carbon::now()->addMonth(-2),
        ]);

        User::create([
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('test3'),
            'created_at' => Carbon::now()->addMonth(-4),
        ]);

        User::create([
            'name' => 'test4',
            'email' => 'test4@example.com',
            'password' => Hash::make('test4'),
            'created_at' => Carbon::now()->addMonth(-4),
        ]);
    }
}
