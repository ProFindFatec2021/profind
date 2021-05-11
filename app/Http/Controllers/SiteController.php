<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('site.index', ['categorias' => $categorias]);
    }
}
