<?php

namespace App\Http\Controllers;
use App\Models\Jeu;
use App\Models\TypeJeu;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManager;
use Validator;
use Image;
use File;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesJeux = Jeu::paginate(20);
        return view('admin/jeu/index')->with('lesJeux',$lesJeux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jeu/create');
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
            'nom' => 'required|max:255',
            'description' => 'required|max:65532',  
            'dateSortie' => 'required'
           
        ]);

        if ($validator->fails()) {
            return redirect('admin/jeu/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
        $unJeu= new Jeu();
        $unJeu->nom=$request->get('nom');
        $unJeu->description=$request->get('description');
        $unJeu->dateSortie=$request->get('dateSortie');
        //$unJeu->typeJeus()->attach($request->get('typeJeu'));
        //
        //Image
        if($request->file('image') != null) 
        {
            ini_set('memory_limit','256M');
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();   
            $destinationPath = public_path('/images/jeu/mini');
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            $destinationPath = public_path('/images/jeu/normal');
            $image->move($destinationPath, $input['imagename']);   
            $unJeu->photo=$input['imagename'];
        }        
        $unJeu->save();
        return redirect(route('jeu.index'));
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
         $unJeu=Jeu::find($id);
        return view ('admin/jeu/show')->with('unJeu',$unJeu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $unJeu=Jeu::find($id);
        return view('admin/jeu/edit')->with('unJeu',$unJeu);
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
            'nom' => 'required|max:255',
            'description' => 'required|max:65532',  
            'dateSortie' => 'required'
           
        ]);

        if ($validator->fails()) {
            return redirect(route('jeu.edit', $id))
                        ->withErrors($validator)
                        ->withInput()
                    ;
        }        
        else
        {
            $unJeu= Jeu::find($id);
            $unJeu->nom=$request->get('nom');
            $unJeu->description=$request->get('description');
            $unJeu->dateSortie=$request->get('dateSortie');
            //Image
        if($request->file('image') != null) 
        {
            if($unJeu->photo != null)
                {
                    $mini = public_path('images/jeu/mini/'.$unJeu->photo);
                    if(File::exists($mini)){
                    File::delete($mini);
                    }
                    $norm = public_path('images/jeu/normal/'.$unJeu->photo);
                    if(File::exists($norm)){
                    File::delete($norm);
                    }
                     
                }
                
            ini_set('memory_limit','256M');
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();   
            $destinationPath = public_path('/images/jeu/mini');
            $img = Image::make($image->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            $destinationPath = public_path('/images/jeu/normal');
            $image->move($destinationPath, $input['imagename']);   
            $unJeu->photo=$input['imagename'];
            
            
        }        
            
            $unJeu->update();
            
            return redirect (route('jeu.index'));
        }
    }
    
    public function addTypeJeu($id)
    {
        $unJeu=Jeu::find($id);
        $lesTypesJeux=TypeJeu::pluck('titre', 'id');
        return view ('admin/jeu/addTypeJeu', compact('unJeu','lesTypesJeux'));
    }
    
    public function storeTypeJeu(Request $request,$id)
    {
        $unJeu= Jeu::find($id);
       //$typeJeu=TypeJeu::find($request->GET('typejeu'));
        $unJeu->typeJeus()->attach($request->get('typeJeu'));
        
        return redirect(route('jeu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $unJeu = Jeu::find($id);
        
         if($unJeu->photo != null)
                {
                    $mini = public_path('images/jeu/mini/'.$unJeu->photo);
                    if(File::exists($mini)){
                    File::delete($mini);
                    }
                    $norm = public_path('images/jeu/normal/'.$unJeu->photo);
                    if(File::exists($norm)){
                    File::delete($norm);
                    }
                     
                }
           Jeu::destroy($id);
        $request->session()->flash('success', 'Jeu supprimée');
        return redirect (route('jeu.index'));
    }
}
