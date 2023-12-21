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

    </div>


    <hr>
    <section class="container-fluid cards  d-flex align-items-center p-1">
        <div class="cardss d-flex justify-content-start  w-75">
            <div class="card text-dark bg-light mb-3 m-lg-3" style="max-width: 15rem;">
                <div class="card-header">
                    <h5 class="card-title">All Products</h5>
                </div>
                <div class="card-body">

                    <p class="card-text">The total of all products is <b>200</b>.</p>
                </div>
                {{-- <div class="" style="position: absolute; bottom: 0; right: 0; margin: 5px">
                    <a href="#" class="btn btn-sm btn-secondary ">See Details</a>
                </div> --}}
            </div>
            <div class="card text-white bg-secondary mb-3 m-lg-3" style="max-width: 15rem;">
                <div class="card-header">
                    <h5 class="card-title">New Products</h5>
                </div>
                <div class="card-body">

                    <p class="card-text">the new products this week are <span class="badge text-dark bg-light">8</span></p>
                </div>
                <div class="" style="position: absolute; bottom: 0; right: 0;  margin: 5px">
                    <a href="#" class="btn btn-sm btn-secondary bg-light text-dark">See Details</a>
                </div>
            </div>
            <div class="card text-white  mb-3 m-lg-3 card2" style="max-width: 15rem;">
                <div class="card-header">
                    <h5 class="card-title">Low Stock Products</h5>
                </div>
                <div class="card-body">

                    <p class="card-text">The total of low stock products is
                        <span class="badge bg-light text-dark">7</span>
                    </p>
                </div>
                <div class="" style="position: absolute; bottom: 0; right: 0;  margin: 5px">
                    <a href="#" class="btn btn-sm text-dark bg-light ">See Details</a>
                </div>
            </div>

        </div>
        {{-- modal add new categorie --}}
        <div class="" style="margin-right: 10px">
            <button type="button" class="btn btn-outline-dark w-100" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Add new Product</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/products/create" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">name</span>
                                    <input type="text" class="form-control" placeholder="enter the title"
                                        aria-label="Username" aria-describedby="basic-addon1" name="name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                        name="price" placeholder="price">
                                    <span class="input-group-text">.00</span>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Stock</span>
                                    <input type="number" class="form-control" placeholder="enter the Stocke" aria-label=""
                                        aria-describedby="basic-addon1" name="stock">
                                </div>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="pro_pic">
                                    <label class="input-group-text" for="inputGroupFile02">Upload image</label>
                                </div>
                                <div class="d-flex justify-content-around  mb-2">
                                    <div class="">
                                        <select class="custom-select" name="category_id">
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">
                                                    {{ $categorie->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="">
                                        <select class="custom-select" name="supplier_id" style="margin-bottom: 20px">
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">
                                                    {{ $supplier->id . ' ' . $supplier->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- end modal add new categorie --}}
    </section>

    <div class="main d-flex">
        <div class="side1">
            @livewire('filter-products')
        </div>
    </div>



    @livewireScripts
@endsection
