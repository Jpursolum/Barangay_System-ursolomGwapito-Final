<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            font-size: 16px;
        }
        .email-header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 40px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .email-header img {
            max-width: 150px; /* Adjust size of logo */
            margin-bottom: 20px;
        }
        .email-header h1 {
            font-family: 'Georgia', serif;
            font-size: 28px;
            margin: 0;
        }
        .email-body {
            padding: 30px;
            background-color: #f9f9f9;
            color: #34495e;
            line-height: 1.8;
        }
        .email-body p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .download-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }
        .download-link:hover {
            background-color: #2980b9;
        }
        .footer {
            background-color: #ecf0f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #7f8c8d;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <!-- Logo Image -->
            <img src="https://your-server.com/path-to-logo.png" alt="Barangay Centro2 Sanchez Mira Logo">
            <h1>{{ $title }}</h1>
        </div>
        <div class="email-body">
            <p>{{ $body }}</p>
            @if (!empty($attachment))
                <a href="{{ $attachment }}" class="download-link" download>Download Attachment</a>
            @endif
        </div>
        <div class="footer">
            <p>This email is from Barangay Centro2 Sanchez Mira.</p>
            <p>For more information, visit our website: <a href="https://brgycentro2sanchezmira.com/" target="_blank">https://brgycentro2sanchezmira.com</a></p>
            <p>&copy; 2024 Barangay Centro2 Sanchez Mira. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
