@extends('layouts.app')

@section('content')

<table class="table-responsive table-hover ">

  <form class="form-horizontal" action="{{route('questionair.store')}}" method="post">
      <tr>
        <td><input size="30" type="text" name="name" placeholder="Enter Questionair Name...">
      </td></tr>
        <tr><td><br>
        <input type="number" name="duration" placeholder="Duration...">
      </td>
      <td><br><select class="dropwdown-menu" id="duration" name="format">
          <option value="min">Minutes</option>
          <option value="hrs">Hours</option>
      </select></td></tr>
      <tr><td><br>Can Resume ? </td>
        <td><br><input type="radio" name="resume" value="1">Yes</td>
        <td><br><input type="radio" name="resume" value="0" checked>No</td>
      </tr>
      <tr><td><br>Published:  </td>
        <td><br><input type="radio" name="published" value="1">Yes</td>
        <td><br><input type="radio" name="published" value="0" checked>No</td>
      </tr>
      <tr><td><td></td></td>
        <td><button type="submit" class="btn btn-success btn-sm" >Save</button>
      </td></tr>
      <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
  </table>

@endsection



{{-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li>Hour</li>
      <li>Minutes</li>
      <li></li>
  </ul></td> --}}
