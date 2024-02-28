<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view("login.show");
    }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'], // Use 'email' from validation
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->route('message.index');
        }

        return back()->withErrors(['login' => 'Username or password is incorrect']);
    }


    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect()->route('login.show');
    }



    public function page1()
    {
        return view("login.page1");
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
