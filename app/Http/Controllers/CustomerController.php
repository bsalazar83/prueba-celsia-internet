<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Customers.View',[
            'customers' => Customer::orderBy('fechaNacimiento','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Customers.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'identificacion' => 'required|integer|unique:clientes,identificacion',
                'nombres' => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'correo' => 'required|email|max:100',
                'tipoidentificacion' => 'required|string|max:2',
                'celular' => 'required|integer',
                'fechanacimiento' => 'required|date',
            ], [
                'identificacion.unique' => 'Ya existe un registro con esta identificación.',
            ]);

            $customer = Customer::create([
                'identificacion' => $validated['identificacion'],
                'nombres' => $validated['nombres'],
                'apellidos' => $validated['apellidos'],
                'correoElectronico' => $validated['correo'],
                'tipoIdentificacion' => $validated['tipoidentificacion'],
                'fechaNacimiento' => $validated['fechanacimiento'],
                'numeroCelular' => $validated['celular']
            ]);
            return redirect()->route('service.create')->with([
                'success' => 'Cliente creado correctamente.',
                'identificacion' => $customer->identificacion,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->servicios()->delete();
            $customer->delete();
            return redirect()->route('customer.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Ocurrió un error al intentar eliminar el cliente.');
        }
    }
}
