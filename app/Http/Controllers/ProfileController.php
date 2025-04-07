<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Request2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;   
use App\Models\Tour;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form along with booked tours.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $bookedTours = Request2::where('user_id', $user->id)
            ->with('tour')
            ->get();

        // Получаем все доступные туры
        $availableTours = Tour::all();

        return view('profile.edit', [
            'user' => $user,
            'bookedTours' => $bookedTours,
            'availableTours' => $availableTours,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
