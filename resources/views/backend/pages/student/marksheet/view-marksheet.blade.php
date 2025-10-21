@extends('backend.layouts.master')
@section('title', 'Manage Marksheet')
@push('style')
    <style>
        /* Page & Print setup */
        :root {
            --black: #000;
            --muted: #6b7280;
            --accent: #f3f6ff;
            --border: #d1d9ee;
        }

        .page {
            width: 820px;
            margin: 28px auto;
            padding: 18px;
            background: #fff;
            border: 6px solid #000;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 12px;
            border-bottom: 2px solid var(--border);
        }

        .hdr-left {
            width: 75px;
        }

        .logo {
            width: 75px;
            height: 75px;
            border-radius: 6px;
            background: linear-gradient(180deg, #eaf4ff, #dbeaff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #034f9f;
        }

        .hdr-center {
            text-align: center;
            flex: 1;
        }

        .hdr-center h1 {
            margin: 0;
            font-size: 20px;
            letter-spacing: 0.4px;
            color: #034f9f;
        }

        .hdr-center p {
            margin: 2px 0;
            color: var(--muted);
            font-size: 13px;
        }

        .hdr-right {
            width: 220px;
            text-align: right;
            font-size: 13px;
        }

        .hdr-right .title {
            font-weight: 700;
            color: #111;
        }

        .top-info {
            display: flex;
            gap: 12px;
            padding: 14px 6px;
            border-bottom: 2px solid var(--border);
        }

        .student-photo {
            width: 110px;
        }

        .student-photo img {
            width: 100%;
            height: 110px;
            object-fit: cover;
            border: 1px solid var(--border);
        }

        .student-details {
            flex: 1;
            padding: 4px 8px;
        }

        .student-details table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .student-details td {
            padding: 6px 4px;
        }

        .student-details td.label {
            width: 140px;
            color: var(--muted);
            font-weight: 600;
        }

        .grade-key {
            width: 220px;
            border-left: 1px solid var(--border);
            padding-left: 12px;
        }

        .grade-key table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .grade-key th,
        .grade-key td {
            padding: 6px;
            border: 1px solid var(--border);
            text-align: center;
        }

        .grade-key th {
            background: #eef6ff;
            font-weight: 600;
        }

        .subjects {
            margin-top: 14px;
        }

        table.subject-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .subject-table thead th {
            border: 1px solid #000;
            padding: 8px;
            background: #fff;
            font-weight: 700;
            text-align: center;
        }

        .subject-table tbody td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .subject-table tbody td.left {
            text-align: left;
            padding-left: 12px;
        }

        .subject-table tfoot td {
            border: 1px solid #000;
            padding: 10px;
            font-weight: 700;
            text-align: center;
        }

        .footers {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 38px;
        }

        .signature {
            width: 220px;
            text-align: center;
        }

        .signature .line {
            margin-top: 48px;
            border-top: 1px solid #222;
        }

        .seal {
            width: 160px;
            height: 80px;
            border-radius: 8px;
            border: 2px solid #cfe1d8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2d7a5e;
            font-weight: 700;
        }

        @media print {
            body {
                background: #fff;
            }

            .page {
                margin: 0;
                border: none;
            }
        }

        @media (max-width:900px) {
            .page {
                width: 95%;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="page">

                <div class="header">
                    <div class="hdr-left">
                        <div class="logo">EASY</div>
                    </div>
                    @php $info = $data->first(); @endphp
                    <div class="hdr-center">
                        <h1>EASY LEARNING SCHOOL AND COLLEGE</h1>
                        <p>P.O: Putia Bari, Upazilla: Shibpur, Rangpur</p>
                        <p style="font-weight:600;font-size:13px">Mark Sheet — Class ({{ $info->class->name }})</p>
                    </div>
                    <div class="hdr-right">
                        <div class="title">Mark Sheet</div>
                        <div style="color:var(--muted);margin-top:6px">Academic Year: {{ $info->year->name }}</div>
                    </div>
                </div>

                <div class="top-info">
                    <div class="student-photo">
                        <img src="{{ isset($info->student->photo) ? asset($info->student->photo) : Avatar::create($info->student->name)->toBase64() }}"
                            alt="student photo">
                    </div>
                    <div class="student-details">
                        <table>
                            <tr>
                                <td class="label">Student Name</td>
                                <td>: {{ $info->student->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Exam</td>
                                <td>: {{ $info->examtype->name }} - {{ $info->year->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Section</td>
                                <td>: A</td>
                            </tr>
                            <tr>
                                <td class="label">Roll</td>
                                <td>: {{ $info->student->assignstudent->roll }}</td>
                            </tr>
                            <tr>
                                <td class="label">Class</td>
                                <td>: {{ $info->class->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Group</td>
                                <td>: {{ $info->student->assignstudent->group->name }}</td>
                            </tr>
                            <tr>
                                <td class="label">Full Marks</td>
                                <td>: {{ $data->sum(fn($d) => $d->assignsubject->full_mark) }}</td>
                            </tr>
                            <tr>
                                <td class="label">Total Marks</td>
                                <td>: {{ $data->sum('mark') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="grade-key">
                        <table>
                            <thead>
                                <tr>
                                    <th>Range</th>
                                    <th>Grade</th>
                                    <th>G.P</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{ $grade->start_marks }}-{{ $grade->end_marks }}</td>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ $grade->start_point }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="subjects">
                    <table class="subject-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align:left">Name of Subject</th>
                                <th>Full Marks</th>
                                <th>Highest Marks</th>
                                <th>Obtaining Marks (CA / CQ / MCQ / PR)</th>
                                <th>Total Marks</th>
                                <th>Calculated Marks</th>
                                <th>Grade</th>
                                <th>Grade Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_marks = 0;
                                $total_points = 0;
                            @endphp
                            @foreach ($data as $key => $value)
                                @php
                                    $highest = $data
                                        ->where('assign_subject_id', $value->assign_subject_id)
                                        ->max('mark');
                                    $marks = $value->mark; // actual marks
                                    $grade = $grades->first(
                                        fn($g) => $marks >= $g->start_marks && $marks <= $g->end_marks,
                                    );
                                    $point = $grade ? $grade->start_point : 0;
                                    $total_marks += $marks;
                                    $total_points += $point;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="left">{{ $value->assignsubject->studentsubject->name }}</td>
                                    <td>{{ $value->assignsubject->full_mark }}</td>
                                    <td>{{ $highest }}</td>
                                    <td>{{ $value->ca ?? '-' }} / {{ $value->cq ?? '-' }} / {{ $value->mcq ?? '-' }} /
                                        {{ $value->pr ?? '-' }}</td>
                                    <td>{{ $marks }}</td>
                                    <td>{{ $marks }}</td>
                                    <td>{{ $grade->grade_name ?? '-' }}</td>
                                    <td>{{ $point }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Position by Section / Overall Position</td>
                                <td colspan="3">Status: PASS</td>
                                <td>{{ $total_marks }}</td>
                                <td colspan="2">{{ number_format($total_points / count($data), 2) }}</td>
                                <td>{{ $total_points / count($data) >= 4.0 ? 'A+' : '-' }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="footers">
                    <div class="signature">
                        <div class="line"></div>
                        <div style="margin-top:6px;color:var(--muted);font-size:13px">Guardian</div>
                    </div>
                    {{-- <div class="seal">INSTITUTE SEAL</div> --}}
                    <div class="signature">
                        <div class="line"></div>
                        <div style="margin-top:6px;color:var(--muted);font-size:13px">Principal</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
