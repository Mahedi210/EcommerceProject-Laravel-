<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use App\product;
use App\subImage;
use Illuminate\Http\Request;
use Image;

class productController extends Controller
{
    public function showproductForm(){

        $publishedCategories=category::where('publication_status',1)->get();
        $publishedBrands=brand::where('publication_status',1)->get();

        return view('admin.product.add-product',[
            'publishedCategories'=>$publishedCategories,
            'publishedBrands'=>$publishedBrands
        ]);
    }


    public function saveProductInfo(Request $request){

        $productImage=$request->file('product_image');
        $imageName=$productImage->getClientOriginalName();

        $directory='product_images/';
        $ImageUrl=$directory.$imageName;

        Image::make($productImage)->save($ImageUrl);


        $product=new product();
        $product->product_name=$request->product_name;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->Short_description=$request->Short_description;
        $product->long_description=$request->long_description;
        $product->product_image=$ImageUrl;
        $product->publication_status=$request->publication_status;
        $product->save();



        $productID=$product->id;

        $subImages=$request->file('sub_image');
        foreach( $subImages as  $subImage){

            $subImageName=$subImage->getClientOriginalName();

            $subImageDirectory='sub_images/';
            $subImageUrl=$subImageDirectory.$subImageName;

            Image::make($subImage)->save($subImageUrl);

            $subImage=new subImage();
            $subImage->product_id=$productID;
            $subImage->sub_image=$subImageUrl;
            $subImage->save();


        }

        return redirect('/product/add-product')->with('message','product save successfully');


    }



    public function manageProductInfo(){

        return view('admin.product.manage-product');
    }

}
