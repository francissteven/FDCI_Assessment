<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>
<body class="antialiased">
    <div class="container text-center my-5">
        <h1 class="mb-4">{{ config('app.name') }}</h1>
        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
