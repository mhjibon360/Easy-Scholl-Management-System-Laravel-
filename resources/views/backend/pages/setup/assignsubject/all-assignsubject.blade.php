@extends('backend.layouts.master')
@section('title', 'assign subject list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">assign subject</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.assignsubject.add') }}">add</a>
                                </li>
                                <li class="breadcrumb-item active">assign subject</li>
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
                            <h4 class="card-title text-capitalize">Show All assign subject</h4>
                            <a href="{{ route('setup.student.assignsubject.add') }}"
                                class=" btn btn-primary waves-effect waves-light">Add assign subject &nbsp;<i
                                    class=" fas fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Class</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        {{-- @dd($value->fee_category_id) --}}
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->studentclass->name }}</td>
                                            <td>
                                                <a title="edit"
                                                    href="{{ route('setup.student.assignsubject.edit', $value->class_id) }}"
                                                    class=" btn btn-warning waves-effect waves-light"> <i
                                                        class=" fas fa-edit"></i> </a>

                                                <a title="details"
                                                    href="{{ route('setup.student.assignsubject.details', $value->class_id) }}"
                                                    class=" btn btn-success waves-effect waves-light"> <i
                                                        class=" fas fa-eye"></i> </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
