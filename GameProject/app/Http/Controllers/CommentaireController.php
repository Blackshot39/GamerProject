<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Http\Requests;
use Validator;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesCommentaires=Commentaire::paginate(20);
        return view('admin/commentaire/index')->with('lesCommentaires',$lesCommentaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin/commentaire/create');
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
            'description' => 'required|max:65532',
        ]);

        if ($validator->fails()) {
            return redirect('admin/commentaire/create')
                        ->withErrors($validator)
                        ->withInput();
                    }

         $unCommentaire= new Commentaire();
         $unCommentaire->description=$request->get('description');
         //
         //Comment faire pour que le commentaire soit associé soit à un sujet, soit à une actualité (et pas aux deux)!
         //
         
         $unCommentaire->users()->associate(Auth::user()->id);
         $unCommentaire->save();
         $request->session()->flash('success', 'Commentaire ajouté !');
        return redirect(route('commentaire.index'));
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
          $unCommentaire=Commentaire::find($id);
        return view('admin/commentaire/show',compact('unCommentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $unCommentaire=Commentaire::find($id);
        return view('admin/commentaire/edit',compact('unCommentaire'));
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
            'description' => 'required|max:65532',
        ]);

        if ($validator->fails()) {
            return (route('commentaire.edit', $id)
                        ->withErrors($validator)
                        ->withInput()
                    );
                    }

        $unCommentaire=Commentaire::find($id);
         $unCommentaire->description=$request->get('description');
         $unCommentaire->update();
         $request->session()->flash('success', 'Commentaire  modifiée !');
        return redirect(route('commentaire.index'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Commentaire::destroy($id);
        $request->session()->flash('success', 'Commentaire supprimée !');
        return back();
    }
}
