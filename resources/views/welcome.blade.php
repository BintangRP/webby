@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6">Business Buddy</h1>
                <p class="text-xl mb-8">Your AI-powered business consultant available 24/7</p>
                <div class="flex justify-center space-x-4">
                    <x-demo_modal />
                    <a href="{{ route('register') }}"
                        class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary">Get
                        Started</a>
                </div>
            </div>
        </div>
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
                    <h3 class="text-2xl font-bold mb-4">Pro Plan</h3>
                    <p class="text-gray-600 mb-6">For serious business planning</p>
                    <ul class="mb-8">
                        <li class="mb-2">✓ Unlimited generations</li>
                        <li class="mb-2">✓ Advanced business insights</li>
                        <li class="mb-2">✓ Priority support</li>
                        <li class="mb-2">✓ Export and print options</li>
                    </ul>
                    <p class="text-3xl font-bold mb-6"><s>$49</s><br>$29/month</p>
                    <a href="{{ route('register') }}"
                        class="block text-center bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-secondary">Upgrade
                        Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20" id="faq">
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
    </section>
@endsection
