<?php
use App\AdoptionReq;
use App\User;
?>
<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
    <h1>{{$animal->name}}</h1>
    <div>
    <img width="500" height="300" src="{{ url('storage/animal_images/' .$animal->animal_image) }}" >

    </div>
    <hr>
    <div>Description: {{$animal->about}}</div>
    <hr>
    <div>Age: {{$animal->age}}</div>
    <hr>
    <div> Sex:
      @if($animal->sex == 'm')
        Male
        @elseif ($animal->sex == 'f')
        Female
        @endif
    </div>
    <hr>
    <div> Specie: {{$animal->specie}}</div>
    <hr>
    <small>Added On: {{$animal->created_at}}</small>

    <hr>
    @if(!Auth::guest() && Auth::user()->role==0 )
    <div class='container'>
        <div class='row' align='center'>
        <div class='col-sm-4'> <a href="{{action  ('AdoptionReqsController@store',$animal->id)}}" class="btn btn-success">Request!</a> </div>
    </div>
    </div>
    @endif
    @if(Auth::user()->role==1)
        @if ($animal->status==1)
        <?php
            $request = (AdoptionReq::where('animal_id', '=', $animal->id)->first());
            $user = User::find((int)$request->user_id);
        ?>
        <div> Adopted by {{$user->username}}  </div>
        <hr>

        @else
        <div class='col-sm-4'> <a href="{{action  ('AnimalsController@edit',$animal->id)}}" class="btn btn-success">Edit</a class='col-sm-4'> <a href="{{action  ('AnimalsController@destroy',$animal->id)}}" class="btn btn-success">Delete</a> </div>
        @endif

    @endif

@endsection
