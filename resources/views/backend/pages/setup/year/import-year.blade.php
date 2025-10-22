@extends('backend.layouts.master')
@section('title', 'import year list ')
@section('content')
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Import file <span class=" text-danger">(.xlsx)</span></h4>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('setup.student.year.import.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 form-group">
                                            <label for="import_file" class="form-label text-capitalize">year
                                                File</label>
                                            <input class="form-control" type="file" name="import_file" value=""
                                                id="import_file">
                                            @error('import_file')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                    <a href="{{ route('setup.student.year.view') }}" class="btn btn-danger w-md">Cancel</a>
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
                    import_file: {
                        required: true,
                    },
                },
                messages: {
                    import_file: {
                        required: 'Please select yeer list xlsx file',
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
