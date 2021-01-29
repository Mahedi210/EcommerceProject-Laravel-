@extends('front.master')
@section('body')

    <div class="men">
        <div class="container">
            <div class="col-md-12 register">

                <h2 class="text-center text-success">Welcome {{Session::get('customerName')}} .You have to give shipping info to complete your valuable order.if your billing address and shipping address same just press save to confirm it</h2>

            </div>


            <div class="col-md-12 register">
                <br/><br/>
                <form action="{{url('/new-shipping')}}" method="POST">
                    {{csrf_field()}}
                    <div class="register-top-grid">
                        <h1 class="text-center text-info">Shipping Form here</h1>
                        <br/><br/>
                        <div>
                            <span>Full Name<label>*</label></span>
                            <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}">
                            <span>{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
                        </div>

                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" value="{{$customer->email}}">
                            <span>{{$errors->has('email')? $errors->first('email'):''}}</span>
                        </div>



                        <div>
                            <span>Phone Number<label>*</label></span>
                            <input type="number" name="phone_number" value="{{$customer->phone_number}}">
                            <span>{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                        </div>
                        <div>
                            <span>Address<label>*</label></span>
                            <textarea name="address" class="form-control" >{{$customer->address}}</textarea>
                            <span>{{$errors->has('address')? $errors->first('address'):''}}</span>
                        </div>

                        <div>
                            <input type="submit" value="Save Shipping info" class="btn btn-success form-control">
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

