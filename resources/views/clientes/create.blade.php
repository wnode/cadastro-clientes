@extends('layout')

@section('content')
<h1>Adicionar Novo Cliente</h1>

<!-- Form to create a new client -->
<form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Input for Client Name -->
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>

    <!-- Input for Email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <!-- Input for Phone -->
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" required>

    <!-- Input for Photo -->
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" required>

    <!-- Submit Button -->
    <button type="submit">Salvar</button>
</form>

<!-- Cancel Button -->
<a href="{{ route('clientes.index') }}">Cancelar</a>
@endsection
