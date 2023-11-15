<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
</head>
<body>
    <h1>Generated QR Code</h1>
    <img src="data:image/png;base64,{{ base64_encode($image) }}" alt="QR Code">
</body>
</html>
