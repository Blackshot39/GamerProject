<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    
     public function __construct()
    {
       
      $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
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
                $unCommentaire = Commentaire::find($id);
        if (Auth::user()->id == $unCommentaire->user->id || Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
        {
             
                return view('front/commentaire/edit', compact('unCommentaire'));
        }
        else
        {
            if ($request->ajax())
                {
                        return response('Unauthorized.', 401);
                }
                else
                {
                        $request->session()->flash('error', "Vous n'avez pas les droits nécessaire: vous devez être administrateur ou modérateur !");                         return back();
                       
                }
               
           
        }
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
            'commentaire' => 'required|max:65532|min:20',
        ]);

        if ($validator->fails()) {
            return redirect(route('commentaire.edit', $id))
                        ->withErrors($validator)
                        ->withInput();
                    }

         $unCommentaire= Commentaire::find($id);
         $unCommentaire->description=$request->get('commentaire');         
         
         
         $unCommentaire->update();
         $request->session()->flash('success', 'Le commentaire a été modifié.');
        return redirect(route('actualite.showFront', $unCommentaire->actualite_id));
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
    
      public function storeFront($idActu, Request $request)
    {
            $validator = Validator::make($request->all(), [
            'commentaire' => 'required|max:65532|min:20',
        ]);

        if ($validator->fails()) {
            return redirect(route('actualite.showFront', $idActu))
                        ->withErrors($validator)
                        ->withInput();
                    }

         $unCommentaire= new Commentaire();
         $unCommentaire->description=$request->get('commentaire');
         $unCommentaire->signale = false;
         $unCommentaire->actualite_id = $idActu;
         $unCommentaire->user()->associate(Auth::user()->id);
         //dd($unCommentaire);
         $unCommentaire->save();
         $request->session()->flash('success', 'Votre commentaire a bien été posté !');
        return redirect(route('actualite.showFront', $idActu));
    }
}
