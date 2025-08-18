<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    protected array $locales = ['uz', 'ru', 'en'];

    public function run(): void
    {
        $data = [
            [
                'key'   => 'programming',
                'titles'=> [
                    'uz' => 'Dasturlash',
                    'ru' => 'Программирование',
                    'en' => 'Programming',
                ],
                'children' => [
                    ['key' => 'php',    'titles' => ['uz'=>'PHP','ru'=>'PHP','en'=>'PHP']],
                    ['key' => 'js',     'titles' => ['uz'=>'JavaScript','ru'=>'JavaScript','en'=>'JavaScript']],
                    ['key' => 'python','titles' => ['uz'=>'Python','ru'=>'Python','en'=>'Python']],
                    ['key' => 'java',   'titles' => ['uz'=>'Java','ru'=>'Java','en'=>'Java']],
                    ['key' => 'csharp', 'titles' => ['uz'=>'C#','ru'=>'C#','en'=>'C#']],
                ],
            ],
            [
                'key'   => 'data-science',
                'titles'=> [
                    'uz' => 'Maʼlumotlar fanlari',
                    'ru' => 'Наука о данных',
                    'en' => 'Data Science',
                ],
                'children' => [
                    ['key' => 'machine-learning', 'titles' => ['uz'=>'Mashina o‘rganish','ru'=>'Машинное обучение','en'=>'Machine Learning']],
                    ['key' => 'deep-learning',    'titles' => ['uz'=>'Chuqurlik o‘rganish','ru'=>'Глубокое обучение','en'=>'Deep Learning']],
                    ['key' => 'nlp',              'titles' => ['uz'=>'NLP','ru'=>'NLP','en'=>'Natural Language Processing']],
                    ['key' => 'computer-vision',  'titles' => ['uz'=>'Kompyuter ko‘rishi','ru'=>'Компьютерное зрение','en'=>'Computer Vision']],
                ],
            ],
            [
                'key'   => 'web-development',
                'titles'=> [
                    'uz' => 'Veb‑rivojlanish',
                    'ru' => 'Веб‑разработка',
                    'en' => 'Web Development',
                ],
                'children' => [
                    ['key' => 'frontend', 'titles' => ['uz'=>'Frontend','ru'=>'Фронтенд','en'=>'Frontend']],
                    ['key' => 'backend',  'titles' => ['uz'=>'Backend','ru'=>'Бэкенд','en'=>'Backend']],
                    ['key' => 'fullstack','titles' => ['uz'=>'Full‑stack','ru'=>'Фулл‑стек','en'=>'Full‑stack']],
                    ['key' => 'devops',   'titles' => ['uz'=>'DevOps','ru'=>'DevOps','en'=>'DevOps']],
                ],
            ],
            [
                'key'   => 'design',
                'titles'=> [
                    'uz' => 'Dizayn',
                    'ru' => 'Дизайн',
                    'en' => 'Design',
                ],
                'children' => [
                    ['key' => 'graphic-design', 'titles' => ['uz'=>'Grafik dizayn','ru'=>'Графический дизайн','en'=>'Graphic Design']],
                    ['key' => 'ui-ux',          'titles' => ['uz'=>'UI/UX dizayn','ru'=>'UI/UX дизайн','en'=>'UI/UX Design']],
                    ['key' => 'motion',         'titles' => ['uz'=>'Motion dizayn','ru'=>'Motion дизайн','en'=>'Motion Design']],
                    ['key' => 'product-design', 'titles' => ['uz'=>'Produkt dizayn','ru'=>'Продуктовый дизайн','en'=>'Product Design']],
                ],
            ],
            [
                'key'   => 'marketing',
                'titles'=> [
                    'uz' => 'Marketing',
                    'ru' => 'Маркетинг',
                    'en' => 'Marketing',
                ],
                'children' => [
                    ['key' => 'digital-marketing', 'titles' => ['uz'=>'Raqamli marketing','ru'=>'Цифровой маркетинг','en'=>'Digital Marketing']],
                    ['key' => 'seo',               'titles' => ['uz'=>'SEO','ru'=>'SEO','en'=>'SEO']],
                    ['key' => 'content-marketing', 'titles' => ['uz'=>'Kontent marketing','ru'=>'Контент‑маркетинг','en'=>'Content Marketing']],
                    ['key' => 'smm',               'titles' => ['uz'=>'SMM','ru'=>'SMM','en'=>'Social Media Marketing']],
                ],
            ],
            [
                'key'   => 'business',
                'titles'=> [
                    'uz' => 'Biznes',
                    'ru' => 'Бизнес',
                    'en' => 'Business',
                ],
                'children' => [
                    ['key' => 'entrepreneurship','titles'=>['uz'=>'Tadbirkorlik','ru'=>'Предпринимательство','en'=>'Entrepreneurship']],
                    ['key' => 'management',    'titles'=>['uz'=>'Boshqaruv','ru'=>'Менеджмент','en'=>'Management']],
                    ['key' => 'finance',       'titles'=>['uz'=>'Moliyaviy','ru'=>'Финансы','en'=>'Finance']],
                    ['key' => 'leadership',    'titles'=>['uz'=>'Liderlik','ru'=>'Лидерство','en'=>'Leadership']],
                ],
            ],
        ];

        foreach ($data as $raw) {
            $parent = Category::create(
                $this->titles($raw['titles']) + ['slug' => $raw['key']]
            );

            foreach ($raw['children'] as $child) {
                Category::create(
                    $this->titles($child['titles']) + [
                        'parent_id' => $parent->id,
                        'slug'      => $child['key'],
                    ]
                );
            }
        }
    }

    protected function titles(array $titles): array
    {
        return collect($this->locales)
            ->mapWithKeys(fn ($lang) => ["title_{$lang}" => $titles[$lang] ?? null])
            ->toArray();
    }
}
