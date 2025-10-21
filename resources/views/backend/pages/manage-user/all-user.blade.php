@extends('backend.layouts.master')
@section('title', 'manage user account')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Manage User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('add.user') }}">add</a></li>
                                <li class="breadcrumb-item active">manage-user</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-capitalize">Show All Account List</h4>
                            <a href="{{ route('add.user') }}" class=" btn btn-primary waves-effect waves-light">Add New User
                                Account &nbsp;<i class=" fas fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Code</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->code }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                @if ($value->usertype == 'admin'||$value->usertype == 'employee')
                                                    <span
                                                        class="badge rounded-pill bg-success text-capitalize">{{ $value->usertype }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-info text-capitalize">{{ $value->usertype }}</span>
                                                @endif
                                            </td>
                                            <td>{{$value->created_at? $value->created_at->format('d M Y'):'' }}</td>
                                            <td>
                                                <a href="{{ route('edit.user', $value->id) }}"
                                                    class=" btn-sm  btn btn-warning waves-effect waves-light"> <i
                                                        class=" fas fa-edit"></i> </a>
                                                <form action="{{ route('delete.user', $value->id) }}" method="post"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class=" btn-sm delete_btn btn btn-danger waves-effect waves-light">
                                                        <i class=" fas fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    customClass: {
                        confirmButton: "btn btn-primary w-xs me-2 mt-2",
                        cancelButton: "btn btn-danger w-xs mt-2",
                    },
                    buttonsStyling: false,
                }).then(function(t) {
                    if (t.value) {
                        form.submit();
                    } else if (t.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "Cancelled",
                            text: "Your data is safe 🙂",
                            icon: "error",
                            confirmButtonColor: "#5156be",
                        });
                    }
                });
            });
        });
    </script>
@endpush
