<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sujet;
use Validator;

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
        return view('front/sujet/create');
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
            return redirect('admin/sujet/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
         $unSujet= new Sujet();
         $unSujet->titre=$request->get('titre');
         //ajouter le 1er commentaire
         $unSujet->save();
         $request->session()->flash('success', 'Sujet crée.');
        return redirect(route('sujet.index'));
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
        return view('admin/sujet/show');
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
