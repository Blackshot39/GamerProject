<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TypeJeu;
use Validator;
use Illuminate\Support\Facades\DB;

class TypeJeuController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesTypeJeux = TypeJeu::all();
        return view('admin/typeJeu/index')->with('lesTypeJeux',$lesTypeJeux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/typeJeu/create');
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
            'titre' => 'required'
           
        ]);

        if ($validator->fails()) {
            return redirect('admin/typeJeu/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
        $unTypeJeu= new TypeJeu();
        $unTypeJeu->titre=$request->get('titre');
        $unTypeJeu->save();
        return redirect(route('typejeu.index'));
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
        $unTypeJeu=TypeJeu::find($id);
        return view ('admin/typeJeu/show')->with('unTypeJeu',$unTypeJeu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unTypeJeu=TypeJeu::find($id);
        return view('admin/typeJeu/edit')->with('unTypeJeu',$unTypeJeu);
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
        $unTypeJeu= TypeJeu::find($id);
        $unTypeJeu->titre=$request->get('titre');
        $unTypeJeu->update();
        return redirect (route('typejeu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        TypeJeu::destroy($id);
        $request->session()->flash('success', 'Le type a été supprimé.');
        return back();
    }
    
    public function retirer($id, $idJeu, Request $request)
    {
        $jeu_type_jeu = DB::table('jeu_type_jeu')->where('type_jeu_id', $id)->where('jeu_id', $idJeu)->delete();
        //dd($jeu_type_jeu);
        
        $request->session()->flash('success', 'Le type a été retiré.');
        return back();
    }
}
