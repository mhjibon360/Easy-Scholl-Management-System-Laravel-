@extends('backend.layouts.master')
@section('title', 'details Student fee Amount')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Fee Category Amount</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('setup.student.feeamount.view') }}">All</a></li>
                                <li class="breadcrumb-item active">details</li>
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
                            <h4 class="card-title text-capitalize">Details Fee Amount <span
                                    class=" text-success">({{ $details->feecategories->name }})</span></h4>
                            <a href="{{ route('setup.student.feeamount.view') }}"
                                class="btn btn-primary waves-effect waves-light">
                                All Fee Amounts &nbsp;<i class="fas fa-list"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class=" text-center">
                                            <td colspan="2"><strong><i>{{ $details->feecategories->name }}</i></strong></td>
                                        </tr>
                                        @foreach ($feeamount as $amount)
                                            <tr>
                                                <td>{{ $amount->studentclass->name }}</td>
                                                <td>{{ $amount->amount }}</td>
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
