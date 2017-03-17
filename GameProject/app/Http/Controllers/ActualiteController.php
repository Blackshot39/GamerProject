<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Actualite;
use App\Models\Categorie;
use App\Models\Commentaire;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesActualites=Actualite::all();
        return view('admin/actualite/index')->with('lesActualites',$lesActualites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/actualite/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $uneActualite= new actualite;
        $uneActualite->libelle=$request->get('libelle');
        $uneActualite->tag=$request->get('tag');
        $uneActualite->save();
        return redirect (route('actualite.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uneActualite=Actualite::find($id);
        return view ('admin/actualite/show')->with('uneActualite',$uneActualite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $uneActualite=Actualite::find($id);
        return view('admin/actualite/edit')->with('uneActualite',$uneActualite);
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
        $uneActualite=Actualite::find($id);
        $uneActualite->libelle=$request->get('libelle');
        $uneActualite->tag=$request->get('tag');
        $uneActualite->update();
        return redirect (route('actualite.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actualite::destroy($id);
        $request->session()->flash('success', 'l actualité est supprimée');
        return redirect (route('actualite.index'));
    }
}
