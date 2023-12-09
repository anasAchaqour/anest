@extends('layouts.index')
@section('content')
    <link rel="stylesheet" href="assets/css/products/index.css">


    <div class="row">
        <div class="col-md-12">
            <h4>Products</h4>
        </div>
    </div>


    <hr>
    <section class="container-fluid cards">
        <div class="category-container mt-3">
            <div class="category-label">Products</div>
            <div class="category-count">15</div>
        </div>
        {{-- modal add new categorie --}}
        <div>
            <button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Add new Product</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">name</span>
                                    <input type="text" class="form-control" placeholder="enter the title"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload image</label>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end modal add new categorie --}}
    </section>




    <div class="">
        <div>
            <div class="">
                <span class="badge rounded-pill bg-dark mb-2 fs-6 col-md-6">Here you can filter the products</span>
                <div class="d-flex mb-2">
                    <div class="search-input w-50">
                        <i class="fas fa-search fa-lg text-primary me-2"></i>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="d-flex justify-content-around col-md-6 mb-2">
                    <div class="">
                        <select class="custom-select">
                            <option selected>Categories</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="">
                        <select class="custom-select">
                            <option selected>Suppliers</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3 card-group">
                <div class="card">
                    <img src="assets/images/sign/signin-image.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/images/sign/signin-image.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/images/sign/signin-image.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional
                            content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>






    </div>
@endsection
