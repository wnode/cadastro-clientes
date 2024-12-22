<?php

// Desafio Essentia Desenvolvedor - Back End

// Controller: app/Http/Controllers/ClienteController.php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    // Display a list of all clients
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Show the form for creating a new client
    public function create()
    {
        return view('clientes.create');
    }

    // Store a newly created client in the database
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:15',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded photo in the 'public' disk
        $path = $request->file('foto')->store('fotos', 'public');

        // Create a new client record
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'foto' => $path,
        ]);

        // Redirect to the clients list
        return redirect()->route('clientes.index');
    }

    // Show the form for editing an existing client
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Update the specified client in the database
    public function update(Request $request, Cliente $cliente)
    {
        // Validate the input data
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string|max:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the photo if a new one is uploaded
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($cliente->foto);
            $path = $request->file('foto')->store('fotos', 'public');
            $cliente->foto = $path;
        }

        // Update other fields
        $cliente->update($request->only('nome', 'email', 'telefone'));

        // Redirect to the clients list
        return redirect()->route('clientes.index');
    }

    // Remove the specified client from the database
    public function destroy(Cliente $cliente)
    {
        // Delete the associated photo from storage
        Storage::disk('public')->delete($cliente->foto);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
