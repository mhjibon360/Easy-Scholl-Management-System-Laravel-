@extends('backend.layouts.master')
@section('title', 'manage easy school settings')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Settings</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">settings</li>
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
                            <h4 class="card-title text-capitalize">Software Maintenance</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show"
                                role="alert">
                                <i class="mdi mdi-alert-outline label-icon"></i><strong>Warning</strong> The technical
                                meaning of maintenance involves functional checks, servicing, repairing or replacing of
                                necessary devices, equipment, machinery, building infrastructure and supporting utilities in
                                industrial, business, and residential installations.[1][2] Terms such as "predictive" or
                                "planned" maintenance describe various cost-effective practices aimed at keeping equipment
                                operational; these activities occur either before[3] or after a potential failure
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('maintenance.mode.down') }}" class=" w-md btn btn-danger waves-effect waves-light">Start Maintenance</a>
                                <a href="{{ route('maintenance.mode.up') }}" class="btn btn-success w-md">End Maintenance</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-capitalize">Manage Genral Settings</h4>
                        </div>
                        <div class="card-body">
                            <form id="myForm" action="{{ route('general.setting.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="software_name" class="form-label text-capitalize">Site Name </label>
                                            <input class="form-control" type="text" name="software_name"
                                                value="{{ config('settings.software_name') }}" id="software_name" required>
                                            @error('software_name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                    <a href="{{ route('settings') }}" class="btn btn-danger w-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-capitalize">SMTP Settings</h4>
                        </div>
                        <div class="card-body">
                            <form id="myForm" action="{{ route('smtp.setting.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="mail_mailer" class="form-label text-capitalize">Mail Mailer
                                                Name</label>
                                            <input class="form-control" type="text" name="mail_mailer"
                                                value="{{ config('settings.mail_mailer') }}" id="mail_mailer" required>
                                            @error('mail_mailer')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mail_host" class="form-label text-capitalize">Mail Host</label>
                                            <input class="form-control" type="text" name="mail_host"
                                                value="{{ config('settings.mail_host') }}" id="mail_host" required>
                                            @error('mail_host')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="mail_port" class="form-label text-capitalize">Mail Port</label>
                                            <input class="form-control" type="text" name="mail_port"
                                                value="{{ config('settings.mail_port') }}" id="mail_port" required>
                                            @error('mail_port')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="username" class="form-label text-capitalize">Username</label>
                                            <input class="form-control" type="text" name="username"
                                                value="{{ config('settings.username') }}" id="username" required>
                                            @error('username')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="password" class="form-label text-capitalize">password</label>
                                            <input class="form-control" type="text" name="password"
                                                value="{{ config('settings.password') }}" id="password" required>
                                            @error('password')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="from_mail" class="form-label text-capitalize">Mail From
                                                Address</label>
                                            <input class="form-control" type="text" name="from_mail"
                                                value="{{ config('settings.from_mail') }}" id="from_mail" required>
                                            @error('from_mail')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="from_mail_name" class="form-label text-capitalize">Mail From
                                                Name</label>
                                            <input class="form-control" type="text" name="from_mail_name"
                                                value="{{ config('settings.from_mail_name') }}" id="from_mail_name"
                                                required>
                                            @error('from_mail_name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="tls" class="form-label text-capitalize">Tls(optional)</label>
                                            <input class="form-control" type="text" name="tls"
                                                value="{{ config('settings.tls') }}" id="tls">
                                            @error('tls')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                    <a href="{{ route('settings') }}" class="btn btn-danger w-md">Cancel</a>
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
    {{-- <script type="text/javascript">
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
    </script> --}}
@endpush
