<div x-data="{ open: false }" @keydown.escape.window="open = false">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-secondary">
        Watch Demo
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <!-- Overlay -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal Content -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-lg max-w-4xl w-full mx-auto shadow-lg">
                <!-- Close Button -->
                <button @click="open = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Video Container -->
                <div class="aspect-w-16 aspect-h-9">
                    {{-- <iframe class="w-full h-full" src="https://www.youtube.com/embed/rPblj7ywfvg" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe> --}}

                    <iframe width="560" height="315" src="https://www.youtube.com/embed/tuf8UPELcI4"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="mt-3 bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Key Features Demonstrated</h3>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Business insight generation based on your field and target market
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Saving and managing your business insights
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Sharing and exporting capabilities
                        </li>
                    </ul>
                </div>

                <!-- Modal Footer -->
                <div class="p-3 border-t">
                    <h3 class="text-lg font-semibold mb-2">Business Buddy Demo</h3>
                    <p class="text-gray-600">Learn how Business Buddy can help you generate valuable business insights
                        and grow your business.</p>
                </div>
            </div>
        </div>
    </div>
</div>
