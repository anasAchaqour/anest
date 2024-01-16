@extends('layouts.index')
@section('content')
    <link rel="stylesheet" href="assets/css/products/index.css">


    @livewireStyles



    <div class="row ">
        <div class="col-md-12">
            <h4>/Products</h4>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="width: 50%; text-align: center;margin: auto">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('successDel'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="width: 30%; text-align: center;margin: auto">
                {{ session('successDel') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('successUP'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="width: 30%; text-align: center;margin: auto">
                {{ session('successUP') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>


    <hr>



    <div class="container-fluid cardss">
        <div class="row d-flex justify-content-between">
            <!-- First Card -->
            <div class="col-md-2 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Products</h5>
                        <p class="card-text">The total of all products is <b>200</b>.</p>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-4 mb-4">
                <div class="card card2 text-light">
                    <div class="card-body">
                        <h5 class="card-title"><b>New Products</b></h5>
                        <p class="card-text">
                            the new products this week are <span class="badge text-dark bg-light">8</span>.
                            <a href="" class="badge bg-light text-dark">Click Here</a>

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4 ">
                <div class="card bg-secondary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Low Stock Products</h5>
                        <p class="card-text">The total of low stock products is
                            <span class="badge bg-light text-dark">7</span>
                            <a href="" class="badge bg-light text-dark">Click Here</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Button on the right side -->
            <div class="col-md-2 mb-4 d-flex justify-content-end">
                <a>


                    <button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add new Product</button>
                </a>
            </div>
        </div>



        {{-- modal add new product --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action='/products/create' method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Enter the title" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Description</span>
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" aria-label="With textarea"
                                    name="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                    aria-label="Amount (to the nearest dollar)" name="price" placeholder="price">
                                <span class="input-group-text">.00</span>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Stock</span>
                                <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
                                    placeholder="enter the Stocke" aria-label="" aria-describedby="basic-addon1"
                                    name="stock">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="pro_pic">
                                <label class="input-group-text" for="inputGroupFile02">Upload image</label>
                            </div>
                            <div class="d-flex justify-content-around  mb-2">
                                <div class="">
                                    <select class="custom-select" name="category_id">
                                        <option selected>Categories</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">
                                                {{ $categorie->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <select class="custom-select" name="supplier_id" style="margin-bottom: 20px">
                                        <option selected>Suppliers</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">
                                                {{ $supplier->id . ' ' . $supplier->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- end modal add new product --}}
    </div>
















    <div class="main d-flex">
        <div class="side1">
            @livewire('filter-products')
        </div>
    </div>

    <!-- Include jQuery -->


    
    @livewireScripts
@endsection
