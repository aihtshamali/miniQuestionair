<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Questionair;
use App\Question;
use Illuminate\Http\Request;
class QuestionairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $q=questionair::all();
          $count=Question::count();
      $q=$q->where('userId', auth::user()->id);
      return view('home',['questionairs'=>$q,'counter'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $q=new Questionair();


        $q->name=$r['name'];
        $q->userId=auth::user()->id;
        $q->duration=$r['duration'].$r['format'];
        $q->resumeable=$r['resume'];
        $q->published=$r['published'];
        $q->save();
        return redirect()->route('questionair.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionair  $questionair
     * @return \Illuminate\Http\Response
     */
    public function show( $questionair)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questionair  $questionair
     * @return \Illuminate\Http\Response
     */
    public function edit( $questionair)
    {
      $q=Questionair::findOrFail($questionair);
      return view('questionairs.edit',['questionair'=>$q]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionair  $questionair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $questionair)
    {
      $q=Questionair::findOrFail($questionair);
      $q->name=$r['name'];
      $q->duration=$r['duration'].$r['format'];
      $q->resumeable=$r['resume'];
      $q->published=$r['published'];
      $q->save();
      return redirect()->route('questionair.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questionair  $questionair
     * @return \Illuminate\Http\Response
     */
    public function destroy( $questionair)
    {
        Questionair::destroy($questionair);
        return redirect()->route('questionair.index');
    }
}
