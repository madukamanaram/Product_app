<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product_table;

class ProductController extends Controller
{
    public function index(){  
        $datafromDb=product_table::all();                    
        return view('product.productindex',['product'=>$datafromDb]);

    }

    public function create(){
        return view("product.productwithdata");


    }
    
    public function store(Request $request){
        $validateddata=$request->validate([
            "name"=> "required",
            'price' => 'required|numeric|min:0'
        ]);
        // dd($request);
        
        $newproduct= product_table::create($validateddata);              //save data to database true product module 
            return redirect(route('product.index'));           //after saving data redirecting productindex.php 

    }
    
    
    public function edit(product_table $product){
        return view("product.edit",['product'=> $product]);
        
        // dd ($product);


    }


    public function update(product_table $product, Request $request){
        $validateddata=$request->validate([
            "name"=> "required",
            'price' => 'required|numeric|min:0'
        ]);
        
        $product ->update($validateddata);

        return redirect(route('product.index'));

    }

    public function delete(product_table $product){
        $product->delete();

        return redirect(route('product.index'));
    }


    public function search(Request $request)
{
    $name = $request->input('name');

    
    $products = product_table::where('name', $name)->get();

    

    return view('product.productindex', ['product' => $products]);
}

}
