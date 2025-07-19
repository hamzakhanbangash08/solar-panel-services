<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Faqs;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Faqs::create([
            'question' => 'What is the cost of solar panel installation?',
            'answer' => 'Costs depend on size and energy needs. Contact us for a quote.',
        ]);

        Faqs::create([
            'question' => 'How long is the warranty?',
            'answer' => 'We offer up to 25 years warranty on most panels.',
        ]);
    }
}
