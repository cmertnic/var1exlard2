<?php

namespace App\Http\Controllers;

use App\Models\Request2;
use App\Models\Tour;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    public function adminIndex(Request $request)
    {
        if (!$this->isAdmin()) {
            abort(403, 'Недостаточно полномочий для доступа к этой странице.');
        }
    
        // Получаем все туры
        $tours = Tour::all();
    
        // Получаем все заявки, отфильтровав по tour_id, если он указан
        $request2s = Request2::with(['user', 'tour'])
            ->when($request->tour_id, function ($query) use ($request) {
                return $query->where('tour_id', $request->tour_id);
            })
            ->paginate(10);
    
        return view('admin', compact('request2s', 'tours'));
    }
    
    
    public function index()
    {
        $request2s = Request2::where('user_id', Auth::id())->paginate(10);
        return view('main', ['request2s' => $request2s]); 
    }

    public function create($tourId)
    {
        $tours = Tour::all();
        $selectedTour = Tour::findOrFail($tourId);
    
        return view('request', compact('tours', 'selectedTour'));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|integer|min:1', 
            'cost' => 'required|numeric', 
            'tour_id' => 'required|exists:tours,id',
        ]);
    
        Request2::create([
            'number' => $data['number'],
            'cost' => $data['cost'],
            'tour_id' => $data['tour_id'],
            'user_id' => Auth::id(), 
        ]);
    
        Log::info('Request created successfully.');
    
        return redirect('/')->with('message', 'Создание заявки успешно!');
    }
}