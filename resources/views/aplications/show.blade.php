@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-3 bg-white shadows p-4 border">
            <form method="POST" action="{{ route('aplications.tracking') }}">
                @csrf
                <div class="mb-3">
                    <label for="subject" class="form-label">Número de seguimiento:</label>
                    <input type="text" class="form-control" name="tracking" id="tracking" value="{{ old('tracking') }}"
                        required>
                    @if ($error)
                        <div class="form-text text-danger fw-bold">Este número de seguimiento es incorrecto.</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp;Verificar</button>
            </form>
        </div>
    </div>
    @if ($information)
        <div class="row mb-4">
            <div class="col-md-5 bg-white shadows p-4 border">
                <h4><i class="fas fa-stream"></i>&nbsp;SOLICITUD {{ $tracking }}</h4>
                <hr>
                <div class="mb-4">
                    Su solicitud fue recibida el dia <strong>{{ $created_at }}</strong> y en estos momentos tiene el siguiente proceso:
                </div>
                <div>
                    @if ($status == 'Recibido')
                    Está a la espera de ser <strong>ATENDIDA</strong>
                    @else
                    Fué <strong class="text-success">ATENDIDA</strong> el día <strong>{{ $updated_at }}</strong>
                    @endif
                    por al área de <strong>{{ $area }}</strong>.
                </div>
                <div class="my-4">
                    Puedes descargar el detalle de tu solicitud dando click al siguiente botón:
                </div>
                <form action="{{ route('aplications.generatepdf') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tracking" value="{{ $tracking }}">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-file-download"></i>&nbsp;Descargar
                        Solicitud</button>
                </form>
            </div>
        </div>
    @endif
@endsection
