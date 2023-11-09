@extends('layout.master')

@section('title', 'E-commerce')

@section('content')

<div class="container my-5">
    <h1 class="english bold">Product Detail</h1>
    <div class="container-fluid bg-light" >
        <div class="d-flex justify-content-around">
            <div class="col-md-5">
                <img src="{{$product->image}}" alt="food" class="img-fluid">
            </div>
            <div class="col-md-6 scrollable-col">
                <h3 class="mt-3 english bold">{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <button class="btn btn-secondary">$ {{$product->price}}</button>
                <button class="btn ">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

@endsection