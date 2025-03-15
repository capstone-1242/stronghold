<?php

namespace App\Http\Controllers;

use App\Models\resource;
use App\Http\Requests\StoreresourceRequest;
use App\Http\Requests\UpdateresourceRequest;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authResources(Request $request)
    {
        $resources = Resource::paginate(8);

        return view('auth.auth-resources', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreresourceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateresourceRequest $request, resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resource $resource)
    {
        //
    }
}
