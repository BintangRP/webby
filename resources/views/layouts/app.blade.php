<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Buddy</title>
    @vite(['./resources/css/app.css', './resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-white text-black">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="/" class="flex items-center">
                        <span class="text-primary font-bold text-xl">Business Buddy</span>
                    </a>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-primary hover:text-secondary px-3 py-2">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-primary hover:text-secondary px-3 py-2">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-primary hover:text-secondary px-3 py-2">Login</a>
                        <a href="{{ route('register') }}" class="text-primary hover:text-secondary px-3 py-2">Register</a>
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
                        <li>Phone: (123) 456-7890</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-secondary">Twitter</a>
                        <a href="#" class="hover:text-secondary">LinkedIn</a>
                        <a href="#" class="hover:text-secondary">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-white/10 text-center">
                <p>&copy; 2024 Business Buddy. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
