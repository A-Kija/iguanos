<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Animals/Index');
    }

    public function list()
    {
        return response()->json([
            'animals' => Animal::all()
        ]);
    }

    public function store(Request $request)
    {
        Animal::create($request->all());
        return response()->json([
            'message' => 'Animal created successfully'
        ]);
    }

    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->all());
        return response()->json([
            'message' => 'Animal updated successfully'
        ]);
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response()->json([
            'message' => 'Animal deleted successfully'
        ]);
    }
}
