<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $lesMessages=Message::paginate(20);
        return view('admin/message/index')->with('lesMessages',$lesMessages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/message/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $unMessage= new Message();
         $unMessage->titre=$request->get('titre');
         $unMessage->description=$request->get('description');
         $unMessage->save();
         $request->session()->flash('success', 'Le Message a été crée !');
        return redirect(route('message.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                        $unMessage=Message::find($id);
        return view('admin/message/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                                $unMessage=Message::find($id);
        return view('admin/message/edit');
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
                         $unMessage=Message::find($id);
         $unMessage->titre=$request->get('titre');
         $unMessage->description=$request->get('description');
         $unMessage->save();
         $request->session()->flash('success', 'La Message a été modifiée !');
         return redirect(route('message.index'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                        $unMessage=Message::find($id);
        $unMessage->save();
        $request->session()->flash('success', 'La Message a été supprimée !');
        return redirect(route('message.index'));
    }
}
