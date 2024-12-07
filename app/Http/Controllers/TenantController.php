<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// TenantController.php
public function index()
{
    $tenants = Tenant::all(); // Or you can use pagination: Tenant::paginate(10)
    
    return view('tenant.index', compact('tenants'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|string|max:225|email|unique:tenants,email',
            'domain_name' => 'required|string|max:225|unique:domains,domain',// fixed the input name to 'domain_name'
            'password' => 'required|string|min:8|confirmed', // Ensure the password is at least 8 characters and has confirmation
        ]);
    
        // Create a new tenant with the validated data
        $tenant = Tenant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'domain_name' => $validatedData['domain_name'], // Storing domain_name here
            'password' => $validatedData['password'], // This will be automatically hashed by the mutator
        ]);
    
        // Create the domain for the tenant
        $tenant->domains()->create([
            'domain' => $validatedData['domain_name'] . '.' . config('app.domain'),
        ]);
    
        // Redirect to tenant index with success message
        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
