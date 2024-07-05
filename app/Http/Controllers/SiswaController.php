<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //#1 membuat controller pertama dibuat
    // #2 membuat function
    function index(){
        // #3 membuat return
        return '<h1>Saya siswa dari controller</h1>';
    }
    function detail($id){
        return '<h1>Saya siswa dari controller dengan id $id</h1>';
    }
}
