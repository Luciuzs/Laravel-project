@extends('layouts.app')

@section('title', __('messages.conferences'))

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">{{ __('messages.conferences') }}</h1>

        @auth
            <a href="{{ route('conferences.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition">
                {{ __('messages.create') }}
            </a>
        @endauth
    </div>

    @if($conferences->isEmpty())
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <p class="text-gray-500">No conferences found.</p>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Address
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($conferences as $conference)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $conference->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $conference->conference_date->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $conference->address }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('conferences.show', $conference->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                View
                            </a>

                            @auth
                                <a href="{{ route('conferences.edit', $conference->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    Edit
                                </a>

                                <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            @endauth
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
