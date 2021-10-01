<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registers\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(StoreRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->addMediaFromRequest('image')->toMediaCollection();
        return redirect()->route('login');
    }
}
