<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $animals = Animal::orderBy('name', 'asc')->get();
        return view('animals.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'about' => 'required',
            'animal_image' => 'image|nullable|max:1999',
            'specie' => 'required'
        ]);

        if($request->hasFile('animal_image')){
            //get full filename
            $filename = $request->file('animal_image')->getClientOriginalName();
            $rawName = pathinfo($filename, PATHINFO_FILENAME);
            $rawExt = $request->file('animal_image')->getClientOriginalExtension();
            $filenameForSave = $rawName.'-'.time().'.'.$rawExt;
            $filenameForSave = str_replace(' ', '', $filenameForSave);
            $path = $request->file('animal_image')->storeAs('public/animal_images', $filenameForSave);
        } else {
            $filenameForSave = 'defaultAnimalImg.png';
        }

        //create animal
        $animal = new Animal;

        $animal->name = $request->input('name');
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex'){0};
        $animal->about = $request->input('about');
        $animal->status = 0;
        $animal->specie = $request->input('specie');
        $animal->animal_image = $filenameForSave;

        $animal->save();

        return redirect('/animals')->with('success', 'Animal Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal = Animal::find($id);

        return view('animals.show')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $animal = Animal::find($id);

        return view('animals.edit')->with('animal', $animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'name' => 'required',
          'age' => 'required',
          'sex' => 'required',
          'about' => 'required',
          'specie' => 'required'
      ]);

      if($request->hasFile('animal_image')){
          //get full filename
          $filename = $request->file('animal_image')->getClientOriginalName();
          $rawName = pathinfo($filename, PATHINFO_FILENAME);
          $rawExt = $request->file('animal_image')->getClientOriginalExtension();
          $filenameForSave = $rawName.'-'.time().'.'.$rawExt;
          $filenameForSave = str_replace(' ', '', $filenameForSave);
          $path = $request->file('animal_image')->storeAs('public/animal_images', $filenameForSave);
      } else {
          $filenameForSave = 'defaultAnimalImg.png';
      }

      //create animal
      $animal = Animal::find($id);

      $animal->name = $request->input('name');
      $animal->age = $request->input('age');
      $animal->sex = $request->input('sex'){0};
      $animal->about = $request->input('about');
      $animal->status = 0;
      $animal->specie = $request->input('specie');
        if($request->hasFile('animal_image')){
      $animal->animal_image = $filenameForSave;
    }
      $animal->save();


        return redirect('/animals')->with('success', 'Animal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('/animals')->with('success', 'Animal Deleted');
    }
    public function filter(Request $request)
    {
        $animals = Animal::orderBy('name', 'asc')->where('specie', '=', $request->input('action'))->get();
        return view('animals.filter')->with('animals', $animals);
    }
}
