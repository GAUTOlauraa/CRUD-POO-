@extends('vistas/template')
@section('title', 'Editar Ordenes de Trabajo')
@section('contenido')

<main>
    <div class='container py-4'>
        <h2>Editar Orden</h2>

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ url('orden_de_trabajo/' . $orden->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <label for="Estado" class="col-sm-2 col-form-label">Estado de Orden</label>
                <div class="col-sm-5">
                    <select name="Estado" id="Estado" class="form-select" required>
                        <option value=""></option>
                        <option value="No realizado" {{ $orden->Estado == 'No realizado' ? 'selected' : '' }}>No realizado</option>
                        <option value="Realizado" {{ $orden->Estado == 'Realizado' ? 'selected' : '' }}>Realizado</option>
                        <option value="Creado" {{ $orden->Estado == 'Creado' ? 'selected' : '' }}>Creado</option>
                        <option value="En proceso" {{ $orden->Estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="Finalizado" {{ $orden->Estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Fecha" class="col-sm-2 col-form-label">Fecha de creación</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="Fecha" id="Fecha" value="{{ $orden->Fecha_de_creacion }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Tecnicos" class="col-sm-2 col-form-label">Equipo de Trabajo</label>
                <div class="col-sm-5">
                    <select name="equipo_de_trabajo_id" id="Tecnicos" class="form-select" required>
                        <option value=""></option>
                        @foreach ($equipos_de_trabajo as $equipo)
                            <option value="{{ $equipo->id }}" {{ $orden->equipo_de_trabajo_id == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->equipo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"><strong>Datos del Cliente</strong></label>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="nombre" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $orden->cliente->nombre }}" required>
                </div>

                <div class="col-sm-2">
                    <label for="apellido" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $orden->cliente->apellido }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2">
                    <label for="direccion" class="col-form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $orden->cliente->direccion }}" required>
                </div>
            </div>

            <a href="{{ url('orden_de_trabajo') }}" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
@endsection
