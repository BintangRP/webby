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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-white text-black">
    <nav
        class="z-50 bg-white dark:bg-gray-900 fixed w-full top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('Logo.svg') }}" alt="Business Buddy Logo" class="h-8">
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <div
                    class="flex items-center font-medium flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @auth
                        <div class="flex flex-row space-x-3">
                            <!-- Create Webby Button -->
                            <a href="{{ route('generate') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Create WEBBY
                            </a>
                            <!-- Dashboard Link -->
                            <a href="{{ route('dashboard') }}"
                                class="text-primary hover:text-secondary px-3 py-2">Dashboard</a>
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-primary hover:text-secondary px-3 py-2">Logout</button>
                            </form>
                        </div>
                    @else
                        <div class="flex flex-col space-x-3">
                            <!-- Create Webby Button -->
                            <a href="{{ route('generate') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Create WEBBY
                            </a>
                            <!-- Login Link -->
                            <a href="{{ route('login') }}" class="text-primary hover:text-secondary px-3 py-2">Login</a>
                            <!-- Register Link -->
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

    <footer class="bg-primary text-white z-50">
        <div class="max-w-7xl mx-auto px-4 py-12 z-50">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Business Buddy</h3>
                    <p>Your trusted partner in business insights and strategy.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul>
                        <li><a href="/#features" class="hover:text-secondary">Features</a></li>
                        <li><a href="/#pricing" class="hover:text-secondary">Pricing</a></li>
                        <li><a href="/#faq" class="hover:text-secondary">FAQ</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
