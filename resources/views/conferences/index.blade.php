@extends('layouts.app')

@section('title', 'Conferences')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                Conferences
            </h1>
            <p class="text-gray-600 mt-2">All the upcoming cenferences</p>
        </div>

        @auth
            <a href="{{ route('conferences.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 font-medium">
                + New Conference
            </a>
        @endauth
    </div>

    @if($conferences->isEmpty())
        <div class="bg-white shadow-xl rounded-2xl p-12 text-center">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-500 text-lg">No conferences found. Create your first one!</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($conferences as $conference)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Gradient top bar -->
                    <div class="h-2 bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500"></div>

                    <div class="p-6">
                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                            {{ $conference->title }}
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($conference->description, 120) }}
                        </p>

                        <!-- Date -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium">{{ $conference->conference_date->format('M d, Y') }}</span>
                        </div>

                        <!-- Location -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $conference->address }}</span>
                        </div>

                        <!-- City & Participants (if exists) -->
                        @if($conference->city || $conference->participants_count)
                            <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                                @if($conference->city)
                                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded-full">{{ $conference->city }}</span>
                                @endif
                                @if($conference->participants_count)
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full">{{ $conference->participants_count }} attendees</span>
                                @endif
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex gap-2 mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('conferences.show', $conference->id) }}" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-2 rounded-lg transition font-medium text-sm shadow hover:shadow-md">
                                View Details
                            </a>

                            @auth
                                <a href="{{ route('conferences.edit', $conference->id) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition font-medium text-sm">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-lg transition font-medium text-sm" onclick="return confirm('Delete this conference?')">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
