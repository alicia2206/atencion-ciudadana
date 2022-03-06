@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5 bg-white shadows p-4">
            <form method="POST" action="{{ route('aplications.resumen') }}">
                @csrf
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-auto">
                        <label for="month" class="col-form-label">Mes:</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" id="month" name="month">
                            @foreach ($months as $index => $monthName)
                                <option value="{{ $index + 1 }}" {{ ($month - 1) == $index ? 'selected' : '' }}> {{ $monthName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="year" class="col-form-label">Año:</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" id="year" name="year">
                            <option value="{{ date('Y') }}" {{ $year == date('Y') ? 'selected' : '' }}> {{ date('Y') }}</option>
                            <option value="{{ date('Y') - 1 }}" {{ $year ==(date('Y') - 1) ? 'selected' : '' }}> {{ date('Y') - 1 }}</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-list"></i>&nbsp;Ver
                            Detalle</button>
                    </div>
                </div>
            </form><br>
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Área</th>
                        <th scope="col">Solicitudes</th>
                        <th scope="col">Recibidas</th>
                        <th scope="col">Atendidas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($aplications as $aplication)
                    <tr>
                        <td class="text-start">{{ $aplication['area'] }}</td>
                        <td>{{ $aplication['aplications'] }}</td>
                        <td>{{ $aplication['received'] }}</td>
                        <td>{{ $aplication['attended'] }}</td>
                    </tr>
                    @endforeach
                    <tr class="bg-secondary text-white">
                        <td class="text-start">Total</td>
                        <td>{{ $recibidas + $atendidas }}</td>
                        <td>{{ $recibidas }}</td>
                        <td>{{ $atendidas }}</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
