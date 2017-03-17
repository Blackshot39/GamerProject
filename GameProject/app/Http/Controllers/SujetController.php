<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $lesSujets=Sujet::all();
        return view('admin/sujet/home')->with('lesSujets',$lesSujets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/sujet/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                 $unSujet= new Sujet();
         $unSujet->nom=$request->get('titre');
         $unSujet->save();
         $request->session()->flash('success', 'Le Sujet a été crée !');
        return redirect(route('sujet.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
