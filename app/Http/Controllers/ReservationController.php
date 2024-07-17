<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        // dd($reservation);
        return view('reservations.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        return view('reservations.create', compact('vehicles', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:255'],
            'type_of_tenant' => ['required', 'in:personal,company'],
            'vehicle' => ['nullable', 'string'],
            'driver' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        Reservation::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'type_of_tenant' => $validated['type_of_tenant'],
            'id_vehicle' => $validated['vehicle'],
            'id_driver' => $validated['driver'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()->route('reservations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $reservation = Reservation::find($reservation->id);
        return view(
            'reservations.edit',
            ['reservation' => $reservation, 'vehicles' => $vehicles, 'drivers' => $drivers]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:255'],
            'type_of_tenant' => ['required', 'in:personal,company'],
            'vehicle' => ['nullable', 'string'],
            'driver' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        Reservation::where('id', $reservation->id)->update(
            [
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone_number' => $validated['phone_number'],
                'type_of_tenant' => $validated['type_of_tenant'],
                'id_vehicle' => $validated['vehicle'],
                'id_driver' => $validated['driver'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]
        );

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        Reservation::destroy($reservation->id);

        return redirect()->route('reservations.index');
    }
}
