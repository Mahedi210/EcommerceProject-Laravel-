<?php

namespace App\Http\Controllers;

use App\customer;
use App\order;
use App\orderDetail;
use App\payment;
use App\product;
use App\shipping;
//use Barryvdh\DomPDF\PDF;
use App\User;
use Illuminate\Http\Request;
use DB;
use PDF;



class orderController extends Controller
{


    public function manageOrderInfo(){
       /* $orders=order::all();*/

        $orders=DB::table('orders')
               ->join('customers','orders.customer_id','=','customers.id')
               ->join('payments','orders.id','=','payments.order_id')
               ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
               ->orderBy('orders.id','desc')
               ->get();


        /*return $orders;*/


        return view('admin.order.manage-order',['orders'=>$orders]);
    }


    public function viewOrderDetail($id){

        $order=order::find($id);
        $customer=customer::find($order->customer_id);
        $shipping=shipping::find($order->shipping_id);
        $products=orderDetail::where('order_id',$order->id)->get();

        return view('admin.order.view-order',[

            'customer'=>$customer,
            'shipping'=>$shipping,
            'products'=>$products



        ]);
    }

    public function viewOrderInvoice($id){


        return view('admin.order.view-invoice');


    }


    public function myPdf(){

        $users=User::all();

        $pdf=PDF::loadView('admin.order.dmeo',['users'=>$users]);
       return $pdf->download('demo.pdf');
    }


    public function editOrderInfo($id){
        return view('admin.order.edit-order');

    }

    public function updateOrderInfo(Request $request){

         $id=$request->id;

         $order=order::find($id);
         $order->order_status='Successfull';
         $order->save();

        $payment=payment::where('order_id',$id)->first();
        $payment->payment_status='Successfull';
        $payment->save();


        $orderDetails=orderDetail::where('order_id',$id)->get();

        foreach ($orderDetails as $orderDetail){

           $product= product::find($orderDetail->product_id);
           $product->product_quantity=$product->product_quantity-$orderDetail->product_quantity;
           $product->save();
           
        }
    }


}
