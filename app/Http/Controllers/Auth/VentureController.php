<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Ventures;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class VentureController extends Controller
{
    /**
     * Display the form view.
     */

    public function viewuser(): View
    {
        $ventures = Ventures::where('post_status', '=', 'active')->get();
    
        return view('userventurepage', compact('ventures'));
    }

    public function viewadmin(): View
    {
        $ventures = Ventures::where('post_status', '=', 'active')->get();
    
        return view('adminventurepage', compact('ventures'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500']
        ]);

        $user = User::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
