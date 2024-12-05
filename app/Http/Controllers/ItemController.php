<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Get all items from database
         $items = \App\Models\Item::all()->sortBy('title');
         $categories = \App\Models\Category::all()->sortBy('category');

         return view('items.index')->with('items', $items)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all()->sortBy('category');
        return view('items.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check form submission for errors
        // Insert into database or show error
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:items,sku|max:50',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = $this->validate($request, $rules);
        
        $filePath = null;
        if ($request->hasFile('picture')) {
            $filePath = $request->file('picture')->store('images', 'public');
        }

        if ($filePath == null) {
            $filePath = "";
        }

        $item = new \App\Models\Item();
        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->sku = $request->sku;
        $item->picture = $filePath;

        $item->save();

        // Flash a success message
        Session::flash('success', 'A new item has been created.');
    
        // Redirect to index
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve company corresponding to passed key value
        $item = \App\Models\Item::find($id);
        $categories = \App\Models\Category::all()->sortBy('category');
        if (!$item) dd("no item found");

        return view('items.edit')->with('item', $item)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|max:50|unique:items,sku,' . $id,
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = $this->validate($request, $rules);

        $item = \App\Models\Item::find($id);
        if (!$item) dd("no item found");

        $filePath = null;
        if ($request->hasFile('picture')) {
            $filePath = $request->file('picture')->store('images', 'public');
        }

        if ($filePath == null) {
            $filePath = "";
        }

        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->sku = $request->sku;
        $item->picture = $filePath;

        $item->save();

        Session::flash('success', 'Category edited successfully.');

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = \App\Models\Item::find($id);
        if (!$item) {
            dd("no item found");
        } else {

            if ($item->picture) {
                $filePath = storage_path('app/public/' . $item->picture);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        

            $item->delete();
            Session::flash('success', 'Item deleted.');
        }

        return redirect()->route('items.index');  
    }

    public function confirmDelete(string $id) 
    {
        //
    }
}
