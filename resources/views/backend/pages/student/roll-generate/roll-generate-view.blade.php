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
                    <th>Class</th>
                    <th>Image</th>
                    <th>Code</th>
                    <th>Time</th>
                    <th>Roll</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($data as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->student->name }}</td>
                        <td>{{ $value->student->id_no }}</td>
                        <td>{{ $value->year->name }}</td>
                        <td>{{ $value->class->name }}</td>
                        <td>
                            <img src="{{ isset($value->student->photo) ? asset($value->student->photo) : Avatar::create($value->student->name)->toBase64() }}"
                                class=" img-fluid img-thumbnail" alt="" style="height: 50px;width:50px">
                        </td>
                        <td>
                            {{ $value->student->code }}
                        </td>
                        <td>{{ $value->created_at->format('d M Y') }}</td>
                        <td>
                            <input type="hidden" name="assignstudent_id[]" value="{{ $value->id }}">
                            <input type="text" class=" form-control" name="roll[]" value="{{ $value->roll }}">
                        </td>
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
