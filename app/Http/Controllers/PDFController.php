<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\dataKrs;

class PDFController extends Controller
{
    //

    public function index()
    {
        $nim = Auth::user()->username;
        $query = dataKrs::where(['nim' => $nim])->get();
        $krs = ['data'=>$query];

        $pdf = PDF::loadView('cetakkrs', $krs);
        return $pdf->download('cetakkrs.pdf');
    }
}
