@extends('layouts.index')
@section('content')
    <link rel="stylesheet" href="assets/css/categories/index.css">



    <div class="row">
        <div class="col-md-12">
            <h4>Categories</h4>
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
    <section class="container-fluid cards">
        <div class="category-container mt-3">
            <div class="category-label">Categories</div>
            <div class="category-count">15</div>
        </div>

        {{-- modal add new categorie --}}
        <a href="/categories/create">
            <button class="btn btn-outline-dark m-3">Add new category</button>
        </a>

        {{-- <div>
            <button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Add new category</button>
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
        </div> --}}

        {{-- end modal add new categorie --}}
    </section>


    <div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table " style="width: 100%">
                            <thead class="">
                                <tr>
                                    <th></th>
                                    <th>picture</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->id }}</td>
                                        <td><img src="{{ url('storage/' . $categorie->cat_pic) }}" alt="category_img"
                                                class="img-thumbnail" width="100"></td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>{{ $categorie->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" title=" Delete "
                                                data-bs-toggle="modal" data-bs-target="#delConfirmation">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                            <a href="/categories/{{ $categorie->id }}/edit">
                                                <button type="button" class="btn btn-outline-dark">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </a>


                                            {{-- modal edit categorie --}}
                                            {{-- <div>
                                                <div class="modal fade" id="editModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update this
                                                                    category</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">name</span>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="enter the title"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Description</span>
                                                                        <textarea class="form-control" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" class="form-control"
                                                                            id="inputGroupFile02">
                                                                        <label class="input-group-text"
                                                                            for="inputGroupFile02">Upload image</label>
                                                                    </div>


                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- end modal edit categorie --}}

                                            <!-- Modal confirmation delete -->
                                            <div class="modal fade" id="delConfirmation" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this categorie ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form method="post" action="/categories/{{ $categorie->id }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                            {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal confirmation delete -->


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>picture</th>
                                    <th>Name</th>
                                    <th>description</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
