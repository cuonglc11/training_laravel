@extends('layouts.admin')
@section('title')
    Manager Category
@endsection
@section('content')
    @php
        $stt = 1;
    @endphp
    <div>
        <a class="btn btn-primary" onclick="showAddCategory()" role="button">Add Category</a>

    </div>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name Category</th>
            <th>Image Category</th>
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
                    <img src="{{asset('assets/upload/category/'.$item->image)}}" width="12%" class="rounded" alt="...">
                </td>
                <td>{{$item->updated_at}}</td>

                <td>
                    <button type="button" class="btn btn-primary"
                            onclick="showEditCategory({{$item->id}})">Update
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deleteCategory({{$item->id}})">Delete</button>
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
                    <form id="yourFormId" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name Category</label>
                            <input type="text" class="form-control" id="nameCategory" placeholder="Name Cateogory">
                            <input type="hidden" class="form-control" id="idCategory" placeholder="Name Cateogory">
                        </div>
                        <div class="form-group">
                            <div class="custom-file" id="img_avt">
                                <label class="custom-file-label" for="customFile">Avata : </label>
                                <input type="file" class="custom-file-input" name="image" id="fileInput">
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
                    <button class="btn btn-primary" id="save" onclick="addCategory()">Add Category</button>
                </div>
                <div class="modal-footer" id="upload" style="display: none">
                    <button class="btn btn-primary" onclick="uploadCategory()">Upload Category</button>
                </div>

            </div>
        </div>
    </div>

@endsection
