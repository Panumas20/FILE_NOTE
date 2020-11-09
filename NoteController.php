<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $note_data =\App\Note::select('*')->where('owner_id',$id)->get();
        return view('note',['note'=>$note_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('note-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;
        //return $request->all();
       $add_note = \App\Note::create([
            
            'topic'=>$request->input('topic'),
            'detail'=>$request->input('detail'),
            'owner_id'=>$id,

        ]);
        session()->flash('status','บันทึกข้อมูลเรียบร้อย');
        return redirect()->route('note.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $id = auth()->user()->id;
        $this->validate($request,['topic'=>['required','min:5'],]);


        $note_data =\App\Note::find($id);
        $note_data ->update([
            'topic'=>$request->input('topic'),
            'detail'=>$request->input('detail'),
            'owner_id'=>$id,
        ]);
        
        session()->flash('status','แก้ไขข้อมูลเรียบร้อย');
        return redirect()->route('note.index');
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
}