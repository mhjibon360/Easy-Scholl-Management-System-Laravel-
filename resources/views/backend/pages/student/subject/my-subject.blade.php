@extends('backend.layouts.master')
@section('title', 'my subject list')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">my subject</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript::void();">all</a></li>
                                <li class="breadcrumb-item active">my subject</li>
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
                            <h4 class="card-title text-capitalize"> <span
                                    class=" text-danger">{{ $class->class->name }} </span>Subject List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Si</th>
                                            <th>Subject Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subectlists as $key=>$subject)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $subject->studentsubject->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
