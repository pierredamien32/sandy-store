<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superAdmin/addAdmin');
    }

    public function homeAdmin(){
        return view('admin/homeAdmin');
    }

    public function homeSuperAdmin(){

        $utilisateurs = User::all();
        
        // dd('Mes users '.$utilisateurs);
        return view('superAdmin.homeSuperAdmin', compact('utilisateurs'));
    }

    public function createFormLogin(){
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reponse = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user) {
            // L'utilisateur existe déjà dans la base de données
            // Gérer l'erreur ou afficher un message d'erreur approprié

            return redirect()->back()->withErrors(['email' => 'Cette adresse e-mail est déjà utilisée.'])->withInput();
        } else {
            // L'utilisateur n'existe pas dans la base de données, vous pouvez le créer
            $user = User::create([
                'name' => $request->name,
                'email' => $email,
                'password' => Hash::make($request->password),
                'role_id' => 2
            ]);

            //  Auth::login($user);
            return redirect()->route('homeSuperAdmin');
        }
    }

    public function loginUsers(Request $request)
    {
        $request->session()->flush();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $verifiUser = User::where('id', $user->id)->first();


            session(['name' => $verifiUser->name,
                    'email' => $verifiUser->email,
            ]);
            Session::put('user_name', $verifiUser->name);
            Session::put('user_email', $verifiUser->email);
             Auth::loginUsingId($user->id);
            // dd('La vérification '.$ok);
            return redirect()->intended(
                Auth::user()->role->id == 1 ? route('homeSuperAdmin') : route('homeAdmin.index')
            );
        }

        return back()->withErrors([
            'erreur' => 'Identifiants incorrects.',
        ])->onlyInput('erreur');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flush();

        return redirect()->route('createFormLogin');
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
