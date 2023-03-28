<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
public $products;
    public function add(){
        return view('admin.product.add');
    }

    public function create(Request $request){
       Product::createProduct($request);
       return back()->with('message','Product add Successfully');
    }

     public function manage(){

        $this->products=Product::all();

        return view('admin.product.manage',['products'=> $this->products]);
    }



    public function edit($id){

        $this->products=Product::find($id);

        return view('admin.product.edit',['product'=> $this->products]);
    }

    public function update(Request $request,$id){


        Product::updateProduct($request,$id);
        return back()->with('message',"Update Successfully");
    }

    public function delete($id){

       Product::deleteProduct($id);

        return back()->with('message',"Delete Successfully");
    }



}
