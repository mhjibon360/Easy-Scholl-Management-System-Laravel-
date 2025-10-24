@extends('backend.layouts.master')
@section('title', 'promote student account')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row ">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 text-capitalize">Promotion Student</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.account.create') }}">all</a></li>
                                <li class="breadcrumb-item active">Promotion Student</li>
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
                            <h4 class="card-title text-capitalize">Promotion Student</h4>
                            <a href="{{ route('manage.user') }}" class=" btn btn-primary waves-effect waves-light">All
                                Student
                                List &nbsp;<i class=" fas fa-list"></i></a>
                        </div>
                        <div class="card-body">

                            <form id="myForm" action="{{ route('student.account.promotion.store', $data->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label text-capitalize">Full Name <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ $data->name }}" id="name">
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label text-capitalize">E-mail <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="email"
                                                value="{{ $data->email }}" id="email">
                                            @error('email')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="mobile" class="form-label text-capitalize">Mobile/Phone <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="mobile"
                                                value="{{ $data->mobile }}" id="mobile">
                                            @error('mobile')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="address" class="form-label text-capitalize">address <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ $data->address }}" id="address">
                                            @error('address')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="gender" class="form-label text-capitalize">gender <font
                                                    style="color: red;">*</font></label>
                                            <div class=" d-flex">
                                            </div>
                                            <input type="radio" {{ $data->gender == 'male' ? 'checked' : '' }}
                                                id="male" name="gender" value="male">
                                            <label for="male">Male</label>
                                            <input type="radio" {{ $data->gender == 'female' ? 'checked' : '' }}
                                                id="female" name="gender" value="female">
                                            <label for="female">Female</label>
                                            <input type="radio" id="ohters"
                                                {{ $data->gender == 'ohters' ? 'checked' : '' }} name="gender"
                                                value="ohters">
                                            <label for="ohters">Others</label>
                                            @error('gender')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="fname" class="form-label text-capitalize">Father's name <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="fname"
                                                value="{{ $data->fname }}" id="fname">
                                            @error('fname')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="mname" class="form-label text-capitalize">Mother's name <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="text" name="mname"
                                                value="{{ $data->mname }}" id="mname">
                                            @error('mname')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="religion" class="form-label text-capitalize">religion <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="religion" id="religion">
                                                <option value="islam" {{ $data->religion == 'islam' ? 'selected' : '' }}>
                                                    Islam
                                                </option>
                                                <option value="hindu" {{ $data->religion == 'hindu' ? 'selected' : '' }}>
                                                    Hindu
                                                </option>
                                                <option value="kristan"
                                                    {{ $data->religion == 'kristan' ? 'selected' : '' }}>
                                                    Kristan</option>
                                            </select>
                                            @error('religion')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="fee_category_id" class="form-label text-capitalize">Select
                                                Fee <font style="color: red;">*</font></label>
                                            <select class="form-control" name="fee_category_id" id="fee_category_id">
                                                <option value="" selected disabled>choose fees</option>
                                                @foreach ($allfees as $fee)
                                                    <option value="{{ $fee->id }}"
                                                        {{ @$data->assignstudent->discount->feecategory->id == $fee->id ? 'selected' : '' }}>
                                                        {{ $fee->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="dob" class="form-label text-capitalize">date of birth <font
                                                    style="color: red;">*</font></label>
                                            <input class="form-control" type="date" name="dob"
                                                value="{{ date('Y-m-d', strtotime($data->dob)) }}" id="dob">
                                            @error('dob')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="class_id" class="form-label text-capitalize">Select Class <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="class_id" id="class_id">
                                                <option value="" selected disabled>choose class</option>
                                                @foreach ($allclassess as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ $data->assignstudent->class->id == $class->id ? 'selected' : '' }}>
                                                        {{ $class->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="year_id" class="form-label text-capitalize">Select Years <font
                                                    style="color: red;">*</font></label>
                                            <select class="form-control" name="year_id" id="year_id">
                                                <option value="" selected disabled>choose year</option>
                                                @foreach ($allyears as $year)
                                                    <option value="{{ $year->id }}"
                                                        {{ $data->assignstudent->year->id == $year->id ? 'selected' : '' }}>
                                                        {{ $year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('year_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="group_id" class="form-label text-capitalize">Select group</label>
                                            <select class="form-control" name="group_id" id="group_id">
                                                <option value="" selected disabled>choose group</option>
                                                @foreach ($allgroups as $group)
                                                    <option value="{{ $group->id }}"
                                                        {{ @$data->assignstudent->group->id == $group->id ? 'selected' : '' }}>
                                                        {{ $group->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="shift_id" class="form-label text-capitalize">Select shift</label>
                                            <select class="form-control" name="shift_id" id="shift_id">
                                                <option value="" selected disabled>choose shift</option>
                                                @foreach ($allshifts as $shift)
                                                    <option value="{{ $shift->id }}"
                                                        {{ @$data->assignstudent->shift->id == $shift->id ? 'selected' : '' }}>
                                                        {{ $shift->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('shift_id')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="discount" class="form-label text-capitalize">Discount Amount
                                            </label>
                                            <input class="form-control" type="text" name="discount"
                                                value="{{ @$data->assignstudent->discount->discount }}" id="discount">
                                            @error('discount')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label for="photo" class="form-label text-capitalize">Profile
                                                Photo</label>
                                            <input class="form-control" type="file" name="photo" value=""
                                                id="photo">
                                            @error('photo')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 form-group">
                                            <img src="{{ asset($data->photo) }}"
                                                class=" img-fluid img-thumbnail p-1 photo_preview" id="photo_preview"
                                                alt="" style="height: 100px;width:100px;object-fit:cover;">
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class=" w-md btn btn-primary waves-effect waves-light">Submit</button>
                                    <a type="reset" class="btn btn-danger w-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // change password validation
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                },
                messages: {

                },
                errorElement: 'strong',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <!--//photo preview script-->
    <script>
        $(document).ready(function() {
            $(document).on('change', '#photo', function(e) {
                photo_preview.src = URL.createObjectURL(e.target.files[0]);

            });
        });
    </script>
@endpush
