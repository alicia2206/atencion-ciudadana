@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 bg-white shadows p-4">
            <a href="{{ route('positions.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp; Nuevo
                Cargo</a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center table-responsive"
                    id="positions-table" style="width:100%">
                    <thead>
                        <tr>
                            <th> </th>
                            <th>Notificable</th>
                            <th>Cargo</th>
                            <th>Area</th>
                            <th>Responsable</th>
                            <th>Teléfono</th>
                            <th>Extension</th>
                            <th>Particular</th>
                            <th>Correo</th>
                            <th>Ubicación</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $position)
                            <tr>
                                <td>
                                    <a href="{{ route('notificationcargo', $position->id) }}"
                                        class="btn btn-xs btn-primary btn-circle"><i class="fa-solid fa-envelope"></i>
                                    </a>
                                </td>
                                <td class="{{ $position->contactable == 'Si' ? 'text-success' : 'text-danger' }}">
                                    {{ $position->contactable }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->area->name }}</td>
                                <td>{{ $position->responsable }}</td>
                                <td><a style="text-decoration:none; text-color:black" href="tel:{{ $position->phone }}">{{ $position->phone }} </a></td>
                                <td>{{ $position->extension }}</td>
                                <td><a style="text-decoration:none; text-color:black" href="tel:{{ $position->phone }}">{{ $position->movil }}</a></td>
                                <td>{{ $position->email }}</td>
                                <td>{{ $position->location }}</td>
                                <td>
                                    <a href="{{ route('positions.edit', $position->id) }}"
                                        class="btn btn-xs btn-primary btn-circle"><i class="fa-solid fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger btn-circle"><i
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
        var positions_table = $('#positions-table').DataTable({
            pageLength: 5,
            language: {
                url: '{{ asset('plugins/es_es.json') }}'
            },
            order: [
                [0, "desc"]
            ]
        });
    </script>
@endpush
