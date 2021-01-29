@extends('front.master')

@section('body')


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br/>
                <h2 class="text-center text-success">My Shopping Cart</h2>

            </div>
            <div class="col-sm-12">
                <div class="panel-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>Sl No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total price</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                      @php($sum=0)

                    @forelse($cartProducts as $cartProduct)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$cartProduct->id }}</td>
                            <td>{{$cartProduct->name}}</td>
                            <td><img src="{{asset($cartProduct->options->image)}}" alt="" height="50" width="50" /></td>
                            <td>TK.{{$cartProduct->price }}</td>

                            <td>
                                <form action="{{url('/update-cart-product')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="number" value="{{$cartProduct->qty}}" name="qty" min="1">
                                    <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId" >
                                    <input type="submit" value="update" name="btn">

                                </form>
                            </td>
                            <td>Tk.{{$total = $cartProduct->price*$cartProduct->qty }}</td>
                            <td>
                                <a href="{{url('/delete-cart-product/'.$cartProduct->rowId)}}" class="btn btn-danger btn-xs" title="delete_cart">
                                    <span class="glyphicon glyphicon-trash">
                                    </span>
                                </a>

                            </td>

                        </tr>
                       @php($sum= $sum+ $total )

                        @empty
                            <h2>No product selected</h2>

                        @endforelse



                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Sub Total</th>
                            <td>Tk.{{$sum}}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>TK.{{$discount=0}}</td>
                        </tr>
                        <tr>
                            <th>Tax</th>
                            <td>TK.{{$tax=0}}</td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>TK.{{$grandTotal=($sum-$discount)+$tax}}</td>
                            {{Session::put('grandTotal',$grandTotal)}}
                        </tr>

                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <a href="{{url('/')}}" class="btn btn-success">Continue Shopping</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                @if(Session::get('customerID'))
                                <a href="{{url('/shipping-info')}}" class="btn btn-success">Check out</a>
                                @else
                                    <a href="{{url('/checkout')}}" class="btn btn-success">Check out</a>
                                @endif
                            </td>
                        </tr>
                    </table>


                </div>

            </div>


        </div>

    </div>

    @endsection
