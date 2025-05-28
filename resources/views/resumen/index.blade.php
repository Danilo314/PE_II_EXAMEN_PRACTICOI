@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Resúmenes Ejecutivos</h6>
            <a href="{{ route('resumen.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Nuevo Resumen
            </a>
        </div>
        <div class="card-body">
            @if($resumenes->isEmpty())
                <div class="alert alert-info">No hay resúmenes creados</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre del Proyecto</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resumenes as $resumen)
                            <tr>
                                <td>{{ $resumen->nombre_proyecto }}</td>
                                <td>{{ $resumen->fecha_elaboracion->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('resumen.show', $resumen->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection