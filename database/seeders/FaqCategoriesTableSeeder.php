<?php

namespace Database\Seeders;

use App\Models\FaqQuestion;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        
//eloquent gebruik
        FaqCategory::create(['name' => 'A) General Information']);
        FaqCategory::create(['name' => 'B) Job Listings and Applications']);
        FaqCategory::create(['name' => 'C) Account Management']);

    }
}
