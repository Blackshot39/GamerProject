<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Models\Actualite;
use App\Models\Sujet;
use App\Models\Promotion;
use App\Models\PeriodeSpeciale;
use Carbon\Carbon;

class HomePublicController extends Controller
{
    //
    
    public function index()
    {
//        $info = DB::table('contactes')                
//                ->first(); ->with('info', $info)
        
//        $now = Carbon::today();         
//        $now = Carbon::parse($now)->format('Y-m-d');
//          
//        $presentation = Presentation::first();
//        $lesActus = Actualite::orderBy('id', 'desc')
//                                ->limit(3)
//                                ->get();
//        $lesPromos = Promotion::orderBy('id', 'desc')
//                                ->where('statut', true)
//                                ->where('dateFin', '>', Carbon::today())
//                                ->get();
//        $lesPeriodes = PeriodeSpeciale::where('dateDebut', '<=', $now)
//                                        ->where('dateFin', '>=', $now)
//                                        ->orderBy('dateDebut', 'asc')
//                                        ->orderBy('dateFin', 'asc')
//                                        ->paginate(3);
        
        $lesActualites=Actualite::orderBy('id','libelle')
                                  ->limit(5)
                                  ->get();     
        $lesSujets=Sujet::orderBy('id','titre')
                                  ->limit(5)
                                   ->get();  
        
        return view('front/home',compact('lesActualites','lesSujets'));
    }
}
