<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title text-capitalize">Find to place roll</h4>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
                <tr>
                    <th>Si</th>
                    <th>ID No</th>
                    <th>Student Name</th>
                    <th>Fathers Name</th>
                    <th>Gender</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($data as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->student->id_no }}</td>
                        <td>{{ $value->student->name }}</td>
                        <td>{{ $value->student->fname }}</td>
                        <td class=" text-capitalize">{{ $value->student->gender }}</td>
                        <td>
                            <input type="hidden" name="student_id[]" value="{{ $value->student->id }}">
                            <input type="hidden" name="id_no[]" value="{{ $value->student->id_no }}">
                            <input type="number" class=" form-control" name="mark[]" value="{{ $value }}">
                        </td>
                    </tr>
                @empty
                    <tr class=" text-center text-danger">
                        <td colspan="10">No result found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            <button class=" btn btn-success">Submit</button>
        </div>
    </div>
</div>
