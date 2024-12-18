<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    <!-- View Tenants Button -->
                    <a href="{{ route('tenants.index') }}" 
                       class="inline-block mt-4 px-6 py-3 text-white bg-green-600 hover:bg-green-700 rounded-md font-semibold transition duration-200">
                        View Tenants
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
