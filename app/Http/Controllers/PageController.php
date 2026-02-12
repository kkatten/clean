<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
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
}
