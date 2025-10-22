@extends('backend.layouts.master')
@section('title', 'all student year list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Student-Year</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.year.view') }}">all</a></li>
                                <li class="breadcrumb-item active">Studnet-year</li>
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
                            <h4 class="card-title text-capitalize">Add Student year</h4>
                            <div>
                                &nbsp;&nbsp;<a href="{{ route('setup.student.year.export') }}"
                                    class=" btn btn-warning waves-effect waves-light">Export Year &nbsp;<i
                                        class=" fas fa-download"></i></a>


                                &nbsp;&nbsp;<a href="{{ route('setup.student.year.import') }}"
                                    class=" btn btn-primary waves-effect waves-light">Import Year &nbsp;<i
                                        class=" fas fa-upload"></i></a>

                                <a href="{{ route('setup.student.year.view') }}"
                                    class=" btn btn-primary waves-effect waves-light">All Studnet-year &nbsp;<i
                                        class=" fas fa-list"></i></a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('setup.student.year.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label text-capitalize">Year </label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" id="name" required>
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                    <a type="reset" class="btn btn-danger w-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            // change password validation
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'please place year',
                    },
                },
                errorElement: 'strong',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
