<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    //
    public function index()
    {
        return view('pages.dosen.index');
    }

    public function perbadingan()
    {
        return view('pages.dosen.perbandingan');
    }
}
