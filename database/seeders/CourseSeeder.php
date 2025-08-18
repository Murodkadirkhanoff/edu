<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $courses = Course::factory()->count(1000)->create();

        foreach ($courses as $course) {
            $this->attachThumbnail($course);
            $this->attachCategory($course);
        }
    }

    protected function attachThumbnail(Course $course): void
    {
        $url = 'https://picsum.photos/600/400'; // случайная картинка
        $content = @file_get_contents($url);

        if (!$content) {
            echo "⚠ Не удалось загрузить изображение\n";
            return;
        }

        $uuid = Str::uuid()->toString();
        $filename = "$uuid.jpg";
        $path = "uploads/$filename";

        Storage::disk('public')->put($path, $content);

        File::create([
            'id' => $uuid,
            'path' => $path,
            'type' => 'thumbnail',
            'disk' => 'public',
            'fileable_type' => Course::class,
            'fileable_id' => $course->id,
            'original_name' => $filename,
            'extension' => 'jpg',
            'mime_type' => 'image/jpeg',
            'file_size' => strlen($content),
            'user_id' => 57,
            'uploaded_by' => 57,
        ]);

        echo "✔ Добавлен thumbnail к курсу [{$course->id}] — $filename\n";
    }

    protected function attachCategory(Course $course): void
    {
        $category = Category::whereNotNull('parent_id')->inRandomOrder()->first();

        if (!$category) {
            echo "⚠ Нет категорий с parent_id\n";
            return;
        }

        \DB::table('courses.category_course')->insert([
            'course_id' => $course->id,
            'category_id' => $category->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        echo "✔ Категория {$category->id} привязана к курсу {$course->id}\n";
    }
}
