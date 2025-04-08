<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    
    // Display a listing of the resource.
    public function index()
    {
        // Get all categories from database
        $categories = \App\Models\Category::all()->sortBy('id');

        return view('categories.index')->with('categories', $categories);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Check form submission for errors
        // Insert into database or show error

        $rules = [
            'category' => 'required|unique:categories,category'
        ];

        $validator = $this->validate($request, $rules);
        
        $category = new \App\Models\Category();
        $category->category = $request->category;
        $category->save();

        // Flash a success message
        Session::flash('success', 'A new category has been created.');
    
        // Redirect to index
        return redirect()->route('categories.index');

    }

    
    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
         // Retrieve company corresponding to passed key value
        $category = \App\Models\Category::find($id);
        if (!$category) dd("no category found");

        return view('categories.edit')->with('category', $category);
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $rules = [
            'category' => 'required|unique:categories,category,'.$id
        ];

        $validator = $this->validate($request, $rules);

        $category = \App\Models\Category::find($id);
        if (!$category) dd("no category found");

        $category->category = $request->category;
        $category->save();

        Session::flash('success', 'Category edited successfully.');

        return redirect()->route('categories.index');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        // $category = \App\Models\Category::find($id);
        // if (!$category) {
        //     dd("no category found");
        // } else {
        //     $category->delete();
        //     Session::flash('success', 'Category deleted');
        // }

        
        // return redirect()->route('companies.index');    
    }

    // public function confirmDelete(string $id) 
    // {
    //     //
    // }
}
