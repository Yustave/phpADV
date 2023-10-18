@extends('layout.master')
@section('title','creat category')

@section('content')
    <div class="container my-5">
        <h1 class="texr-primary text-center">Create Category</h1>
        <div class="col-md-8 offset-md-2 my-5">
            <form action="<?php echo URL_ROOT."admin/category"?>" method="post">
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="row justify-content-end my-2">
                    <button type='submit' class="btn btn-primary btn-sm">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
    
