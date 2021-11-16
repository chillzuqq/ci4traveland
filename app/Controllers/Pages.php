<?php
//XII RPL B_09_Faiq Varian

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Traveland'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us | Traveland'
        ];
        return view('pages/about', $data);
    }

    public function contacts()
    {
        $data = [
            'title' => 'Contact Us | Traveland',
            'contacts' => [
                [
                    'city' => 'Jakarta',
                    'phone' => '8944686',
                    'address' => 'Setiabudi, Jakarta Pusat'
                ],
                [
                    'city' => 'Bandung',
                    'phone' => '8946488',
                    'address' => 'Cipaganti, Bandung'
                ]
            ]
        ];
        return view('pages/contacts', $data);
    }
}
