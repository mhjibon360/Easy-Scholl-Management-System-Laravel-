@extends('backend.layouts.master')
@section('title', 'profile')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm order-2 order-sm-1">
                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xl me-3">
                                                <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                                    alt="" class="img-fluid rounded-circle d-block">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                                                <p class="text-muted font-size-13">{{ Auth::user()->email }}</p>

                                                <div
                                                    class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                    @if (Auth::user()->address)
                                                        <div><i
                                                                class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ Auth::user()->address }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview"
                                        role="tab">Profile Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Change
                                        Password</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Profile</h5>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" action="{{ route('update.profile') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="name" class="form-label text-capitalize">Full
                                                        Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ Auth::user()->name }}" id="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="email" class="form-label text-capitalize">E-mail</label>
                                                    <input class="form-control" type="text" name="email"
                                                        value="{{ Auth::user()->email }}" id="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label for="address" class="form-label text-capitalize">Address</label>
                                                    <input class="form-control" type="text" name="address"
                                                        value="{{ Auth::user()->address }}" id="address">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3 form-group">
                                                    <label for="photo" class="form-label text-capitalize">Profile
                                                        Photo</label>
                                                    <input class="form-control photo" type="file" name="photo"
                                                        value="{{ Auth::user()->photo }}" id="photo">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                                        class=" img-fluid img-thumbnail p-1 photo_preview"
                                                        id="photo_preview" alt=""
                                                        style="height: 100px;width:100px;object-fit:cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class=" w-md btn btn-primary waves-effect waves-light">Update</button>
                                            <a type="reset" class="btn btn-danger waves-effect waves-light w-md">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="about" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Password</h5>
                                </div>
                                <div class="card-body">
                                    <form id="passwordForm" action="{{ route('change.password') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label for="password"
                                                        class="form-label text-capitalize">Password</label>
                                                    <input class="form-control" type="password" name="password"
                                                        value="" id="password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="new_password" class="form-label text-capitalize">New
                                                        Password</label>
                                                    <input class="form-control" type="password" name="new_password"
                                                        value="" id="new_password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="confirm_password" class="form-label text-capitalize">New
                                                        confirm_Password</label>
                                                    <input class="form-control" type="confirm_password"
                                                        name="confirm_password" value="" id="confirm_password"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class=" w-md btn btn-dark waves-effect waves-light">Change Password</button>
                                            <a type="reset" class="btn btn-danger w-md">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end col -->


            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>


@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // profile update form
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please enter name',
                    },
                    email: {
                        required: 'Please enter valid email',
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
            // change password validation
            $('#passwordForm').validate({
                rules: {
                    password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                    },
                    confirm_password: {
                        required: true,
                    },

                },
                messages: {
                    password: {
                        required: 'Please enter current password',
                    },
                    new_password: {
                        required: 'Please enter new password',
                    },
                    confirm_password: {
                        required: 'Confirm password required',
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
    <!--//photo preview script-->
    <script>
        $(document).ready(function() {
            $(document).on('change', '#photo', function(e) {
                photo_preview.src = URL.createObjectURL(e.target.files[0]);

            });
        });
    </script>
@endpush
