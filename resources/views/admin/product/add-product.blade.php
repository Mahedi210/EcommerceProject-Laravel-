@extends('admin.master')

@section('body')
</br>
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            @if($message=Session::get('message'))
                <h2 class="text-center text-success">{{$message}}</h2>
            @endif


            <form class="form-horizontal" action="{{url('/product/new-product')}}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-sm-3" >Product Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="product_name" class="form-control" />

                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Category Name</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="category_id">
                            <option>Select category Name</option>

                            @foreach($publishedCategories as $publishedCategory)

                            <option value="{{$publishedCategory->id}}">{{$publishedCategory->category_name}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Brand Name</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="brand_id">
                            <option>Select Brand Name</option>
                            @foreach($publishedBrands as $publishedBrand)
                            <option value="{{$publishedBrand->id}}">{{$publishedBrand->brand_name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Product Price</label>
                    <div class="col-sm-9">
                        <input type="number" name="product_price" class="form-control" />

                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Product Quantity</label>
                    <div class="col-sm-9">
                        <input type="number" name="product_quantity" class="form-control" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Product Short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="Short_description"></textarea>

                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Product Long Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" row="10" name="long_description"></textarea>

                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-3" >Product Main Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="product_image" accept="image/*" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Product Sub Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="sub_image[]" accept="image/*" multiple />

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
                            <input type="submit" name="btn" class="btn btn-block btn-success " value="save Product Info" />

                        </div>

                    </div>


                </div>



            </form>

        </div>

    </div>

</div>
@endsection
