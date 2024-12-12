@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Current Plan</h3>
                    <p class="text-primary">{{ auth()->user()->role === 'buddy' ? 'Pro Plan' : 'Experiment Plan (F2P)' }}</p>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#profile" class="text-primary hover:text-secondary">Edit Profile</a></li>
                        <li><a href="#activity" class="text-primary hover:text-secondary">Activity Logs</a></li>
                        <li><a href="#contact" class="text-primary hover:text-secondary">Contact Admin</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="md:col-span-3">
                <!-- Profile Section -->
                <div id="profile" class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>
                    @if (session('status') === 'profile-updated')
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                            Profile updated successfully.
                        </div>
                    @endif
                    <x-profile_form />
                </div>

                <!-- Activity Logs -->
                <div id="activity" class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-2xl font-bold mb-6">Activity Logs</h2>
                    <div class="space-y-4">
                        @php
                            $insights = auth()->user()->insights()->latest()->take(5)->get();
                        @endphp
                        @if ($insights->isEmpty())
                            <p class="text-primary text-sm">There is no activity</p>
                        @else
                            @foreach ($insights as $insight)
                                <div class="border-b pb-4">
                                    <p class="font-semibold">{{ $insight->business_field }} - {{ $insight->target_market }}
                                    </p>
                                    <p class="text-sm text-gray-600">{{ $insight->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- <!-- Contact Admin -->
                <div id="contact" class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-6">Contact Admin</h2>
                    <form action="{{ route('contact.admin') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" name="subject"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea name="message" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"></textarea>
                            </div>
                            <button type="submit"
                                class="bg-primary text-white px-4 py-2 rounded-md hover:bg-secondary">Send Message</button>
                        </div>
                    </form>
                </div> --}}
                <!-- Contact Admin -->
                <div id="contact" class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-6">Contact Admin</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium mb-2">WhatsApp Support</h3>
                            <p class="text-gray-600 mb-4">Get quick responses through WhatsApp</p>
                            <a href="https://wa.me/6283877626559" target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Chat on WhatsApp
                            </a>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium mb-2">Email Support</h3>
                            <p class="text-gray-600 mb-4">Send us a detailed message</p>
                            <a href="mailto:support@businessbuddy.com"
                                class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-secondary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Send Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
