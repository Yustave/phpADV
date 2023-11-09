@extends('layout.master')
@section('title','KDA_E-commerce')


@section('content')
<div class="bg-photo-home">
    <h1 class="text-center text-white pt-5">K D A</h1>
    <p class="text-white tect-center container">
        If you decide to go with the separate scripts solution, 
        Popper must come first (if you’re using tooltips or popovers),
        and then our JavaScript plugins.Curious which components explicitly
        require our JavaScript and Popper? Click the show components link below.
        If you’re at all unsure about the general page structure, keep reading for 
        an example page template.
    </p>
    <!-- post show start -->
        <div class ="container offset-md-1 row justify-content-between">
            @foreach($products as $product)
                <div class="card col-md-5 my-5" style="width: 18rem;">
                    <img src="{{$product->image}}" class="card-img-top pt-3" alt="">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>

                        <?php $shortDescription = substr($product->description, 0, 40);?>

                        <p class="card-text pt-3">Price {{$shortDescription}}....</p>

                        <span class="d-flex justify-content-between">
                            <p class="card-text">Price ${{$product->price}}</p>

                            <p>
                                <a href="<?php echo URL_ROOT."admin/product/".$product->id."/detail"; ?>"class="text-decoration-none text-danger" >
                                   detail
                                </a>
                                <a href="<?php echo URL_ROOT. "admin/product/".$product->id."/delete"; ?>" class="text-decoration-none text-danger">
                                   Add To Cart
                                </a>
                            </p>
                            
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
        {!!$products_pages!!}
    <!-- post show end -->
</div>
@endsection

