<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR Result</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Scanned Text</h2>
    <textarea class="form-control" rows="10" readonly>{{ $text }}</textarea>

    <div>
        <p><strong>Surname:</strong> {{ $surname }}</p>
        <p><strong>Last Name:</strong> {{ $lastName }}</p>
        <p><strong>ID Number:</strong> {{ $idNumber }}</p>
        <p><strong>Birthday:</strong> {{ $birthday }}</p>
    </div>



    <a href="{{ route('ocr.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>
