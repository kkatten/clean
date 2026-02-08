<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['key' => 'company_name', 'label' => 'Название компании', 'value' => 'Чистый Киров', 'sort_order' => -10],
            ['key' => 'city', 'label' => 'Город', 'value' => 'Киров', 'sort_order' => -5],
            ['key' => 'phone_main', 'label' => 'Основной телефон', 'value' => '77-62-64', 'sort_order' => 0],
            ['key' => 'phone_alt', 'label' => 'Моб. телефон', 'value' => '+7 (922) 977-62-64', 'sort_order' => 10],
            ['key' => 'telegram', 'label' => 'Telegram', 'value' => 'https://t.me/cleankirov43', 'sort_order' => 20],
            ['key' => 'vk', 'label' => 'VK', 'value' => 'https://vk.ru/clean.kirov', 'sort_order' => 30],
            ['key' => 'address', 'label' => 'Адрес', 'value' => 'ул. Романа Ердякова 50 стр 2', 'sort_order' => 40],
            ['key' => 'map_embed', 'label' => 'Карта (iframe)', 'value' => '', 'sort_order' => 50],
        ];

        foreach ($items as $item) {
            ContactInfo::updateOrCreate(
                ['key' => $item['key']],
                $item
            );
        }
    }
}
