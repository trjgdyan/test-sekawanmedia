<?php

namespace App\Http\Controllers;

use App\Models\rental_company;
use App\Http\Requests\Storerental_companyRequest;
use App\Http\Requests\Updaterental_companyRequest;

class RentalCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rental = rental_company::all();
        return view('company.index', compact('rental'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storerental_companyRequest $request)
    {
        $validated = $request->validated();

        rental_company::create($validated);
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($company)
    {
        $datas = rental_company::find($company);
        return view('company.show', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($company)
    {
        $data = rental_company::find($company);
        return view('company.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updaterental_companyRequest $request, $company)
    {
        $validated = $request->validated();
        $data = rental_company::find($company);
        $data->update($validated);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($company)
    {
        rental_company::destroy($company);
        return redirect()->route('company.index');
    }
}
