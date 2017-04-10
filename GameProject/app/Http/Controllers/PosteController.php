<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poste;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class PosteController extends Controller
{
    
    public function __construct()
    {
       
      $this->middleware('auth');
    }

    
    
    public function repondre($sujetId, Request $request)
    {
        // repondre a un sujet
        $validator = Validator::make($request->all(), [
            'desc' => 'required|max:65535|min:10',
            
            
        ]);

        if ($validator->fails()) {
             return redirect(route('sujet.show', $sujetId))
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
        $unPoste = new Poste();
        $unPoste->description = $request->get('desc');
         $unPoste->sujet_id = $sujetId;
         $unPoste->user_id = Auth::id();   
         $unPoste->signale=false;
         $unPoste->save();
         $request->session()->flash('success', 'Votre message a bien été posté.');
        return redirect(route('sujet.show', $sujetId));
        }
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        
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
    public function edit($id, Request $request)
    {
        //
        $poste = Poste::find($id);
        if (Auth::user()->id == $poste->user->id || Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
        {
             
                return view('front/poste/edit', compact('poste'));
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
        //
          $validator = Validator::make($request->all(), [
            'desc' => 'required|max:65535|min:10',
            
            
        ]);

        if ($validator->fails()) {
             return redirect(route('poste.edit', $id))
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $unPoste = Poste::find($id);
            $unPoste->description = $request->get('desc');   
            $unPoste->update();
            $request->session()->flash("success","Poste édité avec succès.");
            return redirect(route('sujet.show', $unPoste->sujet_id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function signaler($id)
    {
        $unPoste = Poste::find($id);
        $unPoste->signale = true;
        // l'utilisateur qui a signalé
        $userSignalement = User::find(Auth::id);
        // Faire une page ou il y a tout les postes signaler avec btn pour edit poste / annuler le signalement
        // quoi que = obligerai a faire un modele (et relation) + controller signalement
        
    }
}
