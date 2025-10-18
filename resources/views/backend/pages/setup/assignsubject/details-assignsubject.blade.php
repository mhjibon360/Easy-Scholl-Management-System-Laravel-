@extends('backend.layouts.master')
@section('title', 'details assign subject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">assign subject</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.assignsubject.view') }}">All</a>
                                </li>
                                <li class="breadcrumb-item active">Details</li>
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
                            <h4 class="card-title text-capitalize">Details Student assign subject class <strong
                                    class=" text-success">({{ $details->studentclass->name }})</strong></h4>
                            <a href="{{ route('setup.student.assignsubject.view') }}"
                                class="btn btn-primary waves-effect waves-light">
                                Go Back &nbsp;<i class="fas fa-arrow-left"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Full Mark</th>
                                            <th>Pass Mark</th>
                                            <th>Subjective Mark</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assignsubjects as $assignsubject)
                                            <tr>
                                                <td>{{ $assignsubject->studentsubject->name }}</td>
                                                <td> <span class=" text-success">{{ $assignsubject->full_mark }}</span></td>
                                                <td><span class=" text-warning">{{ $assignsubject->pass_mark }}</span></td>
                                                <td><span class=" text-primary">{{ $assignsubject->get_mark }} </span></td>
                                                <td>{{ $assignsubject->created_at->format('d-M-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
