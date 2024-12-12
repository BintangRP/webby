@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-8">Business Insight Generator</h2>

            <form id="generateForm" class="space-y-6">
                @csrf
                <div>
                    <label for="bidangBisnis" class="block text-sm font-medium text-gray-700">Business Field</label>
                    <input type="text" id="bidangBisnis" name="bidangBisnis" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                </div>

                <div>
                    <label for="targetPasar" class="block text-sm font-medium text-gray-700">Target Market</label>
                    <input type="text" id="targetPasar" name="targetPasar" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-secondary">
                    Generate Insight
                </button>
            </form>

            <div id="result" class="mt-8 hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Business Insight</h3>
                    <div class="space-x-2">
                        <button onclick="copyToClipboard()" class="text-primary hover:text-secondary">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <button onclick="shareInsight()" class="text-primary hover:text-secondary">
                            <i class="fas fa-share"></i> Share
                        </button>
                        <button onclick="printInsight()" class="text-primary hover:text-secondary">
                            <i class="fas fa-print"></i> Print
                        </button>
                        <button onclick="saveInsight()" class="text-primary hover:text-secondary">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <button onclick="deleteInsight()" class="text-primary hover:text-secondary">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
                <div id="insightContent" class="prose max-w-none">
                    <!-- Generated content will be inserted here -->
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const form = document.getElementById('generateForm');
            const result = document.getElementById('result');
            const insightContent = document.getElementById('insightContent');

            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                @guest
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please login to generate business insights',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#2f27ce'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('login') }}';
                    }
                });
                return;
            @endguest

            try {
                const response = await axios.post('/api/generate-insight', {
                    bidangBisnis: document.getElementById('bidangBisnis').value,
                    targetPasar: document.getElementById('targetPasar').value
                });

                if (response.data.error) {
                    Swal.fire({
                        title: 'Generation Limit Reached',
                        text: 'You have reached your daily generation limit. Upgrade to Pro Plan for unlimited generations!',
                        icon: 'warning',
                        confirmButtonColor: '#2f27ce'
                    });
                    return;
                }

                insightContent.innerHTML = response.data.insight;
                result.classList.remove('hidden');
            } catch (error) {
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while generating the insight',
                    icon: 'error',
                    confirmButtonColor: '#2f27ce'
                });
            }
            });

            function copyToClipboard() {
                navigator.clipboard.writeText(insightContent.innerText);
                Swal.fire({
                    title: 'Copied!',
                    text: 'Insight copied to clipboard',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            }

            function shareInsight() {
                if (navigator.share) {
                    navigator.share({
                        title: 'Business Insight',
                        text: insightContent.innerText
                    });
                }
            }

            function printInsight() {
                window.print();
            }

            async function saveInsight() {
                try {
                    await axios.post('/api/save-insight', {
                        content: insightContent.innerText
                    });
                    Swal.fire({
                        title: 'Saved!',
                        text: 'Insight saved successfully',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } catch (error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while saving the insight',
                        icon: 'error',
                        confirmButtonColor: '#2f27ce'
                    });
                }
            }

            async function deleteInsight() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#2f27ce'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        result.classList.add('hidden');
                        insightContent.innerHTML = '';
                    }
                });
            }
        </script>
    @endpush
@endsection
