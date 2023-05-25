<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();

        return PackageResource::collection($packages);
    }

    public function show( $package)
    {
        $packages = Package::findOrFail($package);

        return new PackageResource($packages);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_custom' => 'sometimes|boolean',
            'name' => 'required',
            'total_sms' => 'required|integer',
            'additional_sms' => 'required|integer',
        ]);
        $package = Package::create($validated);

        return new PackageResource($package);
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'is_custom' => 'sometimes|boolean',
            'name' => 'required',
            'total_sms' => 'required|integer',
            'additional_sms' => 'required|integer',
        ]);
        $package->update($validated);

        return new PackageResource($package);
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return PackageResource::collection(Package::all());
    }
}
