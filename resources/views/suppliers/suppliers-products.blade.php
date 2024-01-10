@extends('layouts.index')
@section('content')
    <link rel="stylesheet" href="assets/css/suppliers/index.css">
    @livewireStyles








    
    <div class="container">
        @livewire('supplier-product-list')
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @livewireScripts
@endsection
