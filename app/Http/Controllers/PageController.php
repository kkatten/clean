<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::findBySlug('about');
        if ($page) {
            $blocks = $page->blocks ?? [];
            if (empty($blocks)) {
                $page->blocks = [
                'hero_intro_1' => 'Клининговая компания полного цикла в Кирове. Работаем с коммерческими и частными клиентами — от регулярной уборки до мойки фасадов и химчистки.',
                'hero_intro_2' => 'Собственные мощности, без субподрядчиков. Адрес: ул. Романа Ердякова 50 стр 2.',
                'who_we_are' => [
                    'title' => 'Кто мы',
                    'items' => [
                        ['title' => 'Клининг полного цикла', 'description' => 'Работаем в Кирове с коммерческими и частными клиентами. От пола внутри до фасада снаружи — регулярная уборка, мойка остекления, химчистка ковров и мебели, грязезащитные покрытия. Весь город в зоне досягаемости.'],
                        ['title' => 'Без субподрядчиков', 'description' => 'Собственные бригады и техника. Цех по стирке ковров, производство и обслуживание входных ковров, оборудование для мойки фасадов до 16 м. Закрываем клининг под ключ — один подрядчик, предсказуемый результат.'],
                        ['title' => 'Работаем в Кирове', 'description' => 'ул. Романа Ердякова 50 стр 2. Обслуживаем торговые центры, офисы, БЦ, квартиры — весь город в зоне досягаемости. Индивидуальный подход, долгосрочные договоры.'],
                    ],
                ],
                ];
            } elseif (!empty($blocks['image'])) {
                $page->blocks = array_merge($blocks, [
                    'image_url' => rtrim(url('/'), '/') . '/storage/' . ltrim(str_replace('\\', '/', $blocks['image']), '/'),
                ]);
            }
        }

        return view('pages.about', compact('page'));
    }

    public function forBusiness()
    {
        $page = Page::findBySlug('for_business');

        return view('pages.for_business', compact('page'));
    }

    public function contacts()
    {
        $page = Page::findBySlug('contacts');
        $contactInfos = \App\Models\ContactInfo::getAllCached();

        return view('pages.contacts', compact('page', 'contactInfos'));
    }

    public function privacy()
    {
        return view('pages.documents.privacy');
    }

    public function terms()
    {
        return view('pages.documents.terms');
    }

    public function personalData()
    {
        return view('pages.documents.personal_data');
    }

    public function documentContent(string $type)
    {
        $view = 'pages.documents._' . $type . '_content';

        return response()->view($view)->header('Content-Type', 'text/html; charset=UTF-8');
    }
}
