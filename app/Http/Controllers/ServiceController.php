<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalDiscount = 100; // Total discount to distribute

        $parts = Part::orderBy('retail_price', 'desc')->get();
        $totalRetailPrice = $parts->sum('retail_price');

        $partShares = [];

    
         foreach ($parts as $part) {
            $partShare = $part->retail_price / $totalRetailPrice;
            $discountForpart = $totalDiscount * $partShare;
            $finalPrice = $part->retail_price -= $discountForpart;
            $partShares[] = [
                'part_id' => $part->id,
                'code' => $part->code,
                'retail_price' => $part->retail_price,
                'discount' => $discountForpart,
                'final_price' => $finalPrice,
            ];
        }

        return Inertia::render('Service/Index', [
            'services' => Service::with('parts')->get(),
            'partShares' => $partShares,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Service/Create', [
            'parts' => Part::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $service = Service::create($data);

        if (isset($data['parts'])) {
            $service->parts()->attach($data['parts']);
        }

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
