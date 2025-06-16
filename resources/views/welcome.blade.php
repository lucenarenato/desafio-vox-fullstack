<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vox-Trello</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }
        .board {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            min-height: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .card-task {
            background-color: white;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .card-task:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .header-bar {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark header-bar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vox-Trello</a>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light me-2">
                            <i class="fa-solid fa-gauge"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light me-2">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light">
                                <i class="fa-solid fa-user-plus"></i> Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Boards Section -->
    <div class="container my-5">
        <div class="row g-4">



        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-white small">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) • Desenvolvido por Renato Lucena 🚀
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
