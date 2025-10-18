<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            margin: 0 10px;
            color: #333;
            font-size: 14px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
        }

        .header img.logo {
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .school-info {
            text-align: center;
        }

        .school-info h2 {
            margin: 5px 0;
            font-size: 22px;
        }

        .school-info p {
            margin: 0;
            font-size: 14px;
        }

        .student-photo {
            position: absolute;
            top: 0;
            right: 0;
        }

        .student-photo img {
            width: 100px;
            height: 100px;
            border: 2px solid #000;
            object-fit: cover;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            /* background-color: #f2f2f2; */
            /* width: 25%; */
        }

        .section-title {
            margin-top: 25px;
            font-weight: "500";
            text-transform: uppercase;
            /* border-bottom: 1px solid #000; */
            padding-bottom: 3px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 10px;
            font-size: 13px;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 0px;
        }

        .signature div {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            margin-top: 0px;
            border-top: 1px solid #000;
            width: 100%;
        }


    </style>
</head>

<body>

    <div class="header">
        <div class="school-info">
            <h2>Easy School Bangladesh</h2>
            <p>123, College Road, Rangpur</p>
            <p>Phone: 01873593399 | Email: infoeasy@school.edu.bd</p>
        </div>
        <div class="student-photo">
            <img src="{{ !empty($data->photo) ? public_path($data->photo) : public_path('upload/profile/default.png') }}"
                alt="Student Photo">
        </div>
    </div>

    @php
        // All fee data loaded outside this loop ideally, but keeping for clarity
        $fees = App\Models\FeeAmount::pluck('amount', 'class_id')->toArray();
        $discount = App\Models\DiscountStudent::where('assign_student_id', $data->assignstudent->id)->first();

        $regFee = $fees[$data->assignstudent->class_id] ?? 0;
        $discountPercent = $discount->discount ?? 0;

        // // Calculate discount amount and final fee
        $discountAmount = ($regFee * $discountPercent) / 100;
        $finalFee = $regFee - $discountAmount;
    @endphp

    <h4 class="section-title" style="text-align: center">Student Registration card</h4>
    <table>
        <tr>
            <th>ID NO</th>
            <td>{{ $data->id_no }}</td>
        </tr>
        <tr>
            <th>Roll</th>
            <td>{{ $data->assignstudent->roll }}</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Father's Name</th>
            <td>{{ $data->fname }}</td>
        </tr>
        <tr>
            <th>Mother's Name</th>
            <td>{{ $data->mname }}</td>
        </tr>
        <tr>
            <th>Session</th>
            <td>{{ $data->assignstudent->year->name }}</td>
        </tr>
        <tr>
            <th>Class</th>
            <td>{{ $data->assignstudent->class->name }}</td>
        </tr>
        <tr>
            <th>Registration Fee</th>
            <td>{{ $regFee }}Tk</td>
        </tr>
        <tr>
            <th>Discount</th>
            <td >{{ $discountPercent }}%</td>
        </tr>
        <tr>
            <th>Fee(this student)</th>
            <td>{{ $finalFee }}Tk</td>
        </tr>
    </table>


    <div style="width:100%; margin-top:0px;">
        <div style="display:inline-block; width:45%; text-align:center;">
            <div style="border-top:1px solid #000; margin-top:60px;"></div>
            <p>Student Signature</p>
        </div>
        <div style="display:inline-block; width:45%; text-align:center;">
            <div style="border-top:1px solid #000; margin-top:0px;"></div>
            <p>Principal Signature</p>
        </div>
    </div>


    <div class="footer">
        <p>Generated on: {{ date('d F Y h:i A') }} | Easy School Bangladesh</p>
    </div>

    .............................................................................................................

    <div class="header">
        <div class="school-info">
            <h2>Easy School Bangladesh</h2>
            <p>123, College Road, Rangpur</p>
            <p>Phone: 01873593399 | Email: infoeasy@school.edu.bd</p>
        </div>
        <div class="student-photo">
            <img src="{{ !empty($data->photo) ? public_path($data->photo) : public_path('upload/profile/default.png') }}"
                alt="Student Photo">
        </div>
    </div>

    @php
        // All fee data loaded outside this loop ideally, but keeping for clarity
        $fees = App\Models\FeeAmount::pluck('amount', 'class_id')->toArray();
        $discount = App\Models\DiscountStudent::where('assign_student_id', $data->assignstudent->id)->first();

        $regFee = $fees[$data->assignstudent->class_id] ?? 0;
        $discountPercent = $discount->discount ?? 0;

        // // Calculate discount amount and final fee
        $discountAmount = ($regFee * $discountPercent) / 100;
        $finalFee = $regFee - $discountAmount;
    @endphp

    <h4 class="section-title" style="text-align: center">Student Registration card</h4>
    <table>
        <tr>
            <th>ID NO</th>
            <td>{{ $data->id_no }}</td>
        </tr>
        <tr>
            <th>Roll</th>
            <td>{{ $data->assignstudent->roll }}</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <th>Father's Name</th>
            <td>{{ $data->fname }}</td>
        </tr>
        <tr>
            <th>Mother's Name</th>
            <td>{{ $data->mname }}</td>
        </tr>
        <tr>
            <th>Session</th>
            <td>{{ $data->assignstudent->year->name }}</td>
        </tr>
        <tr>
            <th>Class</th>
            <td>{{ $data->assignstudent->class->name }}</td>
        </tr>
        <tr>
            <th>Registration Fee</th>
            <td>{{ $regFee }}Tk</td>
        </tr>
        <tr>
            <th>Discount</th>
            <td >{{ $discountPercent }}%</td>
        </tr>
        <tr>
            <th>Fee(this student)</th>
            <td>{{ $finalFee }}Tk</td>
        </tr>
    </table>


    <div style="width:100%; margin-top:0px;">
        <div style="display:inline-block; width:45%; text-align:center;">
            <div style="border-top:1px solid #000; margin-top:60px;"></div>
            <p>Student Signature</p>
        </div>
        <div style="display:inline-block; width:45%; text-align:center;">
            <div style="border-top:1px solid #000; margin-top:0px;"></div>
            <p>Principal Signature</p>
        </div>
    </div>


    <div class="footer">
        <p>Generated on: {{ date('d F Y h:i A') }} | Easy School Bangladesh</p>
    </div>

</body>

</html>
