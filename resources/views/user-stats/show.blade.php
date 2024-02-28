<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Stats') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>User ID:</strong> {{ $userStats->user_id }}</p>
                    <p><strong>Earnings:</strong> {{ $userStats->earnings }}</p>
                    <p><strong>Level:</strong> {{ $userStats->level }}</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
