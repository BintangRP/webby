@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white pt-40">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">Business Buddy</h1>
                <p class="text-xl mb-8">Your AI-powered business consultant available 24/7</p>
                <div class="flex justify-center space-x-4">
                    <x-demo_modal />
                    <a href="{{ route('generate') }}"
                        class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary">Get
                        Started</a>
                </div>
            </div>
        </div>
        <div class="max-w-fit mx-auto pt-5"><img src="{{ asset('demo.png') }}" alt="Demo Buddy"></div>
    </section>

    <!-- Features Section -->
    <section class="py-20" id="features">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose Business Buddy?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="text-primary text-4xl mb-4">24/7</div>
                    <h3 class="text-xl font-semibold mb-4">Always Available</h3>
                    <p>Get business insights and advice whenever you need them</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-primary text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-4">Real-time Analysis</h3>
                    <p>Instant business insights powered by advanced AI</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-primary text-4xl mb-4">💰</div>
                    <h3 class="text-xl font-semibold mb-4">Affordable</h3>
                    <p>Cost-effective business consulting solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="bg-gray-50 py-20" id="pricing">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Choose Your Plan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Experiment</h3>
                    <p class="text-gray-600 mb-6">Perfect for trying out our services</p>
                    <ul class="mb-8">
                        <li class="mb-2">✓ 5 generations per day</li>
                        <li class="mb-2">✓ Basic business insights</li>
                        <li class="mb-2">✓ Save and share results</li>
                    </ul>
                    <p class="text-3xl font-bold mb-6">Free</p>
                    <a href="{{ route('register') }}"
                        class="block text-center bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-secondary">Get
                        Started</a>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg border-2 border-primary">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-bold mb-4">Pro Plan</h3>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">90%
                            saved</span>
                    </div>

                    <p class="text-gray-600 mb-6">For serious business planning</p>
                    <ul class="mb-8">
                        <li class="mb-2">✓ Unlimited generations</li>
                        <li class="mb-2">✓ Advanced business insights</li>
                        <li class="mb-2">✓ Priority support</li>
                        <li class="mb-2">✓ Export and print options</li>
                    </ul>
                    <p class="text-3xl font-bold mb-6">$5 <s class="text-gray-400">$49</s>/month</p>
                    <a href="{{ route('register') }}"
                        class="block text-center bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-secondary">Upgrade
                        Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    {{-- <section class="py-20" id="faq">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
            <div class="max-w-3xl mx-auto">
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">How does Business Buddy work?</h3>
                    <p class="text-gray-600">Business Buddy uses advanced AI to analyze your business field and target
                        market to provide tailored business insights and recommendations.</p>
                </div>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Can I upgrade my plan later?</h3>
                    <p class="text-gray-600">Yes, you can upgrade to the Pro Plan at any time to unlock unlimited
                        generations and additional features.</p>
                </div>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">What kind of support do you offer?</h3>
                    <p class="text-gray-600">We offer 24/7 email support for all users, with priority support for Pro Plan
                        members.</p>
                </div>
            </div>
        </div>
    </section> --}}

    <section>
        <div class="bg-white py-16">
            <div class="max-w-3xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Frequently Asked Questions</h2>

                <!-- Accordion -->
                <div x-data="{ active: null }" class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="border-b pb-4">
                        <button @click="active = active === 1 ? null : 1"
                            class="text-lg font-bold text-gray-900 w-full text-left focus:outline-none flex justify-between items-center">
                            <span>How does Business Buddy work?</span>
                            <svg :class="{ 'rotate-180': active === 1 }"
                                class="w-5 h-5 transform transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <p x-show="active === 1" x-collapse class="mt-2 text-gray-600">
                            Business Buddy uses advanced AI to analyze your business field and target market to provide
                            tailored business insights and recommendations.
                        </p>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="border-b pb-4">
                        <button @click="active = active === 2 ? null : 2"
                            class="text-lg font-bold text-gray-900 w-full text-left focus:outline-none flex justify-between items-center">
                            <span>Can I upgrade my plan later?</span>
                            <svg :class="{ 'rotate-180': active === 2 }"
                                class="w-5 h-5 transform transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <p x-show="active === 2" x-collapse class="mt-2 text-gray-600">
                            Yes, you can upgrade to the Pro Plan at any time to unlock unlimited generations and additional
                            features.
                        </p>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="border-b pb-4">
                        <button @click="active = active === 3 ? null : 3"
                            class="text-lg font-bold text-gray-900 w-full text-left focus:outline-none flex justify-between items-center">
                            <span>What kind of support do you offer?</span>
                            <svg :class="{ 'rotate-180': active === 3 }"
                                class="w-5 h-5 transform transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <p x-show="active === 3" x-collapse class="mt-2 text-gray-600">
                            We offer 24/7 email support for all users, with priority support for Pro Plan members.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </section>


    {{-- <section>
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase">Testimonials</h2>
                    <h1 class="mt-2 text-3xl font-bold text-gray-900">Discover What Our Users Say</h1>
                    <p class="mt-4 text-lg text-gray-500">
                        Dive into a collection of heartfelt testimonials from satisfied customers who have experienced the
                        Groupy difference.
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Testimonial Card 1 -->
                    <div class="bg-primary text-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <p class="text-lg font-light mb-4">
                            "I higly recommend this website! It's help a lot for my bussiness. When I feel confused, i will
                            use this website to help me out."
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Feby</p>
                            <p class="text-sm text-gray-400">D'Florist Owner</p>
                        </div>
                    </div>

                    <!-- Testimonial Card 2 -->
                    <div class="bg-primary text-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <div class="flex items-center mb-4">
                            <!-- Same Star Icons -->
                        </div>
                        <p class="text-lg font-light mb-4">
                            "I used this website to help me find the path for my bussiness, and searching what market are
                            highly possible for my bussines. It's help me a lot."
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Lesta</p>
                            <p class="text-sm text-gray-400">Glass Bakery Owner</p>
                        </div>
                    </div>

                    <!-- Testimonial Card 3 -->
                    <div class="bg-primary text-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <div class="flex items-center mb-4">
                            <!-- Same Star Icons -->
                        </div>
                        <p class="text-lg font-light mb-4">
                            "It's extremely helpful for bussiness consultant, even if you are newbie at bussiness, TRY THIS
                            OUT!"
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Tari</p>
                            <p class="text-sm text-gray-400">PhotosScreen Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    <section>
        <div class="bg-gray-100 py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase">Testimonials</h2>
                    <h1 class="mt-2 text-3xl font-bold text-gray-900">Discover What Our Users Say</h1>
                    <p class="mt-4 text-lg text-gray-500">
                        Hear They Out
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Testimonial Card 1 -->
                    <div
                        class="bg-white text-gray-900 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <p class="text-lg font-light mb-4">
                            "I highly recommend this website! It helps a lot with my business. When I feel confused, I will
                            use this website to help me out."
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Feby</p>
                            <p class="text-sm text-gray-500">D'Florist Owner</p>
                        </div>
                    </div>

                    <!-- Testimonial Card 2 -->
                    <div
                        class="bg-white text-gray-900 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <p class="text-lg font-light mb-4">
                            "I used this website to help me find the path for my business, and searched what market was
                            highly possible for my business. It's helped me a lot."
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Lesta</p>
                            <p class="text-sm text-gray-500">Glass Bakery Owner</p>
                        </div>
                    </div>

                    <!-- Testimonial Card 3 -->
                    <div
                        class="bg-white text-gray-900 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 .587l3.668 7.425L23.62 9.86l-5.528 5.283L19.04 24 12 20.412 4.96 24l1.948-8.857L1.38 9.86l7.952-1.848L12 .587z" />
                            </svg>
                        </div>
                        <p class="text-lg font-light mb-4">
                            "It's extremely helpful for business consultants, even if you are new to business, TRY THIS
                            OUT!"
                        </p>
                        <div class="mt-4">
                            <p class="font-semibold">Tari</p>
                            <p class="text-sm text-gray-500">PhotosScreen Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
