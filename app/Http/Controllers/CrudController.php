<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    // thisw will show the home page
    public function index()
    {
        $products = Product::all();
        return view("crud.products" ,["products"=> $products]);
    }
    // this will show the create page
    public function create()
    {
        return view("crud.create");
    }


    // this will store the products

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'email' => 'required|email|max:255|unique:products,email',
            'image' => 'nullable|image|mimes:jpeg,png,jiff,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // this will store data in the database

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = null;
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'email' => $request->email,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('crud.products')->with('success', 'Product added successfully.');
    }
    

    // this will show the edit page
    public function edit($id)
    {
        $products=Product::findOrFail($id);
        return view('crud.edit',['products'=> $products]);
    }
    


    public function update(Request $request, $id)
    {
        $products=Product::findOrFail($id);
       

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'email' => 'required|email|max:255|unique:products,email,' . $products->id,
            'image' => 'nullable|image|mimes:jpeg,png,jiff,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('crud.edit',$products->id)
                ->withErrors($validator)
                ->withInput();
        }
        // this will store data in the database
        $imageName = $products->image;
        if ($request->hasFile('image')) {
            // this will delete the old image
            File::delete(public_path('uploads/'.$products->image));
            // this will add the new image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
           
        }

        $products->update([
            'name' => $request->name,
            'price' => $request->price,
            'email' => $request->email,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('crud.products')->with('success', 'Product updated successfully.');
    }
    
    // this will delete the products
    public function destroy(Request $request,$id)
{
    $products= Product::findOrFail($id);

    // Delete the product image if it exists
    if ($products->image) {
        File::delete(public_path('uploads/' . $products->image));
    }

    // Delete the product
    $products->delete();

    return redirect()->route('crud.products')->with('success', 'Product deleted successfully.');





}

}