<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courseId = Course::where('course_status', 1)->pluck('id')->toArray();
        $userId = User::all()->pluck('id')->toArray();
        return [
            'user_id' => $userId[array_rand($userId, 1)],
            'course_id' => $courseId[array_rand($courseId, 1)],
            'content' => $this->faker->realText(),
            'rate' => rand(1, 5),
        ];
    }
}
