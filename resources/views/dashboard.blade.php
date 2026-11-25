<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Mori Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</h3>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger mt-3">Logout</button>
    </form>
</div>
</body>
</html>