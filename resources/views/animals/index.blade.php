<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')

    <h1>Animals</h1>
    <div class="container">
      <form class="form-horizontal" method="GET" action="{{ action('AnimalsController@filter') }}">
        <div class="col-md-8">
          <label>Filter Animals by specie:</label>
            <button class="btn btn-primary" type="submit" name="action" value="dog">Dog</button>
            <button class="btn btn-primary" type="submit" name="action" value="cat">Cat</button>
            <button class="btn btn-primary" type="submit" name="action" value="rabbit">Rabbit</button>
            <button class="btn btn-primary" type="submit" name="action" value="ferret">Ferret</button>
            <button class="btn btn-primary" type="submit" name="action" value="hamster">Hamster</button>
            <button class="btn btn-primary" type="submit" name="action" value="frog">Frog</button>
            <hr>

        </div>
    </form>
    @if(count($animals) > 0)
        <div class='card-columns'>
        @if(Auth::user()->role ==0)
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
            @foreach ($animals as $animal)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ url('storage/animal_images/' .$animal->animal_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$animal->name}}</h5>
                            <p class="card-text">{{$animal->about}}</p>
                            <small>Added on {{$animal->created_at}}</small>
                            <a href="{{ url('animals/' .$animal->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
            @endforeach
            @endif


            </div>
    </div>
    @else
        <p>No Animals Found!</p>
    @endif

@endsection
