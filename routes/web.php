<?php

Route::get('/','Frontcontroller@index');

Route::get('/product-category/{id}','Frontcontroller@productCategory');
Route::get('/product-details/{id}','Frontcontroller@productDetails');

Route::post('/add-to-cart','Cartcontroller@addTocart');
Route::get('/show-cart','Cartcontroller@showCart');
Route::post('/update-cart-product','Cartcontroller@updateCart');
Route::get('/delete-cart-product/{id}','Cartcontroller@deleteCart');


Route::get('/checkout','Checkcontroller@index');
Route::post('/new-customer','Checkcontroller@saveCustomerInfo');
Route::get('/shipping-info','Checkcontroller@showshippingInfo');
Route::get('/customer-logout','Checkcontroller@customerLogout');
Route::post('/customer-login','Checkcontroller@customerLogin');
Route::post('/new-shipping','Checkcontroller@saveShippingInfo');
Route::get('/payment-info','Checkcontroller@showPaymentInfo');
Route::post('/new-order','Checkcontroller@saveOrdarInfo');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add-category', 'categoryController@addCategory');
Route::post('/category/new-category', 'categoryController@saveCategoryInfo');
Route::get('/category/manage-category', 'categoryController@manageCategoryInfo');
Route::get('/category/unpublished-category/{id}', 'categoryController@unpublishedCategoryInfo');
Route::get('/category/published-category/{id}', 'categoryController@publishedCategoryInfo');
Route::get('/category/edit-category/{id}', 'categoryController@editCategoryInfo');
Route::post('/category/update-category', 'categoryController@updateCategoryInfo');
Route::get('/category/delete-category/{id}', 'categoryController@deleteCategoryInfo');


Route::get('/brand/add-brand', 'brandController@addBrand');
Route::post('/brand/new-brand', 'brandController@saveBrandInfo');
Route::get('/brand/manage-brand', 'brandController@manageBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/unpublished-brand/{id}', 'brandController@unpublishedBrandInfo');
Route::get('/brand/published-brand/{id}', 'brandController@publishedBrandInfo');
Route::get('/brand/edit-brand/{id}', 'brandController@editBrandInfo');
Route::post('/brand/update-brand', 'brandController@updateBrandInfo');
Route::get('/brand/delete-brand/{id}', 'brandController@deleteBrandInfo');



Route::get('/product/add-product', 'productController@showproductForm');
Route::post('/product/new-product', 'productController@saveProductInfo');
Route::get('/product/manage-product', 'productController@manageProductInfo');

Route::get('/manage-order', 'orderController@manageOrderInfo');
Route::get('/order/view-order-details/{id}', 'orderController@viewOrderDetail');
Route::get('/order/view-order-invoice/{id}', 'orderController@viewOrderInvoice');
Route::get('/order/edit-order/{id}', 'orderController@editOrderInfo');
Route::post('/update-order/{id}', 'orderController@updateOrderInfo');

Route::get('/pdf', 'orderController@myPdf');





