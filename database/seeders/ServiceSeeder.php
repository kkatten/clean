<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['slug' => 'kommercheskiy-klining', 'title' => 'Коммерческий клининг', 'sort_order' => 0],
            ['slug' => 'uborka-ofisov', 'title' => 'Уборка офисов', 'sort_order' => 10],
            ['slug' => 'uborka-torgovyh-tsentrov', 'title' => 'Уборка торговых центров', 'sort_order' => 20],
            ['slug' => 'uborka-kvartir', 'title' => 'Уборка квартир', 'sort_order' => 30],
            ['slug' => 'generalnaya-uborka', 'title' => 'Генеральная уборка', 'sort_order' => 40],
            ['slug' => 'podderzhivayuschaya-uborka', 'title' => 'Поддерживающая уборка', 'sort_order' => 50],
            ['slug' => 'moyka-fasadov', 'title' => 'Мойка фасадов (до 16 м)', 'sort_order' => 60],
            ['slug' => 'moyka-ostekleniya', 'title' => 'Мойка остекления', 'sort_order' => 70],
            ['slug' => 'himchistka-mebeli', 'title' => 'Химчистка мебели', 'sort_order' => 80],
            ['slug' => 'gryazezashchitnye-kovry', 'title' => 'Грязезащитные ковры (изготовление, аренда, обслуживание)', 'sort_order' => 90],
        ];

        foreach ($services as $i => $data) {
            Service::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, [
                    'short_description' => 'Описание услуги «' . $data['title'] . '».',
                    'description' => 'Что делаем: полный комплекс работ по направлению.',
                    'for_who' => 'Для юридических и физических лиц в Кирове.',
                    'what_included' => ['Выезд/осмотр', 'Договор', 'Выполнение работ', 'Контроль качества'],
                    'icon' => null,
                    'is_active' => true,
                ])
            );
        }
    }
}
