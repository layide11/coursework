<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
   <div class="row justify-content-center">
     <div class="col-md-10 ">
       <div class="card">
         <div class="card-header">Add a new animal</div>


          <!-- define the form -->
          <div class="card-body">
            <form class="form-horizontal" method="POST"
            action="{{ action('AnimalsController@store') }}"  enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
              <label >name</label>
              <input type="text" name="name"
              placeholder="Animal name" />
            </div>
            <div class="col-md-8">
              <label>sex</label>
              <select name="sex" >
                <option value="male">male</option>
                <option value="female">female</option>
              </select>
            </div>
            <div class="col-md-8">
              <label>specie</label>
              <select name="specie" >
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="rabbit">Rabbit</option>
                <option value="ferret">Ferret</option>
                <option value="hamster">hamster</option>
                <option value="frog">Frog</option>
              </select>
            </div>
            <div class="col-md-8">
              <label >About</label>
              <textarea name="about"
              placeholder="Description"> </textarea>
            </div>
            <div class="col-md-8">
              <label >age</label>
              <input type="text" name="age"
              placeholder="Age" />
            </div>

              <div class="col-md-8">
                <label>Image</label>
                <input type="file" name="animal_image"
                placeholder="Image file" />
              </div>
              <div class="col-md-6 col-md-offset-4">
                <input type="submit" class="btn btn-primary" />
                <input type="reset" class="btn btn-primary" />
              </div>
            </form>
</div>
  </div>
  </div>
  </div>
  </div>
@endsection
