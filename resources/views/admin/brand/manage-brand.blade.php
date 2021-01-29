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
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication status</th>
                        <th>Action</th>

                    </tr>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_description}}</td>
                        <td>{{$brand->publication_status==1 ?'published':'unpublished'}}</td>
                        <td>


                            @if($brand->publication_status==1)

                            <a href="{{url('/brand/unpublished-brand/'.$brand->id)}}" class="btn btn-info btn-xs" title="published">
                                <span class="glyphicon glyphicon-arrow-up">publish</span>
                            </a>

                            @else
                                <a href="{{url('/brand/published-brand/'.$brand->id)}}" class="btn btn-warning btn-xs" title="Unpublished">
                                    <span class="glyphicon glyphicon-arrow-down">Unpublish</span>
                                </a>

                                @endif



                            <a href="{{url('/brand/edit-brand/'.$brand->id)}}" class="btn btn-info btn-xs" title="edit">
                                <span class="glyphicon glyphicon-edit">Edit

                                </span>
                            </a>

                            <a href="{{url('/brand/delete-brand/'.$brand->id)}}" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-xs" title="delete">

                                <span class="glyphicon glyphicon-trash">Delete

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
