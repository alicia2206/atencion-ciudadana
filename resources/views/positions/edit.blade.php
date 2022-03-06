@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white shadows p-4">
            <h5>EDITAR CARGO</h5>
            <hr>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('positions.update',$position->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="area_id" class="form-label">Area:</label>
                    <select class="form-select" aria-label="Default select example" id="area_id" name="area_id">
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ $area->id == $position->area_id ? 'selected' : '' }}>
                                {{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name', $position->name) }}">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable:</label>
                    <input type="text" class="form-control" name="responsable" id="responsable"
                        value="{{ old('responsable', $position->responsable) }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone', $position->phone) }}">
                </div>
                <div class="mb-3">
                    <label for="extension" class="form-label">Extensión:</label>
                    <input type="text" class="form-control" name="extension" id="extension" value="{{ old('extension', $position->extension) }}">
                </div>
                <div class="mb-3">
                    <label for="movil" class="form-label">Particular:</label>
                    <input type="tel" class="form-control" name="movil" id="movil" value="{{ old('movil', $position->movil) }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $position->email) }}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Ubicación:</label>
                    <input type="text" class="form-control" name="location" id="location"
                        value="{{ old('location', $position->location) }}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Notificable:</label>
                   <select class="form-select" name="contactable" id="contactable">
                       <option value="Si" @selected(old('contactable', $position->contactable) == 'Si')>Si</option>
                       <option value="No" @selected(old('contactable', $position->contactable) == 'No')>No</option>
                   </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</button>
            </form>
        </div>
    </div>
@endsection
