@extends('front.master')
@section('body')

    <div class="men">
        <div class="container">
            <div class="col-md-12 register">

                <h2 class="text-center text-success">Welcome {{Session::get('customerName')}} .You have to give payment to complete your valuable order</h2>

            </div>


            <div class="col-md-12 register">
                <br/><br/>
                <form action="{{url('/new-order')}}" method="POST">
                    {{csrf_field()}}
                    <div class="register-top-grid">
                        <h1 class="text-center text-info">payment Form </h1>
                        <br/><br/>

                        <table class="table table-bordered">
                            <tr>
                                <th>Cash on delivery</th>
                                <th><input type="radio" name="payment_type" value="cash on delivery" /></th>
                            </tr>

                            <tr>
                                <th>Bikash</th>
                                <th><input type="radio" name="payment_type" value="Bikash" /></th>
                            </tr>

                            <tr>
                                <th>paypal</th>
                                <th><input type="radio" name="payment_type" value="paypal" /></th>
                            </tr>
                        </table>


                        <div>
                            <input type="submit" value="confirm order" class="btn btn-success form-control">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>

                    </div>

                </form>
                <div class="clearfix"> </div>

            </div>
        </div>
    </div>

@endsection


