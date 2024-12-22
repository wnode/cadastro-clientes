@extends('layout')

@section('content')
<h1>Client List</h1>

<!-- Button to add a new client -->
<a href="{{ route('clientes.create') }}">Adicionar Novo Cliente</a>

<!-- Clients table -->
<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through each client and display their data -->
        @foreach($clientes as $cliente)
        <tr>
            <!-- Display the client's photo -->
            <td><img src="{{ asset('storage/' . $cliente->foto) }}" width="50"></td>
            <!-- Display the client's name -->
            <td>{{ $cliente->nome }}</td>
            <!-- Display the client's email -->
            <td>{{ $cliente->email }}</td>
            <!-- Display the client's phone -->
            <td>{{ $cliente->telefone }}</td>
            <td>
                <!-- Link to edit the client -->
                <a href="{{ route('clientes.edit', $cliente) }}">Edit</a>
                <!-- Form to delete the client -->
                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
