<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::updateOrCreate(
            ['title' => 'Welkom bij onze sportclub'],
            [
                'content' => "Dit is het eerste nieuwsbericht.\nHier komt clubnieuws, wedstrijden en events.",
                'published_at' => now()->toDateString(),
                'image' => null,
            ]
        );

        News::updateOrCreate(
            ['title' => 'Trainingen hervatten'],
            [
                'content' => "De trainingen hervatten volgende week.\nBreng zeker je sportkledij mee!",
                'published_at' => now()->subDays(7)->toDateString(),
                'image' => null,
            ]
        );
    }
}
