<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Redirect to the desired Filament page URL
        return app(FilamentController::class)->index();
    }
}
