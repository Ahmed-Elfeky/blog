<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('website.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->all();
        
        if ($request->has('logo')) {
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/user'), $imageName);
            $attributes['logo'] = $imageName;
        }
        $attributes['password'] = Hash::make($request->password);
        $user = User::create($attributes);
        event(new Registered($user));

        Auth::login($user);

        return to_route('website.index');
    }
}
