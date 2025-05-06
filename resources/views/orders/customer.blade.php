<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kriingg Order Management System">
    <meta name="author" content="xAI">
    <title>Kriingg - @yield('title')</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
        }
        .navbar {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            color: white;
        }
        .nav-link {
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .nav-link:hover {
            color: #e0e7ff;
            transform: translateY(-2px);
        }
        .content {
            min-height: calc(100vh - 128px); /* Adjust for navbar and footer height */
        }
    </style>
    @yield('styles')
</head>
<body class="flex flex-col min-h-screen">
    <!-- Fixed Navbar -->
    <nav class="navbar fixed top-0 left-0 w-full z-50 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('orders.index') }}" class="text-2xl font-bold tracking-tight">Kriingg</a>
            <div class="flex items-center space-x-6">
                <a href="{{ route('orders.index') }}" class="nav-link text-white hover:text-gray-200">
                    <i class="fas fa-list mr-1"></i> My Orders
                </a>
                <a href="{{ route('profile') }}" class="nav-link text-white hover:text-gray-200">
                    <i class="fas fa-user mr-1"></i> Profile
                </a>
                <span class="hidden md:block text-sm font-medium">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-white hover:text-gray-200">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content container mx-auto py-20">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-md animate-fade-in" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Fixed Footer -->
    <footer class="footer w-full p-4 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-sm">© {{ date('Y') }} Kriingg. All rights reserved.</p>
        </div>
    </footer>

    <!-- jQuery (for JavaScript enhancements) -->
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS (for alerts) -->
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom Animations -->
    <script>
        // Fade-in animation for elements with animate-fade-in class
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.animate-fade-in');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('opacity-100', 'translate-y-0');
                    el.classList.remove('opacity-0', 'translate-y-4');
                }, index * 100);
            });
        });
    </script>
    @yield('scripts')
</body>
</html>