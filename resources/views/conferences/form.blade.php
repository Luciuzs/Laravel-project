
<!-- Title -->
<div class="mb-4">
    <label for="title" class="block text-gray-700 font-medium mb-2">
{{ __('messages.title') }} <span class="text-red-500">*</span>
</label>
<input
    type="text"
    name="title"
    id="title"
    value="{{ old('title', $conference->title ?? '') }}"
    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
    required
>
@error('title')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>

<!-- Description -->
<div class="mb-4">
    <label for="description" class="block text-gray-700 font-medium mb-2">
        {{ __('messages.description') }} <span class="text-red-500">*</span>
    </label>
    <textarea
        name="description"
        id="description"
        rows="4"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
        required
    >{{ old('description', $conference->description ?? '') }}</textarea>
    @error('description')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Conference Date -->
<div class="mb-4">
    <label for="conference_date" class="block text-gray-700 font-medium mb-2">
        {{ __('messages.date') }} <span class="text-red-500">*</span>
    </label>
    <input
        type="date"
        name="conference_date"
        id="conference_date"
        value="{{ old('conference_date', $conference->conference_date ?? '') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('conference_date') border-red-500 @enderror"
        required
    >
    @error('conference_date')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Address -->
<div class="mb-4">
    <label for="address" class="block text-gray-700 font-medium mb-2">
        {{ __('messages.address') }} <span class="text-red-500">*</span>
    </label>
    <input
        type="text"
        name="address"
        id="address"
        value="{{ old('address', $conference->address ?? '') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror"
        required
    >
    @error('address')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Participants Count (Bonus field) -->
<div class="mb-4">
    <label for="participants_count" class="block text-gray-700 font-medium mb-2">
        {{ __('messages.participants_count') }}
    </label>
    <input
        type="number"
        name="participants_count"
        id="participants_count"
        value="{{ old('participants_count', $conference->participants_count ?? '') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('participants_count') border-red-500 @enderror"
        min="0"
    >
    @error('participants_count')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- City (Bonus field) -->
<div class="mb-6">
    <label for="city" class="block text-gray-700 font-medium mb-2">
        {{ __('messages.city') }}
    </label>
    <input
        type="text"
        name="city"
        id="city"
        value="{{ old('city', $conference->city ?? '') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('city') border-red-500 @enderror"
    >
    @error('city')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
