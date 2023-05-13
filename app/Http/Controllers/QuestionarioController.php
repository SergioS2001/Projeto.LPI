<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionario = User::paginate();
    return view('questionário.index', compact('questionario'));
    }

    public function store(Request $request)
    {
    }

}
