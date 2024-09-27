<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Add your styling here */
        .email-container {
            width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            margin: auto;
            background-color: #f8f9fa;
        }
        .email-header {
            background-color: #68594a;
            color: #fff;
            padding: 1px;
            text-align: center;
        }
        .email-body {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Your Custom Email</h2>
        </div>
        <div class="email-body">
            {!! $content !!}
        </div>
    </div>
</body>
</html>
