<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'recipes' => Recipe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recipeForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'bahan' => 'required',
            'cara' => 'required',
        ]);

        $str = Str::random(20);
        $image_path = $request->file('photo')->move('image_photo', $str);

        Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $image_path,
            'bahan' => $request->bahan,
            'cara' => $request->cara,
        ]);

        return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::find($id);
        return view('admin.showRecipe', compact('recipe'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::find($id);

        return view('admin.updateRecipe', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'bahan' => 'required',
            'cara' => 'required',
        ]);

        $recipe = Recipe::find($id);

        if ($request->hasFile('photo')) {
            File::delete($recipe->photo);
            $str = Str::random(20);
            $image_path = $request->file('photo')->move('image_photo', $str);


            $recipe->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $image_path,
                'bahan' => $request->bahan,
                'cara' => $request->cara,
            ]);

        } else {
            $recipe->update([
                'title' => $request->title,
                'description' => $request->description,
                'bahan' => $request->bahan,
                'cara' => $request->cara,
            ]);
        }
        
        return redirect()->route('recipe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        File::delete($recipe->photo);
        $recipe->delete();
        return redirect()->route('recipe.index');
    }
}
