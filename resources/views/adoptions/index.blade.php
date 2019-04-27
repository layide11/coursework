@extends('layouts.app')
<?php
use App\AdoptionReq;
use App\Animal;

?>

@section('content')
<h1>Adoption Requests</h1>
<div class="container">
    <div class='row'>
        <h3>Pending Applications</h3>
        <hr>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 0)
                    @if(count($requests)>0)
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ url('storage/animal_images/' .Animal::find((int) $request->animal_id)->animal_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$request->name}}</h5>
                            <p class="card-text">status: {{$request->status}}</p>
                            <small>Added on {{$request->created_at}}</small>
                            <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                          </div>
                    </div>
                    @else
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">There are no Requests.</p>
                            <small>Added on {{$request->created_at}}</small>
                            <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                          </div>
                    </div>
                    @endif

                @endif
            @endforeach
        </div>
    </div>
    <div class='row'>
        <h3>Approved Applications</h3>
        <hr>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 1)
                @if(count($requests)>0)
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ url('storage/animal_images/' .Animal::find((int) $request->animal_id)->animal_image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$request->name}}</h5>
                        <p class="card-text">status: {{$request->status}}</p>
                        <small>Added on {{$request->created_at}}</small>
                        <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                      </div>
                </div>
                @else
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">There are no Requests.</p>
                        <small>Added on {{$request->created_at}}</small>
                        <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                      </div>
                </div>
                @endif

            @endif
        @endforeach
        </div>
    </div>
    <div class='row'>
        <h3>Denied Applications</h3>
        <hr>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 2)
                @if(count($requests)>0)
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ url('storage/animal_images/' .Animal::find((int) $request->animal_id)->animal_image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$request->name}}</h5>
                        <p class="card-text">status: {{$request->status}}</p>
                        <small>Added on {{$request->created_at}}</small>
                        <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                      </div>
                </div>
                @else
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">There are no Requests.</p>
                        <small>Added on {{$request->created_at}}</small>
                        <a href="{{ url('adoptions/' .$request->id) }}" class="btn btn-primary">View</a>
                      </div>
                </div>
                @endif

            @endif
        @endforeach
        </div>
    </div>
</div>
@endsection
