@extends('layout.master')
@section('title','creat category')

@section('content')
<div class="bg-photo-create">
    <div class="container" style="padding-top:40px;">
        <h1 class="texr-primary text-center" style=" color:#abe8f3;">Create Category</h1>
        <div class="col-md-8 offset-md-2 my-5">
            <form action="<?php echo URL_ROOT."admin/category/create"?>" method="post">
                <div>
                    <label for="name" class="form-label" style=" color:#abe8f3;">Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="row justify-content-end my-2">
                    <button type='submit' class="btn btn-primary btn-sm">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection
    
