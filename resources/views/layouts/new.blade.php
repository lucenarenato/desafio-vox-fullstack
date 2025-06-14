<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kanban Cards</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @yield('content')

    @stack('scripts')
    <script src="{{ asset('js/todoSystem.js') }}"></script>
</body>
</html>
