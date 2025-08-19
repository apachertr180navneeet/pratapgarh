<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Portal')</title>
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero {
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-weight: bold;
            color: #4e4feb;
        }
        .hero p {
            font-size: 1.1rem;
            color: #555;
        }
        .card-custom {
            border-radius: 15px;
        }
        main {
            flex: 1; /* ✅ Makes main take remaining screen height */
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                {{--  <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <a href="#" class="btn btn-primary ms-3">Login/Register</a>  --}}
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="container">
            <h1>@yield('header', 'One dashboard to manage all your students')</h1>
            <p>@yield('subheader', 'Easy student management and search')</p>
        </div>
    </section>

    {{-- Page Content --}}
    <main class="container mb-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center py-3 bg-white shadow-sm mt-auto">
        <small>&copy; {{ date('Y') }} Student Portal. All rights reserved.</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
