<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Service.View',[
            'services' => Service::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Services.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'identificacion' => 'required|integer|exists:clientes,identificacion',
                'servicio' => 'required|array',
            ]);

            foreach ($validated['servicio'] as $servicio) {
                Service::create([
                    'identificacion' => $validated['identificacion'],
                    'servicio' => $servicio,
                    'fechaInicio' => Carbon::now(),
                    'ultimaFacturacion' => Carbon::now(),
                    'ultimoPago' => '0',
                ]);
            }
            return redirect()->route('index')->with('success', 'Servicios configurados correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Ocurrió un error al intentar guardar los servicios.');
        }
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
