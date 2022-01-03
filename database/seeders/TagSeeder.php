<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\Tag;
use App\Models\CourseTag;
use database\factories\CourseTagsFactory;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()
        ->hasAttached(Course::factory()
            ->has(Lesson::factory()
                ->has(Document::factory()->count(3)->state(function (array $attributes, Lesson $lesson) {
                    return ['lesson_id' => $lesson->id];
                }))
            ->count(3)->state(function (array $attributes, Course $course) {
                return ['course_id' => $course->id];
            }))
            ->count(30))
        ->state([
            'name' => '#css',
        ])->create();
    }
}
