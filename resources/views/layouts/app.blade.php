<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Turismo')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Local_tourism.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grafica.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2 "></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    
</head>

<body>
    <header class="header">
        <nav class="nav">
            <ul class="nav-list">
                <li> <img src="images/panguipulli-color.jpg" alt="logo" id="logo"></li>
                <li><a href="{{ route('formulario.index') }}" class="nav-link">Inicio</a></li>
                @if(auth()->user()->rol === 'admin')
                    <li><a href="{{ route('grafica') }}" class="nav-link">Gráficos</a></li>
                    <li><a href="{{ route('subgrafica') }}" class="nav-link">Subgráficos</a></li>
                    <li><a href="#" class="nav-link">Archivo</a></li>
                @endif

                <li class="user-menu">
                    <i class="fas fa-user user-icon"></i>
                    <div class="dropdown">
                        <div class="user-info">
                            {{ Auth::user()->nombre }}
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-button">Cerrar Sesión</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        @yield('content')

    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Turismo. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userMenu = document.querySelector('.user-menu');

            userMenu.addEventListener('click', function () {
                this.classList.toggle('active');
            });

            document.addEventListener('click', function (event) {
                if (!userMenu.contains(event.target)) {
                    userMenu.classList.remove('active');
                }
            });
        });
    </script> @yield('scripts')
</body>

</html>