<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Scanner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Upload an Image for OCR</h2>
    <form action="{{ route('ocr.scan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Choose an image</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Scan</button>
    </form>
</div>
</body>
</html>
