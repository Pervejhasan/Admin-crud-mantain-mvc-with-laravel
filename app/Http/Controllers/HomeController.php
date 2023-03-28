<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{

    public $products;
    public function index(){
        $this->products=Product::all();
        return view('website.home.index',['products'=>$this->products]);
    }
    public function detail(){
//      $this->products=Product::find($id);
        return view('website.detail.index');
    }
public function detail2($id){
   $this->products=Product::find($id);
        return view('website.detail.index',['product'=>$this->products]);
    }

 public function shop(){
        return view('website.shop.index');
    }






}
