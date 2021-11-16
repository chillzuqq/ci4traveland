<?php
//XII RPL B_09_Faiq Varian

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function coba()
    {
        return $this->nama;
    }
}
