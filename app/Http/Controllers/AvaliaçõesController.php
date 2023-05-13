<?php

namespace App\Http\Controllers;

use App\Models\Avaliações;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvaliaçõesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliações = Avaliações::all();
        return view('avaliações.index', compact('avaliações'));
    }

}
