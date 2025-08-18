<?php

namespace Database\Factories;

use App\Models\CourseModule;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        return [
            // module_id будет автоматически установлен через for()
            'title' => [
                'uz' => $this->faker->sentence(3),
                'ru' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'content' => [
                'uz' => $this->faker->paragraph(),
                'ru' => $this->faker->paragraph(),
                'en' => $this->faker->paragraph(),
            ],
            'video_url' => $this->faker->boolean(80) ? $this->faker->url() : null,
            'duration_seconds' => $this->faker->numberBetween(60, 1800),
            'order' => $this->faker->numberBetween(0, 10),
            'is_free' => $this->faker->boolean(20),
        ];
    }
}
