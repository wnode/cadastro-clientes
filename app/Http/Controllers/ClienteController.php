<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all customers from the database.
        $clientes = Cliente::all();
        
        // Return the view with the list of customers.
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new customer.
        return view('clientes.create');
    }

    /**
     * Store a newly created customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data.
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload if a photo is provided.
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        // Create a new customer in the database.
        Cliente::create($validated);

        // Redirect back to the customer list with a success message.
        return redirect()->route('clientes.index')->with('success', 'Customer created successfully!');
    }

    /**
     * Show the form for editing a specified customer.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the customer by ID.
        $cliente = Cliente::findOrFail($id);

        // Return the edit form view.
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data.
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the customer by ID.
        $cliente = Cliente::findOrFail($id);

        // Handle the file upload if a new photo is provided.
        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists.
            if ($cliente->foto) {
                Storage::disk('public')->delete($cliente->foto);
            }

            // Store the new photo.
            $validated['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        // Update the customer's data.
        $cliente->update($validated);

        // Redirect back to the customer list with a success message.
        return redirect()->route('clientes.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified customer from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the customer by ID.
        $cliente = Cliente::findOrFail($id);

        // Delete the customer's photo if it exists.
        if ($cliente->foto) {
            Storage::disk('public')->delete($cliente->foto);
        }

        // Delete the customer record.
        $cliente->delete();

        // Redirect back to the customer list with a success message.
        return redirect()->route('clientes.index')->with('success', 'Customer deleted successfully!');
    }
}
