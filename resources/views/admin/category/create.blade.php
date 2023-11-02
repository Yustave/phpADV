
@extends('layout.master')
@section('title','creat category')

@section('content')
<div class="bg-photo-create">
   
    <div class="container" style=" height: 768px; padding-top:40px;">
        <!-- <div class="my-5">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo URL_ROOT."admin"?>">Home</a></li>
                <li class="list-group-item"><a href="<?php echo URL_ROOT."admin/category/create"?>">Category</a></li>
                <li class="list-group-item"><a href="admin/category/create">Post</a></li>
            </ul>
        </div> -->
        <hr>
        <div class="row">
            <!-- Side Bar Start-->
            <div class="admin-list col-md-4">
                <!-- Category List Start -->
                <div>
                    <ul class="list-group my-5">
                        @foreach($cats as $cat)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="/admin/category/all">{{$cat->name}}</a>
                            <span>
                                <i class="fa fa-plus text-primary" onclick="showSubModal('{{$cat->name}}','{{$cat->id }}')">Sub</i>
                                <i class="bg-danger" onclick="fun('{{$cat->name}}','{{$cat->id }}')" id="editor">edit</i>
                                <a href="<?php echo URL_ROOT."admin/category/".$cat->id."/delete"?>"><i class="bg-danger">delete</i></a>
                            </span>
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
                            <a href="<?php echo URL_ROOT . 'admin/category/all'; ?>" style="text-decoration: none;color:darkblue;">{{$category->name}}</a>
                            <span class="float-end">

                                <i class="fa fa-edit text-warning" onclick="subCatEdit('{{$category->name}}','{{$category->id}}')" id="editor">edit</i>

                                <a href="<?php echo URL_ROOT . "admin/subcategory/$category->id/delete"; ?>">
                                    <i class="fa fa-trash text-danger">delete</i>
                                </a>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                        {!! $sub_pages !!}
                </div>
                <!-- SubCategory List End -->
            </div>
            <!-- Side Bar End -->

            <div class="col-md-4">
                <div>
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
    </div>
    <!--Category edit model_start -->
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

                            <input type="hidden" id="edit-token" value="{{\App\Classes\CSRFToken::_token()}}">

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

    <!-- Sub-Category Create Modal Start -->
    <div class="modal" tabindex="-1" id="SubCategoryCreateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form_Start -->
                                <form >
                                    <div class="mb-3">
                                        <label for="parent-cat-name" class="form-label">Parent Category</label>
                                        <input type="name" class="form-control" id="parent-cat-name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="sub-cat-name" class="form-label">Sub Category</label>
                                        <input type="name" class="form-control" id="sub-cat-name">
                                    </div>

                                    <input type="hidden" id="sub-cat-token" value="{{App\Classes\CSRFToken::_token()}}">

                                    <input type="hidden" id="parent-cat-id">

                                    <div class="row no-gutters py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary english" onclick="createSubCategory(event)">Create</button>
                                        </div>
                                    </div>
                                </form>
                            <!-- Form_End -->
                        </div>
                    </div>
                </div>
            </div>
    <!-- Sub-Category Create Modal End -->

    <!-- Modal Start -->
    <div class="modal" tabindex="-1" id="SubCategoryEditModal">
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
                                <input type="name" class="form-control" id="sub-cat-edit-name">
                            </div>

                            <input type="hidden" id="sub-cat-edit-token" value="{{App\Classes\CSRFToken::_token()}}">

                            <input type="hidden" id="sub-cat-edit-id">

                            <div class="row no-gutters py-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary english" onclick="subCatUpdateStart(event)">Update</button>
                                </div>
                            </div>
                        </form>
                    <!-- Form_End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
</div>
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
                // alert("name is "+name+" token is "+token+" id "+id);
                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/category/update',
                    data:{
                        name:name,
                        token:token,
                        id:id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }

            function showSubModal(name,id){
                $('#parent-cat-name').val(name);
                $('#parent-cat-id').val(id);
                $('#SubCategoryCreateModal').modal('show');
            }

            function createSubCategory($e){
                $e.preventDefault();
                var name = $('#sub-cat-name').val();
                var token = $('#sub-cat-token').val();
                var parent_cat_id = $('#parent-cat-id').val();
                $('#SubCategoryCreateModal').modal('hide');
                // alert("Name is "+name+" Token is "+token+" id is "+parent_cat_id);
                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/subcategory/create',
                    data:{
                        name:name,
                        token:token,
                        parent_cat_id:parent_cat_id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }

            function subCatEdit(name,id){
                $("#sub-cat-edit-name").val(name);
                $("#sub-cat-edit-id").val(id);

                $("#SubCategoryEditModal").modal("show");
                // alert("Subcat name is " + name + " Subcat id is " + id);
            }

            function subCatUpdateStart($e){
                $e.preventDefault();
                
                let name = $("#sub-cat-edit-name").val();
                let id = $("#sub-cat-edit-id").val();
                let token = $("#sub-cat-edit-token").val();

                $("#SubCategoryEditModal").modal("hide");

                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/subcategory/update',
                    data:{
                        name:name,
                        token:token,
                        id:id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }
        </script>
@endsection

    
