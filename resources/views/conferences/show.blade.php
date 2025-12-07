@extends('layouts.app')

@section('title', $conference->title)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-3xl font-bold text-gray-800">{{ $conference->title }}</h2>
                @auth
                    <div class="flex space-x-2">
                        <a href="{{ route('conferences.edit', $conference->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
                            Edit
                        </a>
                        <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition" onclick="return confirm('Are you sure you want to delete this conference?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endauth
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </h3>
                    <p class="mt-1 text-lg text-gray-900">
                        {{ $conference->conference_date->format('Y-m-d') }}
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                        Address
                    </h3>
                    <p class="mt-1 text-lg text-gray-900">
                        {{ $conference->address }}
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </h3>
                    <p class="mt-1 text-gray-900 whitespace-pre-line">
                        {{ $conference->description }}
                    </p>
                </div>

                @if($conference->participants_count)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                            Participants Count
                        </h3>
                        <p class="mt-1 text-lg text-gray-900">
                            {{ $conference->participants_count }}
                        </p>
                    </div>
                @endif

                @if($conference->city)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                            City
                        </h3>
                        <p class="mt-1 text-lg text-gray-900">
                            {{ $conference->city }}
                        </p>
                    </div>
                @endif
            </div>

            <div class="mt-8">
                <a href="{{ route('conferences.index') }}" class="text-blue-600 hover:text-blue-800 transition">
                    ← Back to List
                </a>
            </div>
        </div>
    </div>
@endsection
