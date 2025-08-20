<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('template'); // loads template.php in app/Views
    }
}
