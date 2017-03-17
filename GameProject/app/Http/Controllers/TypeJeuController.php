<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeJeu;

class TypeJeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesTypeJeux = TypeJeu::all();
        return view('admin/typeJeu/index')->with('lesTypeJeux',$lesTypeJeux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/typeJeu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unTypeJeu= new TypeJeu();
        $unTypeJeu->titre=$request->get('titre');
        $unTypeJeu->save();
        return redirect(route('typeJeu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unTypeJeu=TypeJeu::find($id);
        return view ('admin/typeJeu/show')->with('unTypeJeu',$unTypeJeu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unTypeJeu=TypeJeu::find($id);
        return view('admin/typeJeu/edit')->with('unTypeJeu',$unTypeJeu);
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
        $unTypeJeu= new TypeJeu;
        $unTypeJeu->titre=$request->get('titre');
        $unTypeJeu->save();
        return redirect (route('typeJeu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesTypeJeux=TypeJeu::destroy($id);
        $request->session()->flash('success', 'le jeu est supprimée');
        return redirect (route('typeJeu.index'));
    }
}
