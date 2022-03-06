@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9 bg-white shadows p-4">
            <h5>GESTION DE SOLICITUD: {{ $aplication->tracking }}</h5>
            <hr>
            <form action="{{ route('aplications.update', $aplication->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="area_id" class="form-label">Area:</label>
                                <select class="form-select" aria-label="Default select example" id="area_id"
                                    name="area_id">
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" @selected($area->id ==
                                            old('area_id',$aplication->area_id))>
                                            {{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="otherArea" style="display:none">
                                <label for="otherArea" class="form-label">Especificar Area:</label>
                                <input type="text" class="form-control" name="otherArea" id="otherArea"
                                    value="{{ old('otherArea', $aplication->otherArea) }}">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Asunto:</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    value="{{ old('subject', $aplication->subject) }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $aplication->name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="direction" class="form-label">Domicilio:</label>
                                <input type="text" class="form-control" name="direction" id="direction"
                                    value="{{ old('direction', $aplication->direction) }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono:</label>
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone', $aplication->phone) }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Estado de la Solicitud:</label>
                                <select class="form-select" aria-label="Default select example" id="status"
                                    name="status">
                                    <option value="Recibido"
                                        {{ old('status', $aplication->status) == 'Recibido' ? 'selected' : '' }}>Recibido
                                    </option>
                                    <option value="Atendido"
                                        {{ old('status', $aplication->status) == 'Atendido' ? 'selected' : '' }}>Atendido
                                    </option>
                                </select>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="petition" class="form-label">Petición:</label>
                                <textarea class="form-control" name="petition" id="petition"
                                    rows="10">{{ old('petition', $aplication->petition) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="petition" class="form-label text-secondary fw-bold">Cargue solamente los pdf´s
                                    que desee sustituir.</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">CARGAR ARCHIVO PDF DE INE</label>
                                <input class="form-control" type="file" id="ine" name="inePdf">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">CARGAR ARCHIVO PDF DE CURP</label>
                                <input class="form-control" type="file" id="curp" name="curpPdf">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">CARGAR ARCHIVO PDF DE COMPROBANTE DE
                                    DOMICILIO</label>
                                <input class="form-control" type="file" id="proofAddress" name="proofAddressPdf">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar
                    Cambios</button>
                <a href="{{ route('notifications.show', $aplication->id) }}" class="btn btn-xs btn-primary"><i
                        class="fa-solid fa-envelope"></i>&nbsp;Enviar Notificación
                </a>
            </form>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $('#area_id').on('change', function() {
            if (this.value == 1) {
                document.getElementById("otherArea").style.display = "block";
            } else {
                document.getElementById("otherArea").style.display = "none";
            }
        });

        $(document).ready(function() {
            if ($('#area_id').val() == 1) {
                document.getElementById("otherArea").style.display = "block";
            } else {
                document.getElementById("otherArea").style.display = "none";
            }
        })
    </script>
@endpush
