<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Actualite;
use App\Models\Categorie;

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
        return view ('admin/actualite/show')->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $uneActualite=actualite::find($id);
        return view('admin/actualite/update')->with('uneActualite',$uneActualite);
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
        $uneActualite= new actualite;
        $uneActualite->libelle=$request->get('libelle');
        $uneActualite->tag=$request->get('tag');
        $uneActualite->save();
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
        $lesActualites=actualite::destroy($id);
        $request->session()->flash('success', 'l actualit� est supprim�e');
    return redirect (route('actualite.index'));
    }
}
