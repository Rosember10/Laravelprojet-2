<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repertoires = new Repertoire;
        $repertoires = $repertoires->selectRepertoire();
      


        return view('repertoires.index',['repertoires'=>$repertoires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertoires.create');
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
                'title_fr' => 'required',
                'title'=> 'required',
                'repertoire_url'=> 'file|required|mimes:docx,doc,zip,pdf'
        ]);
        

        if($request->hasFile('repertoire_url'))
        {
            $destination_path = 'public/repertoires';
            $repertoire = $request->file('repertoire_url');
            $repertoire_name= $repertoire->getClientOriginalName();
            $path = $request->file('repertoire_url')->storeAs($destination_path,$repertoire_name);
        }
        
        $nouveauRepertoire = Repertoire::create([
            'title'          => $request->title,
            'title_fr'       => $request->title_fr,
            'repertoire_url' => $repertoire_name,
            'user_id'        => Auth::user()->id,
            'date'           => Carbon::today()

        ]);


       
        return redirect(route('repertoires.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        //
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showRepertoires(Repertoire $repertoire)
    {
       //$lesRepertoires = Repertoire::select()->where('user_id',Auth::user()->id)->paginate(2);

        $lesRepertoires = New Repertoire;
        $lesRepertoires = $lesRepertoires->selectMesRepertoire();

       

       
            return view('repertoires.show-repertoires',['repertoires'=>$lesRepertoires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
 
        return view('repertoires.edit',['repertoire'=>$repertoire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {
        $request->validate([
            'title_fr' => 'required',
            'title'=> 'required'
        ]);

    
        $repertoire->update([

            'title_fr' => $request->title_fr,
            'title' => $request->title

        ]);

     

        return redirect(route('repertoires.show'));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        //
    }

     /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function download ($repertoire)
    {
      
        $pathRepertoire = storage_path('app/public/repertoires/'. $repertoire);
        if(file_exists($pathRepertoire))
        {
            return response()->download($pathRepertoire);
        } else {
            abort(404);
        }
       
    }
     /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function delete($path ,Repertoire $repertoire)
    {
        $repertoire->delete();
        $pathRepertoire = storage_path('app/public/repertoires/'. $path);
        if(file_exists($pathRepertoire)){
            unlink($pathRepertoire);
        }
        return redirect(route('repertoires.index'));
       
    }



}
