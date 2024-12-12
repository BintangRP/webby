@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-8">Business Insight Generator</h2>
                <x-insight_generator_form />
                <x-insight_result />
            </div>
        </div>
    </div>
@endsection
