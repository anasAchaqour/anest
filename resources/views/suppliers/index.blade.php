@extends('layouts.index')
@section('content')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/suppliers/index.css">




    <div class="row">
        <div class="col-md-12">
            <h4>/Suppliers</h4>
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
            <div class="category-label">Suppliers</div>
            <div class="category-count">15</div>
        </div>


        <a href="/suppliers/create">
            <button class="btn btn-outline-dark m-3">Add new Supplier</button>
        </a>
    </section>
    <hr>
    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->phone_number }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-danger" title=" Delete "
                                            data-bs-toggle="modal" data-bs-target="#delConfirmation"
                                            data-category-id="{{ $supplier->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                        <a href="/categories/{{ $supplier->id }}/edit">
                                            <button type="button" class="btn btn-outline-dark">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <!-- JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- pdfmake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <!-- pdfmake vfs_fonts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Buttons HTML5 -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script>
        // =============  Data Table - (Start) ================= //

        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
        // =============  Data Table - (End) ================= //
    </script>
@endsection
