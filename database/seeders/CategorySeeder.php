<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['ACCESSIBILITY', 'BEST_PRACTICES', 'PERFORMANCE'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

