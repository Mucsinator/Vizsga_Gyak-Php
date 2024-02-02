<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rental::with(['car'])
            ->get();
        return Rental::all();
        return response()->json(Rental::all());
    }

    public function rentalsAfterDate(string $date)
    {

        $rentals = Rental::with(['car'])->where('fromDate', '>=', $date)->get();
        return $rentals;

    }

    public function store(Request $request)
    {
        $today = date("Y-m-d");

        if($request->fromDate <= $today)
        {
            return response()->json(["message" => "Hibás Dátum"], 422);
        }

        $rental=Rental::create($request->all());


        return $rental;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
