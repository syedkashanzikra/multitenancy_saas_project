<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Create Tenant Button -->
                    <a href="{{ route('tenants.create') }}" 
                       class="inline-block px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-md font-semibold transition duration-200">
                        Create Tenant
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
