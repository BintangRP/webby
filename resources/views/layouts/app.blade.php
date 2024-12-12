<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Buddy</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon-32x32.png') }}">
    @vite(['./resources/css/app.css', './resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body class="bg-white text-black">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="/" class="flex items-center">
                        {{-- <span class="text-primary font-bold text-xl">Business Buddy</span> --}}
                        <img src="{{ asset('Logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="flex items-center">
                    @auth
                        <div class="flex">
                            <a href="{{ route('generate') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                                WEBBY</a>
                            <a href="{{ route('dashboard') }}"
                                class="text-primary hover:text-secondary px-3 py-2">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-primary hover:text-secondary px-3 py-2">Logout</button>
                            </form>
                        </div>
                    @else
                        <div>
                            <a href="{{ route('generate') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                                WEBBY</a>
                            <a href="{{ route('login') }}" class="text-primary hover:text-secondary px-3 py-2">Login</a>
                            <a href="{{ route('register') }}"
                                class="text-primary hover:text-secondary px-3 py-2">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Business Buddy</h3>
                    <p>Your trusted partner in business insights and strategy.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul>
                        <li><a href="#features" class="hover:text-secondary">Features</a></li>
                        <li><a href="#pricing" class="hover:text-secondary">Pricing</a></li>
                        <li><a href="#faq" class="hover:text-secondary">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact</h3>
                    <ul>
                        <li>Email: support@businessbuddy.com</li>
                        <li>Phone: (+62) 838-7762-6559</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/heheteam.corp/" class="hover:text-secondary">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-white/10 text-center">
                <p>&copy; 2024 Business Buddy. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        window.auth = @json(auth()->user());
    </script>
</body>

</html>
