@extends('layouts.index')
@section('content')

    <div class="container">
        <h1 class="mt-4 mb-4">All Suppliers with Products</h1>

        @foreach ($suppliers as $supplier)
            <div class="card mb-4">
                <div class="card-header">
                    <h2>{{ $supplier->name }}</h2>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($supplier->products as $product)
                        <li class="list-group-item">{{ $product->name }}</li>
                    @empty
                        <li class="list-group-item">No products available for this supplier.</li>
                    @endforelse
                </ul>
            </div>
        @endforeach

    </div>
@endsection
