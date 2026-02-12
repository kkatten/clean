<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Чистый Киров',
                'meta_description' => 'Коммерческий клининг в Кирове',
                'blocks' => [
                    'utp' => [
                        'title' => 'УТП',
                        'text' => 'Коммерческий клининг в Кирове. Свои мощности, без субподряда.',
                    ],
                    'why_us' => [
                        'title' => 'Почему мы',
                        'items' => [
                            'Цех по стирке ковров',
                            'Производство и обслуживание входных ковров',
                            'Оборудование для мойки фасадов до 16 м',
                            'Химчистка мебели',
                        ],
                    ],
                    'for_who' => [
                        'title' => 'Для кого работаем',
                        'items' => ['Торговые центры', 'Офисы и БЦ', 'Бизнес', 'Квартиры'],
                    ],
                ],
                'sort_order' => 0,
            ],
            [
                'slug' => 'about',
                'title' => 'О компании',
                'meta_description' => 'О компании — клининг в Кирове',
                'blocks' => [
                    'who_we_are' => ['title' => 'Кто мы', 'content' => ''],
                    'kirov' => ['title' => 'Работаем в Кирове', 'content' => ''],
                    'capacity' => ['title' => 'Свои мощности', 'content' => 'Цех, оборудование, ковры.'],
                    'no_subcontractors' => ['title' => 'Без субподрядчиков', 'content' => ''],
                ],
                'sort_order' => 10,
            ],
            [
                'slug' => 'for_business',
                'title' => 'Для бизнеса',
                'meta_description' => 'Клининг для ТЦ, БЦ, офисов в Кирове',
                'blocks' => [
                    'intro' => [
                        'content' => 'Работаем с ТЦ, БЦ, офисами. Долгосрочные договоры. Обслуживание входных зон. Фасады и остекление.',
                    ],
                    'cta' => ['text' => 'Получить коммерческое предложение'],
                ],
                'sort_order' => 20,
            ],
            [
                'slug' => 'contacts',
                'title' => 'Контакты',
                'meta_description' => 'Контакты — клининг Киров',
                'blocks' => [],
                'sort_order' => 30,
            ],
        ];

        foreach ($pages as $data) {
            Page::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
