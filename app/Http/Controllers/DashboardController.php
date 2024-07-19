<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countReservation = Reservation::count();
        $countPersonalTransport = Vehicle::where('type', 'personnel_transport')->count();
        $countGoodsTransport = Vehicle::where('type', 'goods_transport')->count();
        $vehicles = Vehicle::all();

        $countVehicleReservation = [];

        foreach ($vehicles as $vehicle) {
            $countVehicleReservation[] = [
                'name' => $vehicle->name,
                'count' => Reservation::where('id_vehicle', $vehicle->id)->count(),
            ];
        }

        return view('dashboard', compact('countReservation', 'countPersonalTransport', 'countGoodsTransport', 'countVehicleReservation'));
    }
}
