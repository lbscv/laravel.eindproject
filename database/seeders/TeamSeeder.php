<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teamA = Team::updateOrCreate(['name' => 'A-ploeg'], ['season' => '2025-2026']);
        $jeugd = Team::updateOrCreate(['name' => 'Jeugd'], ['season' => '2025-2026']);

        $admin = User::where('email', 'admin@ehb.be')->first();

        // koppel admin aan A-ploeg (demodata)
        if ($admin) {
            $teamA->users()->syncWithoutDetaching([$admin->id]);
        }
    }
}
