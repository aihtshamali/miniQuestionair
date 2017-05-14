<?php

namespace App\Http\Controllers;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use App\Questionair;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/questionair');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

    foreach ($r['question'] as $k => $v ) {
      if($v===null){
        continue;
      }
      $q=new Question();
      // dd($r);
      $q->question=$v;
      $q->questionairId=1;
      $q->qtype=$r['select'][$k];
      if ('multiplechoiceM' == $r['select'][$k]) {
        $choices=$r['multiple' . $k];
        $answers=$r['answer' . $k];
        $q->save();
          $size=sizeof($choices);
          $i=0;$j=0;
        foreach ( $answers as $answer)
        {
          if($answer===null)
          {
            $i++;
            continue;
          }
              $a = new Answer();
              $a->answer = $answer;
              if($i==$choices[$j])
              {
                $a->status=1;
                $j++;
              }
              $a->question()->associate($q);
              $a->save();
              $i++;
        }
      }

      else if ('multiplechoiceS' == $r['select'][$k] ){
        $choices=$r['single' . $k];
        $choice=$choices-1;
        $answers=$r['answer' . $k];
        $q->save();$i=0;
        foreach ( $answers as $answer)
        {
          if($answer===null)
          {
            $i++;
            continue;
          }
              $a = new Answer();
              $a->answer = $answer;
              if($i==$choice)
              {
                $a->status=1;
              }
              $a->question()->associate($q);
              $a->save();
              $i++;
        }
      //  dd($choices-1);
      }

      else if ('text' == $r['select'][$k] ){

        $answer=$r['answer' . $k];
        $q->save();
        $a = new Answer();
        $a->answer = $answer[1];
        $a->question()->associate($q);
        $a->save();
      }

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
      return view("Under Construction");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Questionair::destroy($id);
      return redirect()->route('question.index');
    }
}
