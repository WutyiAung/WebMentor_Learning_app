<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $js = Category::where('name', 'javascript')->first();
        $this->seedCourses($js, [
            ['title' => 'JavaScript Fundamentals', 'description' => 'Learn the basics of JavaScript programming language.', 'url' => 'https://example.com/js-fundamentals'],
            // Add more frontend courses here
        ]);

        $php = Category::where('name', 'PHP')->first();
        $this->seedCourses($php, [
            ['title' => 'PHP Basics', 'description' => 'Introduction to PHP programming language.', 'url' => 'https://example.com/php-basics'],
            ['title' => 'Laravel Fundamentals', 'description' => 'Learn the basics of Laravel framework.', 'url' => 'https://example.com/laravel-fundamentals'],
            // Add more backend courses here
        ]);

        $laravel = Category::where('name', 'laravel')->first();
        $this->seedCourses($laravel, [
            [
                'title' => 'MySQL Basics',
                'description' => 'Introduction to MySQL database management.',
                'url' => 'https://example.com/mysql-basics'
            ],
        ]);

        $nodejs = Category::where('name', 'NodeJs')->first();
        $this->seedCourses($nodejs, [
            [
                'title' => 'Node.js Basics',
                'description' => 'Introduction to Node.js.',
                'url' => 'https://example.com/nodejs-basics'
            ],
        ]);
    }

    private function seedCourses($category, $coursesData)
    {
        foreach ($coursesData as $courseData) {
            Course::create([
                'category_id' => $category->id,
                'title' => $courseData['title'],
                'description' => $courseData['description'],
                'url' => $courseData['url'],
            ]);
        }
    }
}
