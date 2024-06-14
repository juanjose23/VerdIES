@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Puntos')
@section('content')
    <div class="container mt-4">
        <div class="row ">
            <div class="col-md-12">
                @foreach ($puntosPorMoneda as $punto)
                    <div class="col-md-6 mb-4">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                                Monedas disponibles
                            </div>
                            <div class="card-body">
                                <p class="card-text"> <i class="bi bi-currency-dollar"></i> Moneda:
                                    {{ $punto->monedas->nombre }}
                                </p>
                                <p class="card-text">Total de puntos: {{ $punto->total_puntos }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Tus canjes</h2>
                <div class="card-deck">
                    @foreach ($historialT as $moneda => $totalPuntos)
                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                {{ $moneda }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Total de Puntos canjeados: {{ $totalPuntos }}</h5>
                                <p class="card-text">Transacciones realizadas con {{ $moneda }}.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Actualizado {{ \Carbon\Carbon::now()->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <h2>Historial de entregas</h2>
            @foreach ($historial as $entrega)
                <div class="col-md-6 mb-4">
                    <div class="card card border-success">
                        <div class="card-header bg-success text-white">{{ $entrega['acopio'] }}</div>
                        <div class="card-body ">
                            <p><strong>Fecha:</strong> {{ $entrega['fecha'] }}</p>
                            <p><strong>Monedas obtenidas:</strong></p>
                            <ul>
                                @foreach ($entrega['monedas'] as $tipoMoneda => $cantidadTotal)
                                    <li>{{ $tipoMoneda }}: {{ $cantidadTotal }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
