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

    <div class="row">
        <div class="col-md-12">
            <h4>/Admins/create</h4>
        </div>
    </div>

    <hr>

    <div class="w-100 h-100 d-flex align-items-center justify-content-center formDiv">
        <div class="w-75">
            <form class="w-100" action="/admins" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-3 text-center" style="margin-bottom: 20px">
                    <h3 class="modal-title" id="exampleModalLabel">Create new Client</h3>
                </div>
                <!--form content -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">First name</span>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="Admin name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Last name</span>
                    <input type="text" class="form-control {{ $errors->has('lastName') ? 'is-invalid' : '' }}"
                        placeholder="Admin last Name" name="lastName" value="{{ old('lastName') }}">
                    @error('lastName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-floating mb-3">
                    <textarea class="form-control {{ $errors->has('adress') ? 'is-invalid' : '' }}" placeholder="Address"
                        id="floatingTextarea" name="adress">{{old('adress')}} </textarea>
                    <label for="floatingTextarea">Address</label>
                    @error('adress')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="user_pic">
                    <label class="input-group-text" for="inputGroupFile02">Upload Admin picture</label>
                    @error('user_pic')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-floating mb-3">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                    <label for="floatingInput">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        id="floatingInput" placeholder="name@example.com" name="password">
                    <label for="floatingInput">Password</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <a href="/admins">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
