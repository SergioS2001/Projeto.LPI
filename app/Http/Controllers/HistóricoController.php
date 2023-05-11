<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orientação_Estagios;
use Illuminate\Http\Request;

class HistóricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histórico = Orientação_Estagios::paginate();
        return view('histórico.index', compact('histórico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    
}
