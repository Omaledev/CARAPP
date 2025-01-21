<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return view('index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded' => 'required|integer',
            'image' => 'nullable|file|mimes:jpg,png,gif,svg|max:255',
            'description' => 'required|string|max:5000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
          $imagePath = 'storage/' . $request->file('image')->store('/images', 'public');
        }else {
            $imagePath = null;
        }

        $car = Car::create( [
            'name' => $request-> input('name'),
            'founded' => $request-> input('founded'),
            'image'  => $imagePath,
            'description' => $request-> input('description'),
        ]);

        return redirect('/cars')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
       
       
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'founded' => 'required|integer',
            'image' => 'nullable|file|mimes:jpg,png,gif,svg|max:255',
            'description' => 'required|string|max:5000',
        ]);
    
        $car = Car::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $imagePath = 'storage/' . $request->file('image')->store('/images', 'public');
            $car->image = $imagePath;
        }
    
        $car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');
        $car->save();
    
        return redirect('/cars')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
                $car->delete();
                
        return redirect('/cars')->with('success', 'Car Deleted successfully.');
    }
}        


