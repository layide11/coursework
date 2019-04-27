@extends('layouts.app')
<?php
use App\AdoptionReq;
use App\Animal;
use App\User;
?>
@section('content')


<div class="container">
   <div class="row justify-content-center">
     <div class="col-md-10 ">
       <div class="card">
         <div class="card-header"><h2>Adoption Request #{{$request->id}}</h2></div>
         <div class='col-sm-9' style="text-align:center">
           @if($request->status == 0)
         <h3>{{User::find((int)$request->user_id)->username}} requests to adopt {{ Animal::find((int)$request->animal_id)->name }}</h3>
             <hr>
          @else
          <h3>{{User::find((int)$request->user_id)->username}} requested to adopt {{ Animal::find((int)$request->animal_id)->name }}</h3>
              <hr>
        </div>
        @endif
        <div class='col-sm-3'>
            <div>
                <img style="max-width:100%" src="{{ url('storage/animal_images/' .Animal::find((int) $request->animal_id)->animal_image) }}" >
                <hr>
                {{Animal::find((int) $request->animal_id)->about}}
            </div>
                <hr>
                <small>Added On {{Animal::find((int) $request->animal_id)->created_at}}</small>
                <hr>
            </div>

            @if($request->status==0)
            <form class="form-horizontal"  action="{{ action('AdoptionReqsController@update', $request->id) }}" method="PUT" enctype="multipart/form-data">


            <div class="col-md-8">
              <label>status</label>
              <select name="status" >
                <option value="1">Grant Reuest</option>
                <option value="2">Deny Request</option>
              </select>
            </div>

              <div class="col-md-6 col-md-offset-4">
                <input type="submit" value ="save changes" class="btn btn-primary" />
              </div>
            </form>
            @endif
        </div>


    </div>
    </div>
    </div>
    </div>
@endsection
