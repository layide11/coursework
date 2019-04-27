@extends('layouts.app')
<?php
use App\AdoptionReq;
use App\Animal;
?>
@section('content')
    <h1>{{Animal::find((int) $request->animal_id)->name}}</h1>
    <div>
    <img width="500" height="300"src="{{ url('storage/animal_images/' .Animal::find((int) $request->animal_id)->animal_image) }}" >
        {{Animal::find((int) $request->animal_id)->about}}
    </div>
    <hr>
    <small>Added On {{Animal::find((int) $request->animal_id)->created_at}}</small>

    <hr>
    <div class='container'>
        <div class='row'>
        <a href="" class="btn btn-success">Request!</a>
        </div>
    </div>
@endsection
