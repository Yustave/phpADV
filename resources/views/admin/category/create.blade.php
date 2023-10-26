
@extends('layout.master')
@section('title','creat category')

@section('content')
<div class="bg-photo-create">
   
    <div class="container" style=" height: 768px; padding-top:40px;">
        <div class="row">
            <div class="admin-list col-md-4">
                <div class="my-5">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo URL_ROOT."admin"?>">Home</a></li>
                        <li class="list-group-item"><a href="<?php echo URL_ROOT."admin/category/create"?>">Category</a></li>
                        <li class="list-group-item"><a href="admin/category/create">Post</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="list-group my-5">
                        @foreach($cats as $cat)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="/admin/category/all">{{$cat->name}}</a>
                            <span>
                                <i class="bg-danger" onclick="fun('{{ $cat->name}}','{{ $cat->id }}')" id="editor">edit</i>
                                <a href="<?php echo URL_ROOT."admin/category/".$cat->id."/delete"?>"><i class="bg-danger">delete</i></a>
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
    <!-- model_start -->
    <div class="modal" tabindex="-1" id="CategoryUpdateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form_Start -->
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="name" class="form-control" id="edit-name">
                                </div>

                                <input type="hidden" id="edit-token" value="{{App\Classes\CSRFToken::_token()}}">

                                <input type="hidden" id="edit-id">

                                <div class="row no-gutters py-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary english" onclick="startEdit(event)">Update</button>
                                    </div>
                                </div>
                            </form>
                        <!-- Form_End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- model end -->
        @endsection

        @section('script')

        <script>
            
            function fun(name,id){
                $("#edit-name").val(name);
                $("#edit-id").val(id);
                $("#CategoryUpdateModal").modal("show");
            }

            function startEdit($e){
                $e.preventDefault();
                var name = $("#edit-name").val();
                var token = $("#edit-token").val();
                var id = $("#edit-id").val();

                $('#CategoryUpdateModal').modal('hide');
                $.ajax({
                    type:'POST',
                    url:"<?php echo URL_ROOT.'admin/category/update'?>",
                    data:{
                        name:name,
                        token:token,
                        id:id
                    },
                    success:function(result){
                        window.location.href ="<?php echo URL_ROOT . "admin/category/create"?>"
                    },
                    error: function (response) {
                        console.log(response.responseText); // Log the response for debugging.
}


                });
            }
        </script>
@endsection

    
