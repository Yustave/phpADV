
@extends('layout.master')
@section('title','creat category')

@section('content')
<div class="bg-photo-create">
   
    <div class="container" style=" height: 768px; padding-top:40px;">
        <div class="row">
            <div class="admin-list col-md-4">
                <div class="my-5">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="list-group my-5">
                        @foreach($cats as $cat)
                        <li class="list-group-item">
                            <a href="/admin/category/all">{{$cat["name"]}}</a>
                            <span>
                                <i class="bg-danger">edit</i>
                                <a href="<?php echo URL_ROOT."admin/category/".$cat["id"]."/delete"?>"><i class="bg-danger">delete</i></a>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    {!!$pages!!}
                </div>
            </div>

            <div class="col-md-4">
                <h1 class="texr-primary text-center" style=" color:#abe8f3;">Create Category</h1>
                @if (\App\Classes\Session::has("error"))
                    {{\App\Classes\Session::flash("error")}}
                @endif
                <div class="my-5">
                    <div>
                        @include("layout.report_message")
                        @if (\App\Classes\Session::has("del_success"))
                            {{\App\Classes\Session::flash("del_success")}}
                        @endif

                        @if (\App\Classes\Session::has("del_fail"))
                            {{\App\Classes\Session::flash("del_fail")}}
                        @endif
                        <form action="<?php echo URL_ROOT."admin/category/create"?>" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="name" class="form-label" style=" color:#abe8f3;">Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                            <div class="row justify-content-end my-2">
                                <button type='submit' class="btn btn-primary btn-sm">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
        

    
@endsection
    
