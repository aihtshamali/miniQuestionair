@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12  col-md-8 col-md-offset-2 full-height " id="body">
            <div class="panel panel-default ">
                <div class="panel-heading ">Questionairs
                  <span><button class="btn btn-info" style="position:absolute;right:20px;margin-top:-5px;"  type="success" name="newQuestion">
                    <a href="questionair/create" style="color:black">Add Question</a></button></span>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                      <tr style="text-font:bold">
                        <td>id</td>
                        <td>Name</td>
                        <td>Number of Questions</td>
                        <td>Duration</td>
                        <td>Resumeable</td>
                        <td>Published</td>
                        <td>Actions</td>
                      </tr>



                      @foreach ($questionairs as $questionair)
                        <tr>
                          <td>{{$questionair->id}}</td>
                          <td>{{$questionair->name}}</td>
                          <td>{{$questionair->qNumber}}<strong> | </strong><a href="questions/create">Add</a></td>
                          <td>{{$questionair->duration}}</td>
                          <td>{{$questionair->resumeable}}</td>
                          <td>{{$questionair->published}}</td>
                          <td><a href="{{ URL::to('questionair/' . $questionair->id . '/edit') }}">Edit</a>|
                            <form action="{{url('questionair')}}/{{$questionair->id}}" method="Post">
                                    {{ method_field('Delete') }}
                                    <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                    <button class="btn btn-xs btn-info" type="submit">Delete</button>
                        </form></tr>
                      @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
