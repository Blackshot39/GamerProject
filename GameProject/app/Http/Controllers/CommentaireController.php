<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $lesCommentaires=Commentaire::all();
        return view('admin/commentaire/home')->with('lesCommentaires',$lesCommentaires);
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
            'description' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return redirect('commentaire/create')
                        ->withErrors($validator)
                        ->withInput();
                    }

        $unCom= new Commentaire();
         $unCom->description=$request->get('description');
         $unCom->save();
         $request->session()->flash('success', 'Le Commentaire a été créee !');
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
          $unCom=Commentaire::find($id);
        return view('admin/commentaire/show',compact('unCom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $unCom=Commentaire::find($id);
        return view('admin/commentaire/edit',compact('unCom'));
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
            'description' => 'required|max:250',
        ]);

        if ($validator->fails()) {
            return redirect('commentaire/'.$id.'/edit/')
                        ->withErrors($validator)
                        ->withInput();
                    }

        $unCom=Commentaire::find($id);
         $unCom->description=$request->get('description');
         $unCom->save();
         $request->session()->flash('success', 'Le commentaire a été modifiée !');
        return redirect(route('commentaire.index'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $unCom=Commentaire::destroy($id);
        $request->session()->flash('success', 'Le Commentaire est supprimée !');
        return redirect(route('commentaire.index'));
    }
}
