<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function design()
    {
        return view('pages.design');
    }

    public function automation()
    {
        return view('pages.automation');
    }

    public function arvr()
    {
        return view('pages.arvr');
    }

    public function vacancies()
    {
        return view('pages.vacancies');
    }

    public function projects()
    {
        return view('pages.projects');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }
}
