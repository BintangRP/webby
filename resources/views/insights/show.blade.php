@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-2xl font-bold">{{ $insight->business_field }}</h2>
                        <p class="text-gray-600">Target Market: {{ $insight->target_market }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <button onclick="copyToClipboard()"
                            class="text-gray-600 hover:text-primary transition-colors duration-200" title="Copy">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                        <button onclick="shareInsight()"
                            class="text-gray-600 hover:text-primary transition-colors duration-200" title="Share">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </button>
                        <button onclick="printInsight()"
                            class="text-gray-600 hover:text-primary transition-colors duration-200" title="Print">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div id="insightContent" class="prose max-w-none bg-gray-50 p-6 rounded-lg">
                    {!! nl2br(e($insight->insight)) !!}
                </div>

                <div class="mt-8 flex justify-between items-center">
                    <a href="{{ route('insights.index') }}"
                        class="text-primary hover:text-secondary transition-colors duration-200">
                        ← Back to Insights
                    </a>
                    <p class="text-sm text-gray-500">Generated: {{ $insight->created_at->format('F j, Y, g:i a') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const textToCopy = insightContent.innerText;

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(textToCopy)
                    .then(() => {
                        showToast('Copied to clipboard!');
                    })
                    .catch(err => {
                        console.error('Failed to copy: ', err);
                        showToast('Failed to copy to clipboard.');
                    });
            } else {
                const textArea = document.createElement('textarea');
                textArea.value = textToCopy;
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();

                try {
                    const successful = document.execCommand('copy');
                    const msg = successful ? 'Copied to clipboard!' : 'Failed to copy to clipboard.';
                    showToast(msg);
                } catch (err) {
                    console.error('Failed to copy: ', err);
                    showToast('Failed to copy to clipboard.');
                }

                document.body.removeChild(textArea);
            }
        }

        function shareInsight() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $insight->business_field }} Business Insight',
                    text: document.getElementById('insightContent').innerText
                }).catch(() => {
                    showToast('Unable to share');
                });
            } else {
                showToast('Sharing not supported on this device');
            }
        }

        function printInsight() {
            window.print();
        }

        function showToast(message, type = 'success') {
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: message,
                icon: type,
                showClass: {
                    popup: 'animate__animated animate__fadeInRight'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutRight'
                }
            });
        }
    </script>
@endsection
