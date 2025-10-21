@extends('backend.layouts.master')
@section('title', 'manage marksheet')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Manage marksheet</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript::void();">add</a></li>
                                <li class="breadcrumb-item active">manage marksheet</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('student.student.marksheet.find') }}" method="post" target="_blank">
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

                            <div class="col-md-3">
                                <div class="my-3 from-group">
                                    <label for="assign_subject_id">Student ID NO</label>
                                    <input type="text" class=" form-control" name="id_no" id="id_no" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="my-3 from-group">
                                    <label for=""></label>
                                    <button class="btn btn-primary waves-effect waves-light search mt-1" id="search"
                                        type="submit" >Generate</button>
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
    {{-- <script>
        $(document).ready(function() {
            $(document).on('click', '#search', function() {
                var year_id = $('#year_id').val();
                var class_id = $('#class_id').val();
                var exam_type_id = $('#exam_type_id').val();
                var id_no = $('#id_no').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('student.student.marksheet.find') }}",
                    data: {
                        year_id: year_id,
                        class_id: class_id,
                        exam_type_id: exam_type_id,
                        id_no: id_no,
                    },
                    dataType: "html",
                    success: function(response) {
                        console.log(response);

                        $('#reg_result_holder').html(response);
                    }
                });

            });
        });
    </script> --}}
@endpush
