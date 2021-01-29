<?php

namespace App\Http\Controllers;

use App\order;
use App\payment;
use App\shipping;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\customer;
use Cart;
use App\orderDetail;

class Checkcontroller extends Controller
{
   public function index(){

       return view('front.checkout.checkout');
   }

   public function saveCustomerInfo(Request $request){
       $this->validate($request,[
           'first_name'=>'required|regex:/^[\pL\s\-]+$/u',
           'last_name'=>'required|regex:/^[\pL\s\-]+$/u',
           'email'=>'required|email|unique:customers,email',
//           'email'=>'required',
           'password'=>'required',
           'phone_number'=>'required|size:11|regex:/(01)[0-9]{9}/',
           'address'=>'required',

       ]);

       $customer=new customer();

       $customer->first_name=$request->first_name;
       $customer->last_name=$request->last_name;
       $customer->email=$request->email;
       $customer->password=bcrypt($request->password);
       $customer->phone_number=$request->phone_number;
//       $customer->token=str_random(10);
       $customer->address=$request->address;

       $customer->save();

       Session::put('customerID',$customer->id);
       Session::put('customerName',$customer->first_name.''.$customer->last_name);

       $data=$customer->toArray();

       Mail::send('front.email.congratulation-mail',$data,function ($message)use($data){
           $message->to($data['email']);
           $message->subject('congratulation mail');


       });

       return redirect('/shipping-info');


   }

   public function showshippingInfo(){
       $customer =customer::find(Session::get('customerID'));

       return view('front.checkout.shipping-info',['customer'=>$customer]);
   }





   public function customerLogout(){

       Session::forget('customerID');
       Session::forget('customerName');

       return redirect('/');
   }

   public function customerLogin(Request $request){

       $customer=customer::where('email',$request->email)->first();

       if($customer){
           if (password_verify($request->password,$customer->password)){

               Session::put('customerID',$customer->id);
               Session::put('customerName',$customer->first_name.''.$customer->last_name);
               return redirect('/shipping-info');


           }else{

               return redirect('/checkout')->with('message','Invaled Password');
           }

       }else{

           return redirect('/checkout')->with('message','Invaled email');
       }

}

public function saveShippingInfo(Request $request){


    $shipping=new shipping();
    $shipping->full_name=$request->full_name;
    $shipping->email=$request->email;
    $shipping->phone_number=$request->phone_number;
    $shipping->address=$request->address;
    $shipping->save();

    Session::put('shippingId',$shipping->id);

    return redirect('/payment-info');

}

public function showPaymentInfo(){

       return view('front.checkout.payment-form');
}



public function saveOrdarInfo(Request $request){

 $paymentType=$request->payment_type;

 if($paymentType=='cash on delivery'){
  $order=new order();
  $order->customer_id=Session::get('customerID');
  $order->shipping_id=Session::get('shippingId');
  $order->order_total=Session::get('grandTotal');
  $order->save();

  $payment=new payment();
  $payment->order_id=$order->id;
  $payment->payment_type=$paymentType;
  $payment->save();

  $cartProducts=Cart::content();
  foreach ($cartProducts as $cartProduct){
      $orderDetail=new orderDetail();
      $orderDetail->order_id=$order->id;
      $orderDetail->product_id=$cartProduct->id;
      $orderDetail->product_name=$cartProduct->name;
      $orderDetail->product_price=$cartProduct->price;
      $orderDetail->product_quantity=$cartProduct->qty;
      $orderDetail->save();
  }

     Cart::destroy();

    return redirect('/')->with('message','Thanks For your valuable ordar . we will contact with you very soon ');


 }
 else if ($paymentType=='Bikash'){


 }else if ($paymentType=='paypal'){


 }
}

//   public function signUpConfirmation($token){
//
//       $customer=customer::find($token);
//       $customer->status=1;
//       $customer->token='';
//       $customer->save();
//
//
//
//   }
}
