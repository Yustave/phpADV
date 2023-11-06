@extends('layout.master')
@section('title','Admin Pannel')

@section('content')
<div class="product-ad-home">
    @include('layout.admin_sidebar')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="admin-list col-md-7">
                    <!-- Category List Start -->
                        <div>
                            <ul class="list-group my-5">
                                @foreach($cats as $cat)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="/admin/category/all">{{$cat->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                            {!!$pages!!}
                        </div>
                    <!-- Category List End -->

                    <!-- SubCategory List Start -->
                        <div>
                            <ul class="list-group mt-5">
                                @foreach($sub_cats as $category)
                                <li class="list-group-item">
                                    <a href="<?php echo URL_ROOT . 'admin/category/all'; ?>" style="text-decoration: none;color:aqua;">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                                {!! $sub_pages !!}
                        </div>
                    <!-- SubCategory List End -->
                </div>
            </div>

            <div class="col-md-7">
                <!-- post show start -->
                    <div class ="d-flex justify-content-between">
                        @foreach($products as $product)
                            <div class="card col-md-5 my-5" style="width: 18rem;">
                                <img src="{{$product->image}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <span class="float-end">
                                        <a href="<?php echo URL_ROOT."admin/product/".$product->id."/edit"; ?>"; >
                                            <i class="fa fa-trash text-warning">edit</i>
                                        </a>
                                        <a href="#"; >
                                            <i class="fa fa-trash text-danger">delete</i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!!$products_pages!!}
                <!-- post show end -->
            </div>
        </div>
    </div>
    <a href="<?php echo URL_ROOT."admin/product/create"?>"> CREATE </a>
</div>

@endsection