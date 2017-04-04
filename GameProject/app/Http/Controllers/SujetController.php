<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sujet;
use Validator;
use App\Models\Jeu;
use App\Models\Poste;
use Illuminate\Support\Facades\Auth;


class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesSujets=Sujet::paginate(20);
        return view('front/sujet/index', compact('lesSujets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesJeux = Jeu::orderBy('nom')->pluck('nom', 'id');
        return view('front/sujet/create', compact('lesJeux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|max:255',
              
           
        ]);

        if ($validator->fails()) {
            return redirect('front/sujet/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            
         $unSujet= new Sujet();
         $unSujet->titre=$request->get('titre'); 
         $unSujet->jeu_id = $request->get('jeu'); 
         $unSujet->save();         
         $unPoste = New Poste();
         $unPoste->description = $request->get('desc');
         $unPoste->sujet_id = $unSujet->id;
         $unPoste->user_id = Auth::id();   
         $unPoste->signale=false;
         $unPoste->save();
         $request->session()->flash('success', 'Sujet crée.');
        return redirect(route('sujet.show', $unSujet->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unSujet=Sujet::find($id);
        //$lesPostes = $unSujet::orderBy('id')->paginate(10);
        return view('front/sujet/show', compact ('unSujet'/*, 'lesPostes'*/));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $unSujet=Sujet::find($id);
        return view('admin/sujet/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                 $unSujet=Sujet::find($id);
         $unSujet->titre=$request->get('titre');
         $unSujet->save();
         $request->session()->flash('success', 'La Copropriete a été modifiée !');
         return redirect(route('sujet.index'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $unSujet=Sujet::find($id);
        $unSujet->save();
        $request->session()->flash('success', 'La Copropriete a été supprimée !');
        return redirect(route('sujet.index'));
    }
}
