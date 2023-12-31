<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function loginForm(){
        $title = 'Login';
        return view('users.login', compact('title'));
    }

    public function login(Request $request){
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(auth()->attempt($user)){
            $request->session()->regenerate();
            return redirect('/vehicules')->with('success',"l'utilisateur s'est connecté avec succès");
        }
        return back()->with('error','les données incorrect');
    }

    public function logOut(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/vehicules')->with('success',"déconnexion de l'utilisateur avec succès");
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
