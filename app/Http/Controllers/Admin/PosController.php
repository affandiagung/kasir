<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Merek;
use App\Models\TTipe;
use App\Models\Ukuran;

class PosController extends Controller
{
    public function index()
    {
        $data['ukuran']  = Ukuran::all();
        $data['merek']  = Merek::all();
        $data['tipe']  = TTipe::all();
        return view('admin.pos.index', $data);
    }
}
