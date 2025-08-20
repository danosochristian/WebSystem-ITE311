<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Homepage
    public function index(): string
    {
        return view('home');  // loads app/Views/home.php
    }

    // About Page
    public function about(): string
    {
        return view('about'); // loads app/Views/about.php
    }

    // Contact Page
    public function contact(): string
    {
        return view('contact'); // loads app/Views/contact.php
    }
}
