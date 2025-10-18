<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title text-capitalize">Find to place roll</h4>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
                <tr>
                    <th>Si</th>
                    <th>Name</th>
                    <th>ID No</th>
                    <th>Year</th>
                    <th>Roll</th>
                    <th>Class</th>
                    <th>Reg Fee</th>
                    <th>Discount</th>
                    <th>Paid</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @forelse ($data as $key => $value)
                    @php
                        // All fee data loaded outside this loop ideally, but keeping for clarity
                        $fees = App\Models\FeeAmount::pluck('amount', 'class_id')->toArray();
                        $discount = App\Models\DiscountStudent::where('assign_student_id', $value->id)->first();

                        $regFee = $fees[$value->class_id] ?? 0;
                        $discountPercent = $discount->discount ?? 0;

                        // Calculate discount amount and final fee
                        $discountAmount = ($regFee * $discountPercent) / 100;
                        $finalFee = $regFee - $discountAmount;
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->student->name }}</td>
                        <td>{{ $value->student->id_no }}</td>
                        <td>{{ $value->year->name }}</td>
                        <td>{{ $value->roll }}</td>
                        <td>{{ $value->class->name }}</td>
                        <td>
                            {{ $regFee }}
                        </td>
                        <td>
                            {{ $discountPercent }}%
                        </td>
                        <td>
                            {{ number_format($finalFee, 2) }} TK
                        </td>
                        <td><a href="{{ route('student.registrationfe.generate.store', $value->student->id) }}"
                                class=" btn btn-dark"><i class=" fas fa-print"></i></a></td>
                    </tr>
                @empty
                    <tr class=" text-center text-danger">
                        <td colspan="10">No result found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
