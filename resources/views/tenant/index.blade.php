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

                <!-- Tenant Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 border-b">ID</th>
                                <th class="px-6 py-4 border-b">Name</th>
                                <th class="px-6 py-4 border-b">Email</th>
                                <th class="px-6 py-4 border-b">Domain</th>
                                <th class="px-6 py-4 border-b">Database</th>
                                <th class="px-6 py-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                                <tr>
                                    <td class="px-6 py-4 border-b">{{ $tenant->id }}</td>
                                    <td class="px-6 py-4 border-b">{{ $tenant->name }}</td>
                                    <td class="px-6 py-4 border-b">{{ $tenant->email }}</td>
                                    <td class="px-6 py-4 border-b">{{ $tenant->domain_name }}</td>
                                    <td class="px-6 py-4 border-b">{{ $tenant->tenancy_db_name}}</td>
                                    <td class="px-6 py-4 border-b flex space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" 
                                           class="text-yellow-500 hover:text-yellow-700">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this tenant?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
