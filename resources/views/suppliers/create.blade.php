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
            <h4>/Suppliers/create</h4>
        </div>
    </div>

    <hr>

    <div class="w-100 h-100 d-flex align-items-center justify-content-center formDiv">
        <div class="w-75">
            <form class="w-100" action="/suppliers" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-3 text-center" style="margin-bottom: 20px">
                    <h3 class="modal-title" id="exampleModalLabel">Create new supplier</h3>
                </div>
                <!-- Your form content -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">name</span>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="complet name of supplier" aria-label="Username" aria-describedby="basic-addon1"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-floating mb-3">
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Leave a comment here"
                        id="floatingTextarea" name="address"></textarea>
                    <label for="floatingTextarea">Address</label>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Phone number</span>
                    <input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                        placeholder="enter the Phone number" aria-label="" aria-describedby="basic-addon1"
                        name="phone_number">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <a href="/suppliers">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
