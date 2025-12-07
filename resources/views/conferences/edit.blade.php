@extends('layouts.app')

@section('title', __('messages.edit_conference'))

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6">{{ __('messages.edit_conference') }}</h2>

            <form action="{{ route('conferences.update', $conference->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('conferences.form')

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('conferences.index') }}" class="text-gray-600 hover:text-gray-800 transition">
                        {{ __('messages.cancel') }}
                    </a>
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded transition"
                    >
                        {{ __('messages.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
