<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   public function __construct()
    {
       //$this->middleware('SuperAdmin', ['only' => ['edit', 'create', 'update', 'store', 'destroy']]);
         //$this->middleware('admin', ['except' => ['index']]);
    }
    
    public function ban($id)
    {
        $unUser = User::find($id);
        $unUser->ban = true;
        $unUser->update();
        return redirect(route('user.index'));
    }
    
    public function deban($id)
    {
        $unUser = User::find($id);
        $unUser->ban = false;
        $unUser->update();
        return redirect(route('user.index'));
    }   
  
    
    
    public function index()
    {
        //
        $lesUsers = User::orderBy('statut')
                        ->paginate(20);
                      
        return view('admin/user/home')->with("lesUsers", $lesUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lesStatuts = collect(['Admin'=>'Admin','Moderateur'=>'Moderateur', 'user'=>'user']);
        return view('admin/user/create')->with('lesStatuts', $lesStatuts);
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'name' => 'required|max:255',  
            'mdp' => 'required|min:6|max:255',
            'statut' => 'required',
            
            
        ]);

        if ($validator->fails()) {
            return redirect('admin/user/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $unUser = new User();
            $unUser->name=$request->get('name');  //pseudo
            $unUser->email=$request->get('email');  
            $unUser->statut=$request->get('statut');  
            $unUser->password=(bcrypt($request->get('mdp'))); 
            
            $unUser->save();
            $request->session()->flash("success","Le compte ". $unUser->email ." a été crée avec succès");
            return redirect(route('user.index'));
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
        //
        $unUser = User::find($id);
        return view('admin/user/show', compact('unUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
         $unUser = User::Find($id);
        $lesStatuts = collect(['Admin'=>'Admin','Moderateur'=>'Moderateur', 'user'=>'user']);
          return view('admin/user/edit', compact('unUser', 'lesStatuts'));
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
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',  
            'mdp' => 'min:6|max:255',
            'statut' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',          
            'ville' => 'max:255'
            
        ]);

        if ($validator->fails()) {
             return redirect(route('user.edit', $id))
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $unUser = User::Find($id);
            $unUser->name=$request->get('name');    
            $unUser->email=$request->get('email'); 
            $unUser->ville=$request->get('ville');
            
            //Intervention image avatar
           
            //
            
            $unUser->statut=$request->get('statut');
            if($request->get('mdp') != null)
            {                    
               $unUser->password=(bcrypt($request->get('mdp'))); 
                //dd($unUser->password=(bcrypt($request->get('mdp'))),$request->get('mdp'));
            }        
            $unUser->update();
            $request->session()->flash("success","Le compte ". $unUser->email ." a été modifié avec succès");
            return redirect(route('user.index'));
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
        //
        $count = User::where('statut', '=', 'Admin')->count();
        $user = User::find($id);
        
        if($user->email == Auth::user()->email) //Si l'user a delete est l'user connecter..
        {
            $request->session()->flash("error","Vous ne pouvez pas vous supprimer vous même !");
        }
        else
        {
            if($count > 1)
            {
                User::destroy($id);
                $request->session()->flash("success","Le compte a été supprimé.");
            }
            else
            {
                $request->session()->flash("error","Le compte que vous avez tenté de supprimer est le dernier Admin, et ne peut donc pas être supprimé !");
            }
        }
            
        return redirect(route('user.index'));
    }
    
    public function myAccount() //recupere les info du compte courant, et envoie  (sans le changement de statut)
    {
        $user = Auth::user();
        // dd($user);
        //$user = User::find($id);
        return view('admin/user/me')->with('user', $user);
    }

    public function myAccountPut($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',              
            'new-mdp' => 'min:6|max:255', //verif si bon mdp taper 2x  |confirmed
            'now-mdp' => 'max:255|required',
            
        ]);

        if ($validator->fails()) {
             return redirect(route('user.myAccount'))
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {             
            $unUser = User::Find($id);     
            $exAvatar = $unUser->avatar;
            $unUser->email=$request->get('email');
            $unUser->ville=$request->get('ville');
            //avatar
            if($request->file('avatar') != null)
            {
                ini_set('memory_limit','256M');
                $image = $request->file('avatar');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();   
                $destinationPath = public_path('/images/user/avatar');
                $img = Image::make($image->getRealPath());
                $img->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                $unUser->avatar=$input['imagename'];
                //delete ex avatar
                if($exAvatar != null)
                {
                    $avat = public_path('images/user/avatar/'.$exAvatar);
                    if(File::exists($avat)){
                    File::delete($avat);
                    }
                     
                }
                     
             }
        //
           
            
            if (Hash::check($request->get('now-mdp'), $unUser->password))
            {
                    //return ('bon mdp');
                        if($request->get('new-mdp') != null)
                        {  
                            $unUser->password=(bcrypt($request->get('new-mdp')));                    
                        }        
                        $unUser->update();
                        $request->session()->flash("success","Votre compte a été modifié.");
                        return redirect(route('user.myAccount'));
            }
            else
            {
                //return ('movai mdp');
                  $request->session()->flash("error","Le mot de passe est incorrect.");
                  return redirect(route('user.myAccount'));
            }
            
        }
        
    }

     
}
