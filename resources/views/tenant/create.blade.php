<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tenant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tenants.store') }}">
                        @csrf
                    
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Tenant Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Tenant Name
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Tenant Domain -->
                            <div>
                                <label for="domain_name" class="block text-sm font-medium text-gray-700">
                                    Tenant Domain (e.g., example)
                                </label>
                                <input type="text" name="domain_name" id="domain_name" value="{{ old('domain_name') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('domain_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Tenant Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Tenant Email
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Tenant Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Tenant Password
                                </label>
                                <input type="password" name="password" id="password" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                    Confirm Password
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="w-full px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-md font-semibold transition duration-200">
                                    Create Tenant
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
