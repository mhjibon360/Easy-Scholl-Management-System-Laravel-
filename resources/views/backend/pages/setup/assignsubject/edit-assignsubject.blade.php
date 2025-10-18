@extends('backend.layouts.master')
@section('title', 'Edit Assign Subject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Assign Subject</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.assignsubject.view') }}">All</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
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
                            <h4 class="card-title text-capitalize">Edit Student Assign Subject</h4>
                            <a href="{{ route('setup.student.assignsubject.view') }}"
                                class="btn btn-primary waves-effect waves-light">
                                All Assign Subjects &nbsp;<i class="fas fa-list"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <form id="myForm"
                                action="{{ route('setup.student.assignsubject.update', $editData->class_id) }}"
                                method="post">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 form-group">
                                    <label for="class_id" class="form-label text-capitalize">Select Class</label>
                                    <select name="class_id" id="class_id" class="form-control" required>
                                        <option value="" disabled>Select Class</option>
                                        @foreach ($allclasses as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $editData->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Existing subjects -->
                                @foreach ($assignsubjects as $assign)
                                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="row mt-3 border-top pt-3">
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label text-capitalize">Subject</label>
                                                    <select name="subject_id[]" class="form-control" required>
                                                        <option value="" disabled>Select Subject</option>
                                                        @foreach ($allsubjects as $subject)
                                                            <option value="{{ $subject->id }}"
                                                                {{ $assign->subject_id == $subject->id ? 'selected' : '' }}>
                                                                {{ $subject->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label text-capitalize">Full Mark</label>
                                                    <input type="number" name="full_mark[]" class="form-control"
                                                        value="{{ $assign->full_mark }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label text-capitalize">Pass Mark</label>
                                                    <input type="number" name="pass_mark[]" class="form-control"
                                                        value="{{ $assign->pass_mark }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label text-capitalize">Subjective Mark</label>
                                                    <input type="number" name="get_mark[]" class="form-control"
                                                        value="{{ $assign->get_mark }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <button type="button"
                                                    class="addeventmore btn btn-success btn-sm waves-effect waves-light"
                                                    style="margin-top: 33px;">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm removeeventmore waves-effect waves-light"
                                                    style="margin-top: 33px;">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light w-md">Update</button>
                                    <a href="{{ route('setup.student.assignsubject.view') }}"
                                        class="btn btn-danger waves-effect waves-light w-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden template for new row -->
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add">
                <div class="row mt-3 border-top pt-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Select Subject <span
                                    class="text-danger">*</span></label>
                            <select name="subject_id[]" required class="form-control">
                                <option value="" disabled selected>Choose Subject</option>
                                @foreach ($allsubjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Full Mark</label>
                            <input type="number" name="full_mark[]" class="form-control" placeholder="Full Mark" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Pass Mark</label>
                            <input type="number" name="pass_mark[]" class="form-control" placeholder="Pass Mark"
                                required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Subjective Mark</label>
                            <input type="number" name="get_mark[]" class="form-control" placeholder="Subjective Mark"
                                required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Add/Remove Script -->
    <script>
        $(document).ready(function() {
            $(document).on("click", ".addeventmore", function() {
                var html = $('#whole_extra_item_add').html();
                $('#delete_whole_extra_item_add:last').after(html);
            });

            $(document).on("click", ".removeeventmore", function() {
                $(this).closest(".delete_whole_extra_item_add").remove();
            });
        });
    </script>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    'class_id': {
                        required: true
                    },
                    'subject_id[]': {
                        required: true
                    },
                    'full_mark[]': {
                        required: true
                    },
                    'pass_mark[]': {
                        required: true
                    },
                    'get_mark[]': {
                        required: true
                    },
                },
                messages: {
                    'class_id': {
                        required: 'Please select class'
                    },
                    'subject_id[]': {
                        required: 'Please select subject'
                    },
                    'full_mark[]': {
                        required: 'Please enter full mark'
                    },
                    'pass_mark[]': {
                        required: 'Please enter pass mark'
                    },
                    'get_mark[]': {
                        required: 'Please enter subjective mark'
                    },
                },
                errorElement: 'strong',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
