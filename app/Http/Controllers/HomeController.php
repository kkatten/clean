<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::findBySlug('home');
        $services = Service::ordered()->get();

        return view('home', compact('page', 'services'));
    }
}
