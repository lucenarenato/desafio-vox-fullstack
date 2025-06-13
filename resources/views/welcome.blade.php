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
</head>
<body class="bg-light">
    <div class="position-relative">
        <img id="background" class="position-absolute top-0 start-0" style="max-width: 877px; left: -20px;" src="https://laravel.com/assets/img/welcome/background.svg" alt="Background" />

        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center text-center">
            <div class="container px-4">
                <header class="row py-5">
                    <div class="col d-flex justify-content-end">

                        @if (Route::has('login'))
                            <nav class="d-flex gap-2">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="btn btn-outline-dark"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="btn btn-outline-dark"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="btn btn-outline-dark"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </header>

                <footer class="py-5 text-muted small">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (opcional, necessário se usar componentes interativos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
