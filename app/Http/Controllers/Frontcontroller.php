<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\subImage;
use Illuminate\Http\Request;
use DB;

class Frontcontroller extends Controller
{
 public function index(){

     $products=product::where('publication_status',1)->orderBy('id','desc')->take(8)->get();


     return view('front.home.home-content',['products'=>$products,]);

 }

 public function productCategory($id){

     $products=product::where('category_id',$id)->get();

     return view('front.category.product-category',['products'=>$products]);
 }


 public function productDetails($id){
//     $product=product::find($id);
     $product=DB::table('products')
         ->join('categories','products.category_id', "=",'categories.id')
         ->join('brands','products.brand_id',"=",'brands.id')
         ->select('products.*','categories.category_name','brands.brand_name')
         ->where('products.id',$id)
        ->first();

     $subImages=subImage::where('product_id',$id)->get();


     $latestProducts=product::where('publication_status',1)->orderBy('id','desc')->take(5)->get();

     $latestProductcategories=product::where('category_id',$product->category_id)->get();

     $categoryProducts=product::where('category_id',$product->category_id)->get();



     return view('front.product.product-details',[

         'product'=>$product,
         'subImages'=>$subImages,
         'latestProducts'=>$latestProducts,
         'latestProductcategories'=>$latestProductcategories


     ]);
 }


}
