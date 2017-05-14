@extends('layouts.app')

@section('content')
  <form class="form-horizontal" action="{{route('questions.store')}}" method="post">
      <div id="Questions">
        <div class="idtxt" style="display:none;" id="0">
          <div class="QuestionType">
            <label for="Question Type" >Question Type : </label>
            <select class="dropdown-menu-right" id="0" name="select[]">
              <option value="text">Text</option>
              <option value="multiplechoiceS">MultipleChoice (Single Option)</option>
              <option  value="multiplechoiceM">MultipleChoice (Multiple Option)</option>
            </select>
            <button type="button" class="delete">Delete Question</button>
          </div>
          <div class="Question">
            <label for="answer">Question : </label>
            <input type="text" name="question[]" class="" placeholder="Enter Question...."><br/>
          </div>
          <div class="answer" id="0">
            <label for="answer">Answer : </label><input type="text" name="answer1[]" placeholder="Enter Answer....">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success btn-sm" >Save</button>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    <input type="button" id="idbtn" value="Add Question"></input>

@endsection


{{-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li>Hour</li>
      <li>Minutes</li>
      <li></li>
  </ul> --}}
