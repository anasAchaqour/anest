<div>



    {{-- filter products --}}
    <div>
        <span class="badge rounded-pill bg-dark mb-2 fs-6 w-100">Here you can filter the products</span>
        <div class="d-flex mb-2" style="">
            <div class="search-input w-100">
                <i class="fas fa-search fa-lg text-primary me-2"></i>
                <input type="text" wire:model.debounce.lazy="query" id="query" class="form-control"
                    placeholder="Search For a Product...">
                <button class="btn btn-primary" type="button"><i class="bi bi-search"></i>

            </div>



        </div>
        <div class="d-flex justify-content-around  mb-2 filter">
            <div>
                <button type="button" class="btn btn-primary" wire:click="resetSearch" id="resetS">
                    <i class="bi bi-arrow-clockwise"></i>
                    Reset Search
                </button>
            </div>
            <div class="">
                <select wire:model.lazy='byCategory' id="byCategory" class="custom-select">
                    <option selected>Categories</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">
                            {{ $categorie->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <select wire:model.lazy='bySupplier' id="bySupplier" class="custom-select">
                    <option selected>Suppliers</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">
                            {{ $supplier->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <select wire:model='orderBy' class="custom-select">
                    <option selected>Order By</option>
                    <option value="price">Price</option>
                    <option value="name">Name</option>
                    <option value="stock">Stock</option>

                </select>
            </div>

            <div>
                {{-- <button type="button" class="btn btn-primary">
                    <b>show</b>
                    <select wire:model.lazy='perPage' id="perPage" class="custom-select w-auto">
                        <option value="6">6</option>
                        <option value="9" selected>9</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="18">18</option>
                    </select>
                    <b>Per Page</b>

                </button> --}}
                <div class="select-container p-1">
                    <label for="perPage" class="select-label">Show</label>
                    <select wire:model.lazy="perPage" id="perPage" class="custom-select w-auto">
                        <option value="6">6</option>
                        <option value="9" selected>9</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="18">18</option>
                    </select>
                    Per Page
                </div>
            </div>


        </div>

    </div>
    {{-- end filter products --}}

    {{-- ////////// --}}

    {{-- show products --}}
    <div class="mt-3 mb-3 card-group p-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card p-2" style="height: 99%;">
                        <img src="{{ url('storage/' . $product->pro_pic) }}" class="card-img-top" alt="Product Image">
                        {{-- <img src="{{ asset('images/products/' . $product->pro_pic) }}" alt="image"
                        class="img-thumbnail" style="width: 60px;" height="100px"> --}}
                        <div class="card-body" style="border-top: 2px solid #838383c4; margin-top: 10px;">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="d-flex justify-content-between"><span
                                    class="badge bg-secondary">{{ $product->price }} $</span>
                                <u>{{ $product->stock }}
                                    pcs</u>
                            </h6>
                            <hr>
                            Categorie : <span class="badge bg-secondary m-2 ">
                                {{ optional($product->category)->name ? Str::limit($product->category->name, 10) : 'N/A' }}</span><br>
                            Supplier : <span class="badge bg-secondary m-2 ">
                                {{ Str::limit($product->supplier->name, 10) }}</span><br>


                            {{-- <div class="card-text" >{{ $product->description }} </div> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                title={{ $product->name }} data-bs-content={{ $product->description }}>Product
                                Description</button>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            {{-- <small class="text-muted"><a href="/products/delete/{{ $product->id }}">Delete</a> <a href="#">Edite</a></small> --}}
                            <small class="text-muted">
                                <a href="#" onclick="redirectToNewPage({{ $product->id }})">Delete</a>
                                {{-- <a href="/products/{{ $product->id }}/edit">Edite</a> --}}
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $product->id }}"
                                    style="background: none; border: none; color: #0d6efd; text-decoration: underline; cursor: pointer;"class="link-primary">
                                    Edit
                                </button>
                            </small>
                            <!-- Modal confirmation delete -->
                            {{-- <div class="modal fade" id="delConfirmation" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this categorie ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="redirectToNewPage({{ $product->id }})">Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- end Modal confirmation delete -->
                            {{-- edite modal --}}
                            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" id="editModal{{ $product->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action='/products/update/{{ $product->id }}' method="POST"
                                            enctype='multipart/form-data' id="editForm">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Name</span>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    placeholder="Enter the title" name="name"
                                                    value="{{ $product->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Description</span>
                                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" aria-label="With textarea"
                                                    name="description">{{ $product->description }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                                    aria-label="Amount (to the nearest dollar)" name="price"
                                                    placeholder="price" value="{{ $product->price }}">
                                                <span class="input-group-text">.00</span>
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Stock</span>
                                                <input type="number"
                                                    class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
                                                    placeholder="enter the Stocke" aria-label=""
                                                    aria-describedby="basic-addon1" name="stock"
                                                    value="{{ $product->stock }}">
                                                @error('stock')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02"
                                                    name="pro_pic">
                                                <label class="input-group-text" for="inputGroupFile02">Upload
                                                    image</label>
                                            </div>
                                            <div class="d-flex justify-content-around  mb-2">
                                                <div class="">
                                                    <select class="custom-select" name="category_id">

                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}"
                                                                {{ $categorie->id == $product->category_id ? 'selected' : '' }}>
                                                                {{ $categorie->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <select class="custom-select" name="supplier_id"
                                                        style="margin-bottom: 20px">

                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>
                                                                {{ $supplier->id . ' ' . $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end edit modal --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin: auto ; margin-top: 70px;">
            {{-- {{ $products->links('pagination::bootstrap-5', ['paginator' => $products]) }} --}}
            <a wire:click="load" class="btn btn-primary">Load more...</a>

        </div>
    </div>
    {{-- end show products --}}



    <script>
        //_________________________________ clear inputs after clickin reset
        // document.addEventListener('DOMContentLoaded', function() {
        //     var resetSearchButton = document.getElementById('resetS');

        //     resetSearchButton.addEventListener('click', function() {
        //         resetFilters();
        //     });

        //     function resetFilters() {
        //         document.getElementById('query').value = '';
        //         document.getElementById('byCategory').value = 'Categories'; // Reset to the default option
        //         document.getElementById('bySupplier').value = 'Suppliers'; // Reset to the default option
        //     }

        //     // Optional: You can also call the resetFilters function on page load or initialization
        //     resetFilters();
        // });
        document.getElementById('resetS').addEventListener('click', function() {
            location.reload(true); // Pass true to force a reload from the server and not from the browser cache
        });


        //_________________________________ delete link 
        function redirectToNewPage(id) {
            if (confirm("Are you sure you want to delete this categorie ?!")) {
                // Specify the URL of the new page
                var newPageUrl = '/products/delete/' + id;
                // Redirect to the new page
                window.location.href = newPageUrl;
            }

        }
    </script>




</div>
