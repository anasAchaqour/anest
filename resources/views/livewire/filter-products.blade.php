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
                <select wire:model='bySupplier' id="bySupplier" class="custom-select">
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

            {{-- <div class="">
                <b>show</b>
                <select wire:model.lazy='perPage' id="perPage" class="custom-select w-auto">
                    <option value="9" selected>9</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                    <option value="18">18</option>
                </select>
                <b>Per Page</b>
            </div> --}}
        </div>

    </div>
    {{-- end filter products --}}

    {{-- ////////// --}}

    {{-- show products --}}
    <div class="mt-3 mb-3 card-group p-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <img src="assets/images/preview.png" class="card-img-top" alt="...">
                        <div class="card-body" style="border-top: 2px solid #838383c4; margin-top: 10px;">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="d-flex justify-content-between"><span
                                    class="badge bg-secondary">{{ $product->price }} $</span>
                                <u>{{ $product->stock }}
                                    pcs</u>
                            </h6>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <small class="text-muted"><a href="##">Delete</a> <a href="#">Edite</a></small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin: auto ; margin-top: 70px;">
            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
    {{-- end show products --}}
</div>
