<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\CommonTrait;


class ProductController extends Controller
{
    use CommonTrait;
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    public function create()
    {
        return view('products.create');    
    }

    public function store(Request $request)
    {
        $request->validate([
             'title' => 'required',
            //  'image' => 'required',
             'variants' => 'required',
             'description' => 'required',
             'amount'=>'required'

        ]);
        if($request->file('image'))
        {
            $imagePath=$this->imageUpload($request->file('image'),'/images/');
        }
       
        
        $product=new Product();
        $product->title=$request->title;
        // $product->image=$imagePath;
        $product->description=$request->description;
        $product->variants=$request->variants;
        $product->amount=$request->amount;


        $product->save();
        return redirect()->route('products.index',compact('product'))->with('success','Product created successfully.');
    }
    public function show($id){

        // dd($id);
        $product=Product::find($id);
        return view('products.show',compact('product'));    
    }

    public function edit($id)    
    {
        $product=Product::where('id',$id)->first();
        return view('products.edit',compact('product'));  
    }

    public function update(Request $request)     
    {
        // dd($request->image);
        $request->validate([
            'title' => 'required',
            // 'image' => 'required',
            'variants' => 'required',
            'description' => 'required',
            'amount'=>'required'


       ]);

       if($request->file('image'))
        {
            $imagePath=$this->imageUpload($request->file('image'),'/images/');
        }
        else{
            $imagePath = $request->image;       
        }
        $product=Product::find($request->id);
        $product->title=$request->title;
        $product->image= $imagePath;
        $product->description=$request->description;
        $product->variants=$request->variants;
        $product->amount=$request->amount;

        $product->save();
        return redirect()->route('products.index',compact('product'))->with('success','Product updated successfully.');
    

    }

    public function delete($id)
    {
        $response=Product::where(['id'=>$id])->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');    }

}
