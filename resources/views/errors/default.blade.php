<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .error-code {
            font-size: 72px;
            font-weight: bold;
            margin: 20px 0;
        }
        .error-message {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="error-code">{{ $code ?? 500 }}</div>
    <div class="error-message">{{ $message ?? 'Something went wrong' }}</div>
</body>
</html>
