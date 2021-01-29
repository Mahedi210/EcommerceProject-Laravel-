@extends('admin.master')

@section('body')

    @if($message=Session::get('message'))
        <h2 class="text-center text-success">{{$message}}</h2>
    @endif

    <div class="row">
        <div class="card card-body">
            <div class="card-body">
                <table class="table table-bordered table-hover">

                    <tr>
                        <th>SL NO</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>payment Type</th>
                        <th>payment Status</th>
                        <th>Order Date</th>
                        <th>Action</th>

                    </tr>
                    @php($i=1)
                    @foreach( $orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->first_name.''.$order->last_name }}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->created_at}}</td>

                            <td>



                                    <a href="{{url('/order/view-order-details/'.$order->id)}}" class="btn btn-info btn-xs" title="View Order Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>



                                <a href="{{url('/order/view-order-invoice/'.$order->id)}}" class="btn btn-warning btn-xs" title="View Order Invoice">
                                    <span class="glyphicon glyphicon-zoom-out "></span>

                                </a><a href="{{url('/pdf')}}" class="btn btn-success btn-xs" title="Downlode Invoice">
                                    <span class="glyphicon glyphicon-download "></span>
                                </a>





                                <a href="{{url('/order/edit-order/'.$order->id)}}" class="btn btn-primary btn-xs" title="Edit Order">
                                <span class="glyphicon glyphicon-edit">

                                </span>
                                </a>

                                <a href="{{url('/order/delete-order/'.$order->id)}}" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-xs" title="order Delete">

                                <span class="glyphicon glyphicon-trash">

                                </span>
                                </a>
                            </td>
                        </tr>

                    @endforeach


                </table>

            </div>

        </div>


    </div>
@endsection
