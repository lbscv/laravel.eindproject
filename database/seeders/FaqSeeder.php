<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $algemeen = FaqCategory::create(['name' => 'Algemeen']);
        $lid = FaqCategory::create(['name' => 'Lidgeld & inschrijven']);
        $training = FaqCategory::create(['name' => 'Training']);

        FaqItem::create([
            'faq_category_id' => $algemeen->id,
            'question' => 'Waar is de sporthal?',
            'answer' => "Onze trainingen gaan door in Sporthal Centrum.\nAdres: ...",
        ]);

        FaqItem::create([
            'faq_category_id' => $lid->id,
            'question' => 'Hoe kan ik lid worden?',
            'answer' => "Registreer op de website en neem contact op via het contactformulier.",
        ]);

        FaqItem::create([
            'faq_category_id' => $training->id,
            'question' => 'Wanneer zijn de trainingen?',
            'answer' => "Dinsdag en donderdag van 19:00 tot 21:00.",
        ]);
    }
}
