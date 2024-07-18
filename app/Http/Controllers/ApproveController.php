<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{

    public function index()
    {
        $userlogin = Auth::user()->id;
        // dd($userlogin);
        $approve = Approve::where('id_user', $userlogin)->where('status', 'pending')->get();

        // dd($approve);
        return view('approve.index', compact('approve'));
    }

    public function detail($id)
    {
        $allApprove = Approve::where('id_reservation', $id)->get();
        $reservation = Approve::where('id_reservation', $id)->first();
        $userlogin = Auth::user()->id;

        // Inisialisasi koleksi kosong untuk menyimpan data yang difilter
        $filteredApproves = collect();

        // Iterasi melalui koleksi dan tambahkan data ke koleksi yang difilter
        foreach ($allApprove as $approve) {
            if ($approve->id_user == $userlogin) {
                break; // Hentikan loop saat mencapai record dengan id_user sama dengan userlogin
            }
            $filteredApproves->push($approve); // Tambahkan record ke koleksi yang difilter
        }

        // Tentukan nilai statusapprove berdasarkan filteredApproves
        // $filteredApproves->first()->status;
        // dd($filteredApproves->last()->status);
        $statusBefore = 'approve';
        $statusnow = Approve::where('id_reservation', $id)->where('id_user', Auth::user()->id)->first(); // Inisialisasi sebagai true
        $statusUser = $statusnow->status;
        // dd($statusUser);

        if ($filteredApproves->isNotEmpty()) {
            $lastStatus = $filteredApproves->last()->status;

            if ($lastStatus === 'pending') {
                $statusBefore = 'pending';
            } elseif ($lastStatus === 'approve') {
                $statusBefore = 'approve';
            } elseif ($lastStatus === 'reject') {
                $statusBefore = 'reject';
            }
        }

        return view('approve.show', compact('statusBefore', 'reservation', 'statusUser'));

    }

    public function approve(Request $request, $id_reservation)
    {
        $validate = $request->validate([
            'status' => ['required', 'in:approve,reject'],
        ]);
        // dd($validate);

        $approve = Approve::where('id_reservation', $id_reservation)->where('id_user', Auth::user()->id)->first();
        $approve->status = $validate['status'];
        $approve->save();

        return redirect()->route('approve.index');
    }
}
