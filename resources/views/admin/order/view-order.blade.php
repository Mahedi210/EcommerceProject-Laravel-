@extends('admin.master')

@section('body')

    @if($message=Session::get('message'))
        <h2 class="text-center text-success">{{$message}}</h2>
    @endif

    <div class="row">
        <div class="card card-body">
            <div class="card-body">

                <h2>Customer Info For this order</h2>
                <hr/>

                <table class="table table-bordered table-hover">


                    <tr>
                        <th>Customer Name</th>
                        <th>{{$customer->first_name.''.$customer->last_name }}</th>

                    </tr>

                    <tr>
                        <th>Email Address</th>
                        <th>{{$customer->email}}</th>

                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <th>{{$customer->phone_number}}</th>

                    </tr>

                    <tr>
                        <th>Address</th>
                        <th>{{$customer->address}}</th>

                    </tr>

                </table>

              <h2>Shipping  Info For this order</h2>
                <hr/>

                <table class="table table-bordered table-hover">


                    <tr>
                        <th>Shipping Name</th>
                        <th>{{$shipping->full_name}}</th>

                    </tr>

                    <tr>
                        <th>Email Address</th>
                        <th>{{$shipping->email}}</th>

                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <th>{{$shipping->phone_number}}</th>

                    </tr>

                    <tr>
                        <th>Address</th>
                        <th>{{$shipping->address}}</th>

                    </tr>
                </table>


                <h2>Product Info For this order</h2>
                <hr/>

                <table class="table table-bordered table-hover">


                    <tr>
                        <th>SL NO</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>

                    </tr>
                    @php($i=1)
                    @foreach($products as $product)
                    <tr>
                        <td>$i++</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->product_quantity*$product->product_price}}</td>
                    </tr>
                    @endforeach


                </table>

            </div>

        </div>


    </div>
@endsection
