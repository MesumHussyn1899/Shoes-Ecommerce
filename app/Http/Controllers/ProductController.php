<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function admin(){
        $product = Product::orderBy('created_at','DESC')->get();              
        return view('web.admin',['product'=> $product]);
    }

    public function create(){
      return view('web.create');
    }

    public function index() {
        $products = Product::all(); // Fetch all products from the database
        return view('web.product', compact('products'));
    }
    

    public function show($id)
    {
        // Fetch product by its ID
        $product = Product::findOrFail($id);
        
        // Return the view and pass the product data
        return view('web.description', compact('product'));
    }
    
    public function store(Request $request){
        

        $rules=[
            'title'=> 'required|min:5',
            'price'=> 'required|numeric',
            'image'=> 'required',
        ];

        if($request->image != ""){    
          $rules["image"]= "  image";
        }

        $validator =  Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('web.create')->withInput()->withErrors($validator);
        }

    $product = new Product();
    $product->title =$request->title;
    $product->price =$request->price;
    $product->description =$request->description;
    $product->image =$request->image;
    $product->save();

    if($request->image != ""){
    $image =$request ->image;
     $ext = $image->getClientOriginalExtension();
     $imageName = time().'.'.$ext;
     
     $image->move(public_path('uploads\products'), $imageName);

     $product->image =$imageName;
     $product->save();
    }

    return redirect()->route('web.admin')->with('success','Product added successfully');
   

        
    }
    
    public function edit($id){
        $product = Product::findOrFail($id);              
        return view('web.edit',[
            'product'=> $product
        ]);


    }

    
    public function update($id, Request $request)
{
    $product = Product::findOrFail($id);

    // Validation rules
    $rules = [
        'title' => 'required|min:5',
        'price' => 'required|numeric',
        'image' => 'required',
    ];

    // Adjust image validation rule if image is provided
    if ($request->hasFile('image')) {
        $rules["image"] = "image";
    }

    $validator = Validator::make($request->all(), $rules);

    // Redirect back to the edit route with validation errors if validation fails
    if ($validator->fails()) {
        return redirect()->route('web.edit', $product->id)->withInput()->withErrors($validator);
    }

    // Update product details
    $product->title = $request->title;
    $product->price = $request->price;
    $product->description = $request->description;

    // Handle new image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
            File::delete(public_path('uploads/products/' . $product->image));
        }

        // Save the new image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path('uploads/products'), $imageName);

        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('web.admin')->with('success', 'Product updated successfully');
}


    
    public function destroy($id){
        $product = Product::findOrFail($id); 

        File::delete(public_path('uploads/products/'.$product->image));

        $product->delete();

        return redirect()->route('web.admin')->with('success','Product deleted successfully');
   
    }
}
