<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $categories = [
            [
                'name' => 'HTML/CSS',
                'slug' => 'html-css',
                'description' => 'Fundamentals of HTML and CSS for web development.',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'Client-side scripting language for dynamic web content.',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'Server-side scripting language for web development.',
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'PHP framework for building scalable web applications.',
            ],
        ];

        // Insert data into the 'categories' table
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }

}

