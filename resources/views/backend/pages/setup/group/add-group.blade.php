@extends('backend.layouts.master')
@section('title', 'all student group list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Studnet-group</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.group.view') }}">all</a></li>
                                <li class="breadcrumb-item active">Studnet-group</li>
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
                            <h4 class="card-title text-capitalize">Add Student group</h4>
                            <a href="{{ route('setup.student.group.view') }}"
                                class=" btn btn-primary waves-effect waves-light">All Studnet-group &nbsp;<i
                                    class=" fas fa-list"></i></a>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('setup.student.group.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label text-capitalize">group </label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" id="name">
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
                        required: 'Please enter student class',
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
