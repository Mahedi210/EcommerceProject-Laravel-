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
                        <th>Product name</th>
                        <th>category Name</th>
                        <th>Brand Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication status</th>
                        <th>Action</th>

                    </tr>

                        <tr>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>Demo</td>
                            <td>

                                <a href="" title="View Product Details " class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-zoom-in"></span>

                                </a>

                                <a href="" title="Published Product " class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-arrow-up"></span>

                                </a>

                                <a href="" title="Edit Product" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>

                                </a>

                                <a href="" title="Delete Product  " class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>

                                </a>
                            </td>
                        </tr>



                </table>

            </div>

        </div>


    </div>
@endsection

