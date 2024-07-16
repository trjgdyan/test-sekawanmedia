<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'vehicle_type' => ['required', 'in:personnel_transport,goods_transport'],
            'license_plate' => ['required', 'max:255'],
            'is_company_owned' => ['required', 'boolean'],
            'service_schedule' => ['required', 'date'],
            'location' => ['required', 'max:255'],
        ]);

        // dd($validated);

        $vehicle = Vehicle::create(
            [
                'name' => $validated['name'],
                'vehicle_type' => $validated['vehicle_type'],
                'license_plate' => $validated['license_plate'],
                'is_company_owned' => $validated['is_company_owned'],
                'service_schedule' => $validated['service_schedule'],
                'location' => $validated['location'],
            ]
        );

        // dd($vehicle);

        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $vehicle = Vehicle::find($vehicle->id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicle = Vehicle::find($vehicle->id);
        return view(
            'vehicles.edit',
            [
                'vehicle' => $vehicle
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'vehicle_type' => ['required', 'in:personnel_transport,goods_transport'],
            'license_plate' => ['required', 'max:255'],
            'is_company_owned' => ['required', 'boolean'],
            'service_schedule' => ['required', 'date'],
            'location' => ['required', 'max:255'],
        ]);

        Vehicle::where('id', $vehicle->id)->update(
            [
                'name' => $validated['name'],
                'vehicle_type' => $validated['vehicle_type'],
                'license_plate' => $validated['license_plate'],
                'is_company_owned' => $validated['is_company_owned'],
                'service_schedule' => $validated['service_schedule'],
                'location' => $validated['location'],
            ]
        );

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        Vehicle::destroy($vehicle->id);

        return redirect()->route('vehicles.index');
    }
}
