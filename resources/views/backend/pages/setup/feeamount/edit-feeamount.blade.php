@extends('backend.layouts.master')
@section('title', 'Edit Student Fee Category Amount')

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
                            <h4 class="card-title text-capitalize">Edit Student Fee Category Amount <span class=" text-success">({{ $editData->feecategories->name }})</span></h4>
                            <a href="{{ route('setup.student.feeamount.view') }}"
                                class="btn btn-primary waves-effect waves-light">
                                All Fee Amounts &nbsp;<i class="fas fa-list"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <form id="myForm" action="{{ route('setup.student.feeamount.update', $editData->fee_category_id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Fee Category -->
                                <div class="mb-3 form-group">
                                    <label for="fee_category_id" class="form-label text-capitalize">Fee Category</label>
                                    <select name="fee_category_id" id="fee_category_id" class="form-control" required>
                                        <option value="" disabled>Select Fee Category</option>
                                        @foreach ($feecategories as $feecategory)
                                            <option value="{{ $feecategory->id }}"
                                                {{ $editData->fee_category_id == $feecategory->id ? 'selected' : '' }}>
                                                {{ $feecategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fee_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Existing Fee Amounts -->
                                @forelse ($feeamount as $item)
                                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div id="add_item" class="add_item">
                                            <div class="row item-row">
                                                <div class="col-md-5">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label text-capitalize">Student Class</label>
                                                        <select name="class_id[]" class="form-control" required>
                                                            <option value="" disabled>Select Class</option>
                                                            @foreach ($allclasses as $class)
                                                                <option value="{{ $class->id }}"
                                                                    {{ $item->class_id == $class->id ? 'selected' : '' }}>
                                                                    {{ $class->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label text-capitalize">Amount</label>
                                                        <input type="number" class="form-control" name="amount[]"
                                                            value="{{ old('amount[]', $item->amount) }}"
                                                            placeholder="Enter amount" required>
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
                                    </div>
                                @empty
                                    <p class="text-danger">No fee amount data found.</p>
                                @endforelse

                                <!-- Submit Buttons -->
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light w-md">Update</button>
                                    <button type="reset"
                                        class="btn btn-danger waves-effect waves-light w-md">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden template for dynamic fields -->
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add">
                <div class="row ">
                    <div class="col-md-5">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Student Class <span
                                    class="text-danger">*</span></label>
                            <select name="class_id[]" required class="form-control">
                                <option value="" disabled selected>Select Class</option>
                                @foreach ($allclasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="mb-3 form-group">
                            <label class="form-label text-capitalize">Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount[]" class="form-control" placeholder="Enter amount" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success btn-sm addeventmore waves-effect waves-light"><i
                                class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger btn-sm removeeventmore waves-effect waves-light"><i
                                class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Add/Remove -->
    <script>
        $(document).ready(function() {
            var counter = 0;

            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $('#add_item').append(whole_extra_item_add);
                counter++;
            });

            $(document).on("click", '.removeeventmore', function() {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    fee_category_id: { required: true },
                    'class_id[]': { required: true },
                    'amount[]': { required: true },
                },
                messages: {
                    fee_category_id: { required: 'Please select fee category' },
                    'class_id[]': { required: 'Please select class' },
                    'amount[]': { required: 'Please enter amount' },
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
