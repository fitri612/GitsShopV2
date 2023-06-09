<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductControllerv2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $products = Product::with('category')->latest()->paginate(5);

        
        
        // if ($category_id) {
        //     $products = $products->where('category_id', $category_id);
        // }

        // $products = $products->get();




        // dd($products);
        return view('pages.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);

        // dd($request->category_id);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        // Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $file->move(public_path('images'), $path);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
            'category_id' => $request->category_id
        ]);

        return Redirect::route('index.productV2')->with('success','Insert Data Product Success!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.index', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->update([
                'image' => $name,
            ]);
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $name ?? $product->image,
        ]);
        return redirect()->route('index.productV2')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::route('index.productV2');
    }

    public function show_product(Product $product)
    {
        return view('pages.products.detail.index', compact('product'));
    }

    public function index_product()
    {
        $products = Product::all();
        return view('dashboard_casier', compact('products'));
    }
    
    

}
