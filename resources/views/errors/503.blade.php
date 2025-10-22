<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We'll be back soon!</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f6f8;
            color: #333;
            text-align: center;
            flex-direction: column;
            padding: 20px;
        }

        h1 {
            font-size: 72px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 10px;
            color: #34495e;
        }

        p {
            margin-top: 15px;
            font-size: 16px;
            color: #7f8c8d;
        }

        .gif-container {
            margin: 30px 0;
        }

        .gif-container img {
            max-width: 100%;
            width: 400px;
            height: 400px;
            height: auto;
            border-radius: 12px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #95a5a6;
        }
    </style>
</head>

<body>
    <h1>🚧</h1>
    <h2>We'll be back soon!</h2>
    <p>Our website is currently undergoing scheduled maintenance.<br>
        We appreciate your patience and will be back online shortly.</p>

    <div class="gif-container">
        <img src="{{ asset('upload/erors/custom-erp-software-development.gif') }}" alt="Maintenance GIF">
    </div>

    <div class="footer">&copy; {{ date('Y') }} {{ config('settings.software_name') }} . All rights reserved.
    </div>
</body>

</html>
