@extends('layouts.admin')
@section('title')
    Manager Product
@endsection
@section('content')
    <div>
        <a class="btn btn-primary" onclick="showAdd()">Add Product</a>

    </div>
    @php
        $stt = 1;
    @endphp
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name Product</th>
            <th>Image Product</th>
            <th>Price Product</th>
            <th>Category</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{$stt++}}</th>
                <td>{{$item->name}}</td>
                <td style="width: 38%">
                    <img src="{{asset('assets/upload/product/'.$item->img)}}" width="12%" class="rounded" alt="...">
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->category->name}}</td>

                <td>{{$item->updated_at}}</td>

                <td>
                    <button type="button" class="btn btn-primary"
                            onclick="showProduct({{$item->id}})">Update
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct({{$item->id}})">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titile" >Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productFrom" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="idProduct" placeholder="Name Product">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name Category</label>
                            <input type="text" class="form-control" id="nameProduct" placeholder="Name Product">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Category Product</label>
                        <select class="form-select" id="category" aria-label="Default select example">
                            <option selected>Category</option>
                            @foreach($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price Category</label><br>
                            <input type="text" class="form-control" id="priceProduct" placeholder="Price Product">
                        </div>

                        <div class="form-group">
                            <div class="custom-file" id="img_avt">
                                <label class="custom-file-label" for="customFile">Image Product : </label><br>
                                <input type="file" class="custom-file-input" name="image" id="fileImageProduct">
                                <span class="text-danger" id="imageErrorMsg"></span>
                            </div>
                            <div class="mt-3" id="avt">
                                <img src="{{asset('backend1/img/photos/defaut.jpg')}}" width="60%" id="preview-image"
                                     alt="Ảnh xem trước">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="save" onclick="addProduct()">Add Category</button>
                </div>
                <div class="modal-footer" id="upload" style="display: none">
                    <button class="btn btn-primary" onclick="uploadProduct()">Upload Category</button>
                </div>

            </div>
        </div>
    </div>
@endsection
