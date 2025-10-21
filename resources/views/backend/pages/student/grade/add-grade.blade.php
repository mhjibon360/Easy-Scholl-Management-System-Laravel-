@extends('backend.layouts.master')
@section('title', 'all student grade list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Studnet-grade</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.student.grade.view') }}">all</a></li>
                                <li class="breadcrumb-item active">Studnet-grade</li>
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
                            <h4 class="card-title text-capitalize">Add Student grade</h4>
                            <a href="{{ route('student.student.grade.view') }}"
                                class=" btn btn-primary waves-effect waves-light">All Studnet-grade &nbsp;<i
                                    class=" fas fa-list"></i></a>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('student.student.grade.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="grade_name" class="form-label text-capitalize">grade name
                                            </label>
                                            <input class="form-control" type="text" name="grade_name"
                                                value="{{ old('grade_name') }}" id="grade_name">
                                            @error('grade_name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="grade_point" class="form-label text-capitalize">grade point
                                            </label>
                                            <input class="form-control" type="text" name="grade_point"
                                                value="{{ old('grade_point') }}" id="grade_point">
                                            @error('grade_point')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="start_marks" class="form-label text-capitalize">start mark
                                            </label>
                                            <input class="form-control" type="text" name="start_marks"
                                                value="{{ old('start_marks') }}" id="start_marks">
                                            @error('start_marks')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="end_marks" class="form-label text-capitalize">emd mark
                                            </label>
                                            <input class="form-control" type="text" name="end_marks"
                                                value="{{ old('end_marks') }}" id="end_marks">
                                            @error('end_marks')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="start_point" class="form-label text-capitalize">start point
                                            </label>
                                            <input class="form-control" type="text" name="start_point"
                                                value="{{ old('start_point') }}" id="start_point">
                                            @error('start_point')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="end_point" class="form-label text-capitalize">end point
                                            </label>
                                            <input class="form-control" type="text" name="end_point"
                                                value="{{ old('end_point') }}" id="end_point">
                                            @error('end_point')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="remarks" class="form-label text-capitalize">remarks(insprition
                                                messag)
                                            </label>
                                            <input class="form-control" type="text" name="remarks"
                                                value="{{ old('remarks') }}" id="remarks">
                                            @error('remarks')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <label for="remarks" class="form-label text-capitalize"></label>
                                            <div class="mt-2">
                                                <button type="submit"
                                                    class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                                <a type="reset" class="btn btn-danger w-md">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
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
                    grade_name: {
                        required: true,
                    },
                    grade_point: {
                        required: true,
                    },
                    start_marks: {
                        required: true,
                    },
                    end_marks: {
                        required: true,
                    },
                    start_point: {
                        required: true,
                    },
                    end_point: {
                        required: true,
                    },
                    remarks: {
                        required: true,
                    },
                },
                messages: {
                    grade_name: {
                        required: 'Please enter grade name ',
                    },
                    grade_point: {
                        required: 'Please enter grade point',
                    },
                    start_marks: {
                        required: 'Please enter start mark',
                    },
                    end_marks: {
                        required: 'Please enter end mark',
                    },
                    start_point: {
                        required: 'Please enter start point ',
                    },
                    end_point: {
                        required: 'Please enter end point',
                    },
                    remarks: {
                        required: 'Please enter remark class',
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
