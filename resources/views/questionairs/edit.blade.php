@extends('layouts.app')
@section('content')
  <table class="table-responsive table-hover ">

         <form class="form-group" action="{{url('questionair')}}/{{$questionair->id}}" method="POST">
         {{ method_field('Put') }}
         <tr>
           <td><input size="30" type="text" name="name" value="{{$questionair->name}}">
         </td></tr>
           <tr><td><br>
           <input type="number" name="duration" value="{{$questionair->duration}}">
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
