@extends('backend.layouts.master')
@section('title', 'registrationfee genrate')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">manage registrationfee </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript::void();">add</a></li>
                                <li class="breadcrumb-item active">registrationfee</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="my-3 from-group">
                                    <select name="year_id" id="year_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose year--</option>
                                        @foreach ($allyears as $year)
                                            <option value="{{ $year->id }}"
                                                {{ $yearid == $year->id ? 'selected' : '' }}>
                                                {{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3 from-group">
                                    <select name="class_id" id="class_id" class=" form-control" required>
                                        <option value="" selected disabled>--choose class--</option>
                                        @foreach ($allclassess as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $classid == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3 from-group">
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
            $(document).on('click', '#search', function() {
                var year_id = $('#year_id').val();
                var class_id = $('#class_id').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('student.registrationfe.generate.result') }}",
                    data: {
                        year_id: year_id,
                        class_id: class_id,
                    },
                    dataType: "html",
                    success: function(response) {
                        console.log(response);

                        $('#reg_result_holder').html(response);
                    }
                });

            });
        });
    </script>
@endpush
