@extends('backend.layouts.master')
@section('title', 'create new user account')
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
                                <li class="breadcrumb-item"><a href="{{ route('manage.user') }}">all</a></li>
                                <li class="breadcrumb-item active">crate new account</li>
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
                            <h4 class="card-title text-capitalize">Add New User</h4>
                            <a href="{{ route('manage.user') }}" class=" btn btn-primary waves-effect waves-light">All User
                                List &nbsp;<i class=" fas fa-list"></i></a>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('store.user') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="role" class="form-label text-capitalize">Select Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="admin">Admin</option>
                                                <option value="operator">Operator</option>
                                            </select>
                                            @error('role')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label text-capitalize">Full Name </label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" id="name">
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label text-capitalize">E-mail </label>
                                            <input class="form-control" type="text" name="email"
                                                value="{{ old('email') }}" id="email">
                                            @error('email')
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
                    role: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                },
                messages: {
                    role: {
                        required: 'Please select role',
                    },
                    name: {
                        required: 'Please enter name',
                    },
                    email: {
                        required: 'Please enter email',
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
