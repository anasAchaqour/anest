{{-- @foreach($clients as $client)
    <p>Client ID: {{ $client->id }}</p>
    <p>Contact: {{ $client->contact }}</p>
    <p>User ID: {{ $client->user->id }}</p>
    <p>User Name: {{ $client->user->name }}</p>
    <!-- Add more user attributes as needed -->
    ................................
@endforeach --}}


@extends('layouts.index')
@section('content')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/clients/index.css">
    <style>
        element.style {
            max-width: 15rem;
        }

        .card2 {
            background-color: #000a9481;
        }
    </style>




    <div class="row">
        <div class="col-md-12">
            <h4>/Admins</h4>
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


    <div class="container-fluid">
        <div class="row d-flex justify-content-between">
            <!-- First Card -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Admins</h5>
                        <p class="card-text">The total of all admins is <b>200</b>.</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Second Card -->
            <div class="col-md-4 mb-4">
                <div class="card card2 text-light">
                    <div class="card-body">
                        <h5 class="card-title"><b>client-Products</b></h5>
                        <p class="card-text">
                            Here you can see the Products of the clients . <a href="#"
                                class="badge bg-light text-dark">Click Here</a>

                        </p>
                    </div>
                </div>
            </div> --}}

            <!-- Button on the right side -->
            <div class="col-md-4 mb-4 d-flex justify-content-end">
                <a href="/admins/create">
                    <button class="btn btn-outline-dark m-3">Add new Admin</button>
                </a>
            </div>
        </div>
    </div>


    <hr>


    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered text-center align-middle mt-2">
                        <thead class="table-dark">
                            <tr>
                                <th></th>
                                <th>Admin Picture</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td><img src="{{ url('storage/' . $admin->user_pic) }}" alt="admin_img"
                                        class="img-thumbnail" width="100"></td>
                                    <td>{{ $admin->name }}  {{ $admin->lastName }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->adress }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-danger" title=" Delete "
                                            data-bs-toggle="modal" data-bs-target="#delConfirmation"
                                            data-admin-id="{{ $admin->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                        <a href="/admins/{{ $admin->id }}/edit">
                                            <button type="button" class="btn btn-outline-dark">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </a>

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
                                                        Are you sure you want to delete this admin ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form method="post" action="/admins/{{ $admin->id }}"
                                                            id="deleteForm">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
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

         // for delete modal
         $('#delConfirmation').on('show.bs.modal', function(event) {
             var button = $(event.relatedTarget); // Button that triggered the modal
             var adminId = button.data('admin-id'); // Extract category ID from data-* attributes
             var modal = $(this)
             // Update the form action attribute
             modal.find('#deleteForm').attr('action', '/admins/' + adminId);
         });
    </script>
@endsection
