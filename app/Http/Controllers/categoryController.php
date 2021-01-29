<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categoryController extends Controller
{
   public function addCategory(){

    return  view('admin.category.add-category');

}

 public function saveCategoryInfo(Request $request){

         $category=new category();

         $category->id=$request->id;
         $category->category_name=$request->category_name;
         $category->category_description=$request->category_description;
         $category->publication_status=$request->publication_status;
         $category->save();

         return redirect('/category/add-category')->with('message','category info save successfully');


}

 public function manageCategoryInfo(){

 $categories=category::all();
  return view('admin.category.manage-category',['categories'=>$categories]);
 }


 public function unpublishedCategoryInfo($id){

     $categoryByID=category::find($id);
     $categoryByID->publication_status=0;
     $categoryByID->save();

     return redirect('/category/manage-category')->with('message','category info unpublished successfully');


 }
public function publishedCategoryInfo($id){

     $categoryByID=category::find($id);
     $categoryByID->publication_status=1;
     $categoryByID->save();

     return redirect('/category/manage-category')->with('message','category info published successfully');


 }

 public function editCategoryInfo($id){
       $category=category::find($id);

       return view('admin.category.edit-category',['category'=>$category]);


 }

 public function updateCategoryInfo(Request $request){

  $categoryById=category::find($request->category_id);
  $categoryById->category_name=$request->category_name;
  $categoryById->category_description=$request->category_description;
  $categoryById->publication_status=$request->publication_status;
  $categoryById->save();

  return redirect('/category/manage-category')->with('message','category update successfully');

 }


 public function deleteCategoryInfo($id){
    $categoryById=category::find($id);
    $categoryById->delete();

    return redirect('/category/manage-category')->with('message','category delete successfully');

 }

}
