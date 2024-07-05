<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //membuat fungsi
    function index()
    {
        return view("halaman/index");
    }
    function tentang()
    {
        return view("halaman/tentang");
    }
    function kontak()
    {
        $data = [
            'judul' => 'Ini Adalah Halaman Kontak',
            'kontak' => [
                'email' => 'tuluscodeportofolio@gmail.com',
                'youtube' => 'TulusPortofolio'
            ]
        ];
        return view("halaman/kontak")->with($data);
    }
}
