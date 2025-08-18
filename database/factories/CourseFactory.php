<?php

namespace Database\Factories;

use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'instructor_id' => User::inRandomOrder()->first()->id, // Заменить на существующего пользователя
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'lang_id' => $this->faker->numberBetween(1, 3), // Пример: 1=UZ, 2=RU, 3=EN
            'course_level_id' => $this->faker->numberBetween(1, 3),
            'is_whole_purchase_available' => true,
            'is_lesson_purchase_available' => false,
            'whole_price_minor' => $this->faker->numberBetween(100000, 500000), // В тийинах
            'lesson_price_minor' => $this->faker->numberBetween(10000, 50000),
            'status' => rand(1, 6),
            'total_video_duration_seconds' => $this->faker->numberBetween(300, 7200),
        ];
    }
}
