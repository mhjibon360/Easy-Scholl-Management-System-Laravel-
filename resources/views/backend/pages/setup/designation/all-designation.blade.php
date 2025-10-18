@extends('backend.layouts.master')
@section('title', 'all student designation list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Studnet-designation</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.designation.add') }}">add</a></li>
                                <li class="breadcrumb-item active">Studnet-designation</li>
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
                            <h4 class="card-title text-capitalize">Show All Student designation</h4>
                            <a href="{{ route('setup.student.designation.add') }}"
                                class=" btn btn-primary waves-effect waves-light">Add Studnet-designation &nbsp;<i
                                    class=" fas fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Designation</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('setup.student.designation.edit', $value->id) }}"
                                                    class=" btn btn-warning waves-effect waves-light"> <i
                                                        class=" fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('setup.student.designation.delete', $value->id) }}"
                                                    method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete_btn btn btn-danger waves-effect waves-light"> <i
                                                            class=" fas fa-trash"></i> Delete</button>
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
