@extends('backend.layouts.master')
@section('title', 'all student fee category amount list view')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">fee category amount</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.feeamount.add') }}">add</a>
                                </li>
                                <li class="breadcrumb-item active">fee category amount</li>
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
                            <h4 class="card-title text-capitalize">Show All Student fee category amount</h4>
                            <a href="{{ route('setup.student.feeamount.add') }}"
                                class=" btn btn-primary waves-effect waves-light">Add fee category amount &nbsp;<i
                                    class=" fas fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Fee Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        {{-- @dd($value->fee_category_id) --}}
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->feecategories->name }}</td>
                                            <td>
                                                <a title="edit" href="{{ route('setup.student.feeamount.edit', $value->fee_category_id) }}"
                                                    class=" btn btn-warning waves-effect waves-light"> <i
                                                        class=" fas fa-edit"></i> </a>

                                                <a title="details" href="{{ route('setup.student.feeamount.details', $value->fee_category_id) }}"
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
