
<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<h1>Filtered Animals</h1>
<hr>
    @if(count($animals) > 0)
    <div class='card-columns'>
    @foreach ($animals as $animal)
        @if( (int) $animal->status == 0 )
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('storage/animal_images/' .$animal->animal_image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$animal->name}}</h5>
                    <p class="card-text">{{$animal->about}}</p>
                    <small>Added on {{$animal->created_at}}</small>
                    <a href="{{ url('animals/' .$animal->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
        @endif
        @endforeach
        @else
            <p>No Animals Found matching your filter criteria !</p>
        @endif

@endsection
