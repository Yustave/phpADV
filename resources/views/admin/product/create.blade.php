@extends('layout.master')
@section('title','Admin Pannel')

@section('content')
<div class="product-ad-create">
    <div class="container">
        <div class="row offset-md-0.5">
            @if (\App\Classes\Session::has("error"))
                {{\App\Classes\Session::flash("error")}}
            @endif
            <div class="col-md-5">
                @include("layout.report_message")
                <form class="p-5" action="<?php echo URL_ROOT.'admin/product/create'?>" method="post" enctype="multipart/form-data">

                    <h3 class="text-white">Add Product</h3>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Name" class="form-label text-white">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="Price" class="form-label text-white">Price</label>
                            <input type="number" step="any" id="Price" name="price" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cat_id" class="text-white">Category</label>
                            <select class="form-select" id="cat_id" name="cat_id">
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="sub_cat_id" class="text-white">Sub Category</label>
                            <select class="form-select" id="sub_cat_id" name="sub_cat_id">
                                @foreach($sub_cats as $sub_cat)
                                <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">

                    <div class="mb-3">
                        <input class="form-control" type="file" id="file" name="file">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingTextarea2"  class="text-white">Description</label>
                        <textarea class="form-control" placeholder="Drop Description" id="floatingTextarea2" name="description" style="height: 100px"></textarea>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>

            <div class="col-md-7">   
                
            </div>
        </div>
    </div>
</div>
@endsection