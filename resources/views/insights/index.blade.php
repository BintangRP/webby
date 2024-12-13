@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold">Saved Insights</h2>
                    <a href="{{ route('generate') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Generate New Insight
                    </a>
                </div>

                @if ($insights->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No insights saved yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by generating a new business insight.</p>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach ($insights as $insight)
                            <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition-shadow duration-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $insight->business_field }}</h3>
                                        <p class="text-sm text-gray-500">Target Market: {{ $insight->target_market }}</p>
                                        <p class="text-sm text-gray-500">Generated:
                                            {{ $insight->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('insights.show', $insight) }}"
                                            class="text-primary hover:text-secondary transition-colors duration-200"
                                            title="View">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <button onclick="deleteInsight('{{ $insight->id }}')"
                                            class="text-red-600 hover:text-red-800 transition-colors duration-200"
                                            title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-gray-600 line-clamp-3">{{ Str::limit($insight->insight, 200) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $insights->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function deleteInsight(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2f27ce',
                cancelButtonColor: '#dedcfe',
                confirmButtonText: 'Yes, delete it!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/delete-insight/${id}`)
                        .then(() => {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your insight has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#2f27ce',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            }).then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(() => {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error',
                                confirmButtonColor: '#2f27ce',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            });
                        });
                }
            });
        }
    </script>

@endsection
