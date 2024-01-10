<div>










    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand " href="suppliers">
                <button class="btn btn-sm btn-outline-secondary" type="button">Go Back</button>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <select class="form-select nav-item dropdown" aria-label="Default select example"
                        wire:model.lazy="perPage" id="perPage">
                        <option selected value="3">Show 3 per page</option>
                        <option value="6">Show 6 per page</option>
                        <option value="9">Show 9 per page</option>
                        <option value="12">Show 12 per page</option>
                    </select>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">....</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for Supplier . . ."
                        aria-label="Search" wire:model.debounce.lazy="query" id="query" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
        </div>
    </nav>


    <h3 class="mt-4 mb-4">Suppliers with Products</h3>

    @forelse ($suppliers as $supplier)
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $supplier->name }}</h2>
            </div>
            <ul class="list-group list-group-flush">
                <table class="table  text-center align-middle">
                    <tbody>
                        @forelse ($supplier->products as $product)
                            <tr>
                                <td>
                                    <img src="{{ url('storage/' . $product->pro_pic) }}" class="img-thumbnail"
                                        width="100" alt="Product Image">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td><b>Description : </b>
                                    {{ $product->description }}
                                </td>
                                <td><b>Category : </b>
                                    {{ optional($product->category)->name ?? 'N/A' }}
                                </td>
                                {{-- <td>
                                    <a href="">
                                        <button type="button" class="btn btn-outline-warning">Edit Thie Product</button>
                                    </a>
                                </td> --}}
                            </tr>

                        @empty
                            <li class="list-group-item">No products available for this supplier 🚫.</li>
                        @endforelse
                    </tbody>

                </table>
            </ul>
        </div>

    @empty
        <li class="list-group-item">No supplier found 🚫 .</li>
    @endforelse


    <div class="d-flex justify-content-center">
        {{ $suppliers->links() }}
    </div>










</div>
