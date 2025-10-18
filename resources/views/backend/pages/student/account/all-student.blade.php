@extends('backend.layouts.master')
@section('title', 'manage student account')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Manage Student</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.account.create') }}">add</a></li>
                                <li class="breadcrumb-item active">manage-Student</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.account.list') }}" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="my-3 from-group">
                                    <select name="year_id" id="year_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose year--</option>
                                        @foreach ($allyears as $year)
                                            <option value="{{ $year->id }}"
                                                {{ $yearid == $year->id ? 'selected' : '' }}>
                                                {{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3 from-group">
                                    <select name="class_id" id="class_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose class--</option>
                                        @foreach ($allclassess as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $classid == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3 from-group">
                                    <button class="btn btn-dark waves-effect waves-light" name="search">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-capitalize">Show All Student List</h4>
                            <a href="{{ route('student.account.create') }}"
                                class=" btn btn-primary waves-effect waves-light">Add New Student
                                Account &nbsp;<i class=" fas fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Name</th>
                                        <th>ID No</th>
                                        <th>Roll</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Image</th>
                                        <th>Code</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->student->name }}</td>
                                            <td>{{ $value->student->id_no }}</td>
                                            <td>{{ $value->roll }}</td>
                                            <td>{{ $value->year->name }}</td>
                                            <td>{{ $value->class->name }}</td>
                                            <td>
                                                <img src="{{ isset($value->student->photo) ? asset($value->student->photo) : Avatar::create($value->student->name)->toBase64() }}"
                                                    class=" img-fluid img-thumbnail" alt=""
                                                    style="height: 50px;width:50px">
                                            </td>
                                            <td>
                                                {{ $value->student->code }}
                                            </td>
                                            <td>{{ $value->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a title="edti"
                                                    href="{{ route('student.account.edit', $value->student->id) }}"
                                                    class=" btn-sm  btn btn-warning waves-effect waves-light"> <i
                                                        class=" fas fa-edit"></i> </a>
                                                <a title="promotion"
                                                    href="{{ route('student.account.promotion', $value->student->id) }}"
                                                    class=" btn-sm  btn btn-info waves-effect waves-light"> <i
                                                        class=" fas fa-arrow-up"></i> </a>
                                                <a title="view" href="{{ route('student.account.view',$value->student->id) }}"
                                                    class=" btn-sm  btn btn-success waves-effect waves-light"> <i
                                                        class=" fas fa-eye"></i> </a>

                                                {{-- <form action="{{ route('delete.user', $value->id) }}" method="post"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class=" btn-sm delete_btn btn btn-danger waves-effect waves-light">
                                                        <i class=" fas fa-trash"></i> </button>
                                                </form> --}}
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
