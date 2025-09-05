<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="{{ route('restaurants.index') }}" class="navbar-brand">Restaurant Finder</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
