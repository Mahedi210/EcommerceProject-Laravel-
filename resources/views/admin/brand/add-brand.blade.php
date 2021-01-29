@extends('admin.master')

@section('body')
</br>
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            @if($message=Session::get('message'))
                <h2 class="text-center text-success">{{$message}}</h2>
            @endif

            <form class="form-horizontal" action="{{url('/brand/update-brand')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-sm-3" >Brand Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="brand_name" class="form-control" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Brand Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="brand_description"></textarea>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Publication Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="publication_status">
                            <option value="1">Publishaed</option>
                            <option value="0">Unpublishe</option>
                        </select>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-block btn-success " value="save Brand Info" />

                        </div>

                    </div>


                </div>



            </form>

        </div>

    </div>

</div>
@endsection
