@php
    error_reporting(0);
@endphp
@extends('backend.layouts.master')
@section('title', 'dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Students</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $students }}">{{ $students }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-primary-subtle text-subjects">+{{ $students }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of students list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Teachers</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $teachers }}">{{ $teachers }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-info-subtle text-info">+{{ $teachers }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of teacher list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">classes</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $classes }}">{{ $classes }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-success-subtle text-success">+{{ $classes }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of classes list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Groups</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $groups }}">{{ $groups }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-danger-subtle text-danger">+{{ $groups }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of groups list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Shifts</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $shifts }}">{{ $shifts }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-warning-subtle text-warning">+{{ $shifts }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of shifts list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Subjects</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $subjects }}">{{ $subjects }}</span>
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-dark-subtle text-dark">+{{ $subjects }}</span>
                                <span class="ms-1 text-muted font-size-13">numbr of subjects list</span>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div><!-- end row-->


        </div>
        <!-- container-fluid -->
        <hr>

        <div class="container-fluid">




            @if (Auth::user()->role == 'teacher' || Auth::user()->role == 'admin')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4 class="card-title text-capitalize">Recent Register Students</h4>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('student.account.list') }}"
                                        class="btn-sm btn btn-dark waves-effect btn-label waves-light"><i
                                            class="bx bx-loader label-icon"></i> Loading..</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Si</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>E-mail</th>
                                            <th>Roll</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            <th>Code</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentstudents as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->id_no }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->assignstudent->roll }}</td>
                                                <td>{{ $value->assignstudent->year->name }}</td>
                                                <td>{{ $value->assignstudent->class->name }}</td>
                                                <td>
                                                    <img src="{{ isset($value->photo) ? asset($value->photo) : Avatar::create($value->name)->toBase64() }}"
                                                        class=" img-fluid img-thumbnail" alt=""
                                                        style="height: 50px;width:50px">
                                                </td>
                                                <td>
                                                    {{ $value->code }}
                                                </td>
                                                <td>{{ $value->created_at->format('d M Y') }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            @endif
        </div> <!-- container-fluid -->
    </div>
@endsection
