<?php

namespace App\Http\Controllers;
use App\Models\Jeu;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesJeux = Jeu::all();
        return view('admin/jeu/index')->with('lesJeux',$lesJeux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jeu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unJeu= new Jeu();
        $unJeu->nom=$request->get('nom');
        $unJeu->description=$request->get('description');
        $unJeu->dateSortie=$request->get('dateSortie');
        //
        //mettre function pour image (jerome)
        //
        $unJeu->save();
        return redirect(route('jeu.index'));
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $unJeu=Jeu::find($id);
        return view ('admin/jeu/show')->with('unJeu',$unJeu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $unJeu=Jeu::find($id);
        return view('admin/jeu/edit')->with('unJeu',$unJeu);
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
        $unJeu= Jeu::find($id);
        $unJeu->nom=$request->get('nom');
        $unJeu->description=$request->get('description');
        $unJeu->dateSortie=$request->get('dateSortie');
        //PHOTO
        $unJeu->update();
        return redirect (route('jeu.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Jeu::destroy($id);
        $request->session()->flash('success', 'le jeu est supprimée');
        return redirect (route('jeu.index'));
    }
}
