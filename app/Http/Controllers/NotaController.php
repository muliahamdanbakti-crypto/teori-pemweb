<?php

namespace App\Http\Controllers;

class NotaController extends Controller
{
    public function show($nomor)
    {
        return "Nota #$nomor";
    }
}
