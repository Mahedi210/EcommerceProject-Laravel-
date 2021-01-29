<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use Illuminate\Http\Request;



class brandController extends Controller
{
   public function addBrand(){

       return view('admin.brand.add-brand');
   }

   public function saveBrandInfo(Request $request){

       $brand=new brand();
       $brand->brand_name=$request->brand_name;
       $brand->brand_description=$request->brand_description;
       $brand->publication_status=$request->publication_status;
       $brand->save();

       return redirect('/brand/add-brand')->with('message','Brand info save successfully');

   }

   public function manageBrandInfo(){

       $brands=brand::all();


    return view('admin.brand.manage-brand',['brands'=>$brands]);

   }

   public function unpublishedBrandInfo($id){

       $brandByID=brand::find($id);
       $brandByID->publication_status=0;
       $brandByID->save();

       return redirect('/brand/manage-brand')->with('message','brand info unpublished successfully');
   }


   public function publishedBrandInfo($id){

       $brandByID=brand::find($id);
       $brandByID->publication_status=1;
       $brandByID->save();

       return redirect('/brand/manage-brand')->with('message','brand info published successfully');
   }


   public function editBrandInfo($id){

       $brand=brand::find($id);

       return view('admin.brand.edit-brand',['brand'=>$brand]);

   }

   public function updateBrandInfo(Request $request){

       $brandById=brand::find($request->brand_id);
       $brandById->brand_name=$request->brand_name;
       $brandById->brand_description=$request->brand_description;
       $brandById->publication_status=$request->publication_status;
       $brandById->save();

       return redirect('/brand/manage-brand')->with('message','brand update successfully');

   }

   public function deleteBrandInfo($id){
       $brandById=brand::find($id);
       $brandById->delete();

       return redirect('/brand/manage-brand')->with('message','brand delete successfully');
   }



}
