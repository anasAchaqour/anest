@extends('layouts.index')
@section('content')
    <style>
        .formDiv {
            -webkit-box-shadow: 0px 0px 5px 0px rgba(77, 77, 77, 0.56);
            -moz-box-shadow: 0px 0px 5px 0px rgba(77, 77, 77, 0.56);
            box-shadow: 0px 0px 5px 0px rgba(77, 77, 77, 0.56);
            margin-top: 100px;
        }
    </style>



    <div class="w-100 h-100 d-flex align-items-center justify-content-center formDiv">
        <div class="w-75">
            <form class="w-100" action="/categories/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="p-3 text-center" style="margin-bottom: 20px">
                    <h3 class="modal-title" id="exampleModalLabel">Update this category</h3>
                </div>
                <!-- Your form content -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">name</span>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="enter the title" aria-label="Username" aria-describedby="basic-addon1" name="name"
                        value="{{ $category->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" aria-label="With textarea"
                        name="description">{{ $category->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control {{ $errors->has('cat_pic') ? 'is-invalid' : '' }}"
                        id="inputGroupFile02" name="cat_pic">
                    <label class="input-group-text" for="inputGroupFile02">Upload image</label>
                    @error('cat_pic')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <a href="/categories">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
