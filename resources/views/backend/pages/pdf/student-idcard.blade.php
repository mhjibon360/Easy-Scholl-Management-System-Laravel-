<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        .container {
            max-width: 100%;
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    @foreach ($data as $key => $value)
        <div class="container">
            <table width="600" cellspacing="0" cellpadding="0" style="border-collapse: collapse; margin:30 auto">
                <!-- Header -->
                <tr
                    style="background-color: #74CB2F;font-size: 26px;font-weight: 700;text-align: center;color: white;height: 60px;letter-spacing: 2px;">
                    <td>EASY SCHOLL AND COLLEGE</td>
                </tr>

                <!-- Main Content -->
                <tr>
                    <td>
                        <table width="100%" cellspacing="20" cellpadding="0">
                            <tr>
                                <!-- Left Section -->
                                <td width="40%" style="border: 2px solid #74CB2F; padding: 5px;">
                                    <table width="100%" cellspacing="5" cellpadding="2">
                                        <tr>
                                            <td align="center">
                                                <img src="{{ isset($value->student->photo) ? public_path($value->student->photo) : Avatar::create($value->student->name)->toBase64() }}"
                                                    style="height: 200px;width: 180px;object-fit: cover; border-radius: 5px;"
                                                    alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ID NO: <strong style="color:#74CB2F;">{{ $value->student->id_no }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>ROLL: <strong style="color:#74CB2F;">{{ $value->roll }}</strong></td>
                                        </tr>
                                    </table>
                                </td>

                                <!-- Right Section -->
                                <td width="60%">
                                    <table width="100%" cellspacing="5" cellpadding="2" style="margin-bottom: 20px;">
                                        <tr>
                                            <td style="font-size: 22px;font-weight: 900;text-align: center;">{{ $value->student->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 22px;font-weight: 900;text-align: center;">{{ $value->student->dob }}
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%" cellspacing="5" cellpadding="5"
                                        style="border:2px solid red;border-radius:3px;padding:10px;margin-bottom:20px;">
                                        <tr>
                                            <td style="color:red;font-size:20px;font-weight:600;">In Case of Emergency
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mom: <strong style="color:black;font-size:16px;">{{ $value->student->mname }}
                                                    {{ $value->student->phone }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dad: <strong style="color:black;font-size:16px;">{{ $value->student->fname }}
                                                    {{ $value->student->phone }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>School: <strong style="color:black;font-size:16px;">Easy School</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:red;font-size:18px;font-weight:500;">⚠ WARNING: EASY SCHOOL
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr
                    style="background-color: #74CB2F;font-size: 18px;font-weight: 500;text-align: center;color: white;height: 30px;">
                    <td>EASY SCHOOL</td>
                </tr>
            </table>
        </div>
        ......................................................................................................................................................................................................................................
    @endforeach
</body>

</html>
