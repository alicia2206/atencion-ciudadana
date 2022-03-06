@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 bg-white shadows p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center table-responsive"
                    id="aplications-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Recibido</th>
                            <th>Seguimiento</th>
                            <th>Solicitante</th>
                            <th>Domicilio</th>
                            <th>Asunto</th>
                            <th>Estado</th>
                            <th>Area</th>
                            <th>PETICION</th>
                            <th>INE</th>
                            <th>CURP</th>
                            <th>C.D.</th>
                            <th>Gestionar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aplications as $aplication)
                            <tr>
                                <td>{{ $aplication->created_at }}</td>
                                <td>{{ $aplication->tracking }}</td>
                                <td>{{ $aplication->name }}</td>
                                <td>{{ $aplication->direction }}</td>
                                <td>{{ $aplication->subject }}</td>
                                <td class="fw-bold">
                                    <span class=" color: {{ $aplication->status == 'Recibido'  ? 'text-danger' : 'text-success'}}">
                                        {{ $aplication->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $aplication->area->name }}
                                    @if ($aplication->area->id == 1)
                                        ({{ $aplication->otherArea }})
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('aplications.generatepdf') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $aplication->id }}">
                                        <button type="submit" class="btn btn-xs btn-info">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('aplications.getpdf') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $aplication->id }}">
                                        <input type="hidden" name="pdf" value="inePdf">
                                        <button type="submit" class="btn btn-xs btn-success">
                                            <i class="fa-solid fa-download"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('aplications.getpdf') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $aplication->id }}">
                                        <input type="hidden" name="pdf" value="curpPdf">
                                        <button type="submit" class="btn btn-xs btn-success">
                                            <i class="fa-solid fa-download"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('aplications.getpdf') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $aplication->id }}">
                                        <input type="hidden" name="pdf" value="proofAddressPdf">
                                        <button type="submit" class="btn btn-xs btn-success">
                                            <i class="fa-solid fa-download"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('aplications.edit', $aplication->id) }}"
                                        class="btn btn-xs btn-primary"><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('aplications.destroy', $aplication->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        var aplications_table = $('#aplications-table').DataTable({
            pageLength: 10,
            language: {
                url: '{{ asset('plugins/es_es.json') }}'
            },
            order: [ 0, 'desc' ]
        });
    </script>
@endpush
