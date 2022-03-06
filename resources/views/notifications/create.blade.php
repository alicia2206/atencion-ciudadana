@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white shadows p-4">
            <h5>ENVIAR NOTIFICACION ( {{ $responsable->area->name }})</h5>
            <hr>
            @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('sendNotification') }}" method="POST">
                @csrf
                <input type="hidden" name="area_id" value="{{ $responsable->area->id }}">
                <input type="hidden" name="notification" value="1">
                <div class="mb-3">
                    <label for="email" class="form-label">Responsable:&nbsp;</label>
                    <ul>
                        <li> {{ $responsable->responsable }} // <strong>{{ $responsable->email }}</strong> </li>
                    </ul>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje:</label>
                    <textarea class="form-control" name="message" id="message" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i>&nbsp;Enviar
                    Notificación</button>
            </form>
        </div>
    </div>
@endsection
