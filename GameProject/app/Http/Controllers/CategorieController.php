<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesCategories=Categorie::paginate(20);     
        return view('admin/categorie/index')->with('lesCategories',$lesCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/categorie/create');
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
            'libelle' => 'required|max:255',
            'tag' => 'required|max:255',  
           
        ]);

        if ($validator->fails()) {
            return redirect('admin/categorie/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $uneCategorie= new Categorie();
            $uneCategorie->libelle=$request->get('libelle');
            $uneCategorie->tag=$request->get('tag');
            $uneCategorie->save();
            $request->session()->flash('success', 'Categorie créée.');
            return redirect (route('categorie.index'));
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
        $uneCategorie=Categorie::find($id);
        return view ('admin/categorie/show')->with('uneCategorie',$uneCategorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uneCategorie=Categorie::find($id);
        return view('admin/categorie/edit')->with('uneCategorie',$uneCategorie);
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
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|max:255',
            'tag' => 'required|max:255',  
           
        ]);

        if ($validator->fails()) {
            return (route('categorie.edit', $id)
                        ->withErrors($validator)
                        ->withInput()
                    );
        }
        else
        {
            $uneCategorie = Categorie::find($id);
            $uneCategorie->libelle=$request->get('libelle');
            $uneCategorie->tag=$request->get('tag');
            $uneCategorie->update();
            $request->session()->flash('success', 'Categorie modifiée.');
            return redirect (route('categorie.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Categorie::destroy($id);
        $request->session()->flash('success', 'Categorie supprimée.');
        return redirect (route('categorie.index'));
    }
}
