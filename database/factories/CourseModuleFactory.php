<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Factories\Factory;


class CourseModuleFactory extends Factory
{
    protected $model = CourseModule::class;

    public function definition(): array
    {
        $course = Course::inRandomOrder()->first() ?? Course::factory()->create();

        return [
            'course_id' => $course->id,
            'title' => [
                'uz' => $this->faker->sentence(2),
                'ru' => $this->faker->sentence(2),
                'en' => $this->faker->sentence(2),
            ],
            'order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
