<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqQuestion;
use App\Models\FaqCategory;

class FaqQuestionsTableSeeder extends Seeder
{
    public function run()
    {
        FaqQuestion::create([
            'category_id' => 1,
            'question' => 'What sets your student job platform apart?',
            'answer' => 'Our platform focuses on connecting students with part-time jobs that align with their class schedules and skills.'
        ]);

        FaqQuestion::create([
            'category_id' => 2,
            'question' => 'How do I find available student jobs?',
            'answer' => 'You can browse available jobs on our homepage or use the search function to find jobs based on location and type.'
        ]);

        FaqQuestion::create([
            'category_id' => 3,
            'question' => 'Your third question here',
            'answer' => 'Answer to the third question.'
        ]);
    }
}
