@extends('layouts.app')

@section('content')
<div class="case">

<table class="table-responsive table-hover" id="table">
  <form class="form-horizontal" action="{{route('questions.store')}}" method="post">

      <tr>
        <td><label for="Question Type" >Question Type : </label></td>
        <td>
          <select class="dropdown-menu-right" onChange="show()" name="single">
            <option value="text">Text</option>
            <option value="multiplechoiceS">MultipleChoice (Single Option)</option>
            <option  value="multiplechoiceM">MultipleChoice (Multiple Option)</option>

        </td>
        <td><button  class="delete" id="post"> Delete Question</button></td>
      </tr>
      <div id="textQuestion">
        <tr><td><label for="question">Question : </label>
          </td><td><input type="text" name="question" placeholder="Enter Question...."></td>
         </tr>
        <tr id="answer">
            <td><label for="answer">Answer : </label>
          </td><td><input type="text" name="answer" placeholder="Enter Answer...."></td>
        </tr>
        <span id="hidden">
        <tr>
        <td> <label for="">Choice : </label></td><td> <input type="text" name="choice1" placeholder="Enter Choice 1">
        </td><td><input type="radio" name="answer">Correct?</input></td>
        <td>
          <button type="button" name="button">Delete</button>
        </td></tr>
        <tr>
        <td> <label for="">Choice : </label> </td><td><input type="text" name="choice2" placeholder="Enter Choice 2">
        </td><td><input type="radio" name="answer">Correct?</input></td><td><button type="button" name="button">Delete</button>
        </td></tr>
        <tr>
        <td> <label for="">Choice : </label> </td><td><input type="text" name="choice3" placeholder="Enter Choice 3">
        </td><td><input type="radio"  name="answer">Correct?</input></td><td><button type="button" name="button">Delete</button>
        </td></tr>

        </span>

      </div>

        <tr>
            <td><button type="submit" class="btn btn-success btn-sm" >Save</button>
      </td></tr>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
  </table>
</div>

<button type="button" id="clone" class="clone">Press</button>

@endsection


{{-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li>Hour</li>
      <li>Minutes</li>
      <li></li>
  </ul></td> --}}
