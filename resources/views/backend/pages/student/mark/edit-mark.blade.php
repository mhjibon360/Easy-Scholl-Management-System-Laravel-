@extends('backend.layouts.master')
@section('title', 'edit mark')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">edit Mark</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript::void();">add</a></li>
                                <li class="breadcrumb-item active">edit mark</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('student.edit.mark.update') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="my-3 from-group">
                                    <label for="year_id">Select Year</label>
                                    <select name="year_id" id="year_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose year--</option>
                                        @foreach ($allyears as $year)
                                            <option value="{{ $year->id }}">
                                                {{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="my-3 from-group">
                                    <label for="class_id">Select Class</label>
                                    <select name="class_id" id="class_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose class--</option>
                                        @foreach ($allclassess as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="my-3 from-group">
                                    <label for="assign_subject_id">Select Subject</label>
                                    <select name="assign_subject_id" id="assign_subject_id" class=" form-control" required>
                                        {{-- <option value="" selected disabled>--choose Subject--</option>
                                        @foreach ($allclassess as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="my-3 from-group">
                                    <label for="exam_type_id">Select ExamType</label>
                                    <select name="exam_type_id" id="exam_type_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose examtype--</option>
                                        @foreach ($examtypes as $type)
                                            <option value="{{ $type->id }}">
                                                {{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="my-3 from-group">
                                    <label for=""></label>
                                    <button class="btn btn-dark waves-effect waves-light search" id="search"
                                        name="search" type="button">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12" id="reg_result_holder">

                    </div>
                </div>
            </form>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            // get subject depend on class
            $(document).on('change', '#class_id', function() {
                var class_id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('student.get.subject') }}",
                    data: {
                        class_id: class_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var html =
                            '<option value="" selected disabled>--choose class--</option>';

                        $.each(response, function(key, value) {
                            html +=
                                `<option value="${value.id}" >${value.studentsubject.name}</option>`;
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });




            $(document).on('click', '#search', function() {
                var year_id = $('#year_id').val();
                var class_id = $('#class_id').val();
                var assign_subject_id = $('#assign_subject_id').val();
                var exam_type_id = $('#exam_type_id').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('student.edit.mark.find') }}",
                    data: {
                        year_id: year_id,
                        class_id: class_id,
                        assign_subject_id: assign_subject_id,
                        exam_type_id: exam_type_id,
                    },
                    dataType: "html",
                    success: function(response) {
                        $('#reg_result_holder').html(response);
                    }
                });

            });
        });
    </script>
@endpush
