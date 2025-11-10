<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        //getting/fetching data from model/Product
        $products = Product::orderby('created_at', 'desc')
                    ->get();
        // sending data to index page
        return view('products.index', ['products' => $products ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            // redirect(route('form page'))
            // withError(var): will display the error
            // withInput(): even if it fails, the input will remain/will not refresh
            return redirect(route('products.create'))->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();

        if($request->hasFile('image')){
            $image = $request->image;

            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
            $product->save();
        }


        return redirect(route('products.index'))->with('success','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        $product = Product::findOrFail($id);
        //to delete old image
        $oldImage = $product->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required|unique:products,sku,'.$id,
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            // redirect(route('form page'))
            // withError(var): will display the error
            // withInput(): even if it fails, the input will remain/will not refresh
            return redirect(route('products.edit', $product->id))->withErrors($validator)->withInput();
        }

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();

        if($request->hasFile('image')){
            if($oldImage != null && File::exists(public_path('uploads/products/'.$oldImage))){
                File::delete(public_path('uploads/products'.$oldImage));
            }

            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
            $product->save();
        }


        return redirect(route('products.index'))->with('success','Product updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        if($product->image != null && File::exists(public_path('uploads/products/'.$product->image))){
            File::delete(public_path('uploads/products/'.$product->image));
        }

        $product->delete();

        return redirect(route('products.index'))->with('success', 'Product delete successfully');
    }
}
