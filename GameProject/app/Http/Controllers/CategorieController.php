<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Actualite;
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
        $lesCategories=Categorie::all();
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
        $uneCategorie= new actualite;
        $uneCategorie->libelle=$request->get('libelle');
        $uneCategorie->tag=$request->get('tag');
        $uneCategorie->save();
        return redirect (route('categorie.index'));
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
        $uneCategorie= new actualite;
        $uneCategorie->libelle=$request->get('libelle');
        $uneCategorie->tag=$request->get('tag');
        $uneCategorie->update();
        return redirect (route('categorie.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::destroy($id);
        $request->session()->flash('success', 'la categorie est supprimée');
        return redirect (route('categorie.index'));
    }
}
