@extends('layout')

@section('content')
<h1>Editar Cliente</h1>

<form action="{{ route('clientes.update', $cliente) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Input for Client Nome -->
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required>

    <!-- Input for Email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>

    <!-- Input for Telefone -->
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required>

    <!-- Input for Foto -->
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto">

    <!-- Display current foto -->
    @if($cliente->foto)
        <img src="{{ asset('storage/' . $cliente->foto) }}" width="100">
    @endif

    <!-- Submit Button -->
    <button type="submit">Salvar Mudanças</button>
</form>

<!-- Cancel Button -->
<a href="{{ route('clientes.index') }}">Cancelar</a>
@endsection
