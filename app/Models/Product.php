<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected static $product,$image,$imageUrl,$imageExtension,$imageName,$imageDirectory;

    public static function getImage($request){
        self::$image=$request->file('image');
        self::$imageExtension=self::$image->getClientOriginalExtension();
        self::$imageName=time().'.'.self::$imageExtension;
        self::$imageDirectory='product/Image/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
}
    public static function createProduct($request){
        self::$product = new Product();
        self::$product->name=$request->name;
        self::$product->brand_name=$request->brand_name;
        self::$product->category_name=$request->category_name;
        self::$product->description=$request->description;
        self::$product->status=$request->status;
        self::$product->image=self::getImage($request);
        self::$product->save();
    }


    public static function updateProduct($request,$id){
        self::$product=Product::find($id);
        if($request->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imageUrl=self::getImage($request);
        }
        else{
            self::$imageUrl=self::$product->image;
        }
        self::$product->name=$request->name;
        self::$product->brand_name=$request->brand_name;
        self::$product->category_name=$request->category_name;
        self::$product->description=$request->description;
        self::$product->status=$request->status;
        self::$product->image=self::$imageUrl;
        self::$product->save();

    }


public static function deleteProduct($id){
    self::$product=Product::find($id);
    if(file_exists(self::$product->image)){
        unlink(self::$product->image);
    }
    self::$product->delete();
}
}
