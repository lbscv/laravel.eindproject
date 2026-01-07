<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default admin (verplicht)
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );

        // Seed demo data
        $this->call([
            FaqSeeder::class,
            NewsSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
