@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white shadows p-4">
            <h5>NUEVO CARGO</h5>
            <hr>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="area_id" class="form-label">Area:</label>
                    <select class="form-select" aria-label="Default select example" id="area_id" name="area_id">
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable:</label>
                    <input type="text" class="form-control" name="responsable" id="responsable"
                        value="{{ old('responsable') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="mb-3">
                    <label for="extension" class="form-label">Extensión:</label>
                    <input type="text" class="form-control" name="extension" id="extension" value="{{ old('extension') }}">
                </div>
                <div class="mb-3">
                    <label for="movil" class="form-label">Particular:</label>
                    <input type="tel" class="form-control" name="movil" id="movil" value="{{ old('movil') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Ubicación:</label>
                    <input type="text" class="form-control" name="location" id="location"
                        value="{{ old('location') }}">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</button>
            </form>
        </div>
    </div>
@endsection
