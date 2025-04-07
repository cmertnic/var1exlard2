<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tours = Tour::paginate(10); 

        return view('main', compact('tours')); 
    }
}