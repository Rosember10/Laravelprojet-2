<?php

namespace App\Http\Controllers;

use App\Models\Etudient;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $etudients=Etudient::select()
        ->orderBy('adresse','asc')
        ->paginate(25);

        
      
        return view('site.index',['etudients'=>$etudients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ville = Ville::all();

        return view('site.create',['villes'=>$ville]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      


        $nouvelleEtudient = Etudient::create([
            'nom'            => $request->nom,
            'adresse'        => $request->adresse,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id'       => $request->ville_id,
        ]);
        return redirect(route('etudient.show',$nouvelleEtudient->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function show(Etudient $etudient)
    {
        return view('site.show',['etudient'=>$etudient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudient $etudient)
    {
        $ville = Ville::all();
        return view('site.edit',['etudient'=>$etudient, 'villes'=>$ville]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudient $etudient)
    {
       $etudient->update([
            'nom'           =>$request->nom,
            'adresse'       =>$request->adresse,
            'phone'         =>$request->phone,
            'email'         =>$request->email,
            'date_naissance'=>$request->date_naissance,
            'ville_id'      =>$request->ville_id,
       ]);
        return redirect(route('etudient.show',$etudient->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudient $etudient)
    {
        $etudient->delete();
        return redirect(route('etudient.index'));
    }
}
