<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Ville;
use App\Models\Article;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ville = Ville::all();

        return view('auth.create',['villes'=>$ville]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'name'=> 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'adresse' => 'required',
            'phone'=> 'required|numeric|min:10',
            'date_naissance'=> 'required|date'   

        ]);


        $user = new user;
        $user->fill($request->all());
        $user->password = hash::make($request->password); 
        $user->save();
        
       
        $nouvelleEtudient = Etudient::create([
            'id'             => $user->id,
            'adresse'        => $request->adresse,
            'phone'          => $request->phone,
            'date_naissance' => $request->date_naissance,
            'ville_id'       => $request->ville_id,
        ]);

        

        return redirect(route('login'))  ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    /**
     * Authentication d'utilisateur 
     */
    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users', 
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');
       
        if (!Auth::validate($credentials)) :
            return redirect(route('login'))->withErrors(trans('auth.failed'))->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));
        
        return redirect()->intended('dashboard')->withSuccess('Signed in');
    }

    /**
     * gerer dashboard
     */
    public function dashboard()
    {

        if (Auth::check()) {
      
            return view('dashboard');
           
        }
        return redirect(route('login'))->withErrors('vous n\'êtes pas autorise');
    }
    /**
     * fonction de logout d'un utilisateur
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }






}
