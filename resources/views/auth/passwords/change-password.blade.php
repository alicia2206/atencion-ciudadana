@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white shadows p-4">
            <form class="form-horizontal" method="POST" action="{{ route('changePasswordSave') }}">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña Actual</label>
                    <input id="current-password" type="password" class="form-control" name="current-password"
                                    >

                    @if ($errors->has('current-password'))
                        <div id="emailHelp" class="form-text form-text text-danger fw-bold">{{ $errors->first('current-password') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nueva Contraseña</label>
                    <input id="new-password" type="password" class="form-control" name="new-password"
                                    >
                    @if ($errors->has('new-password'))
                        <div id="emailHelp" class="form-text text-danger fw-bold">{{ $errors->first('new-password') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Confirmar Nueva Contraseña</label>
                    <input id="new-password-confirm" type="password" class="form-control"
                                    name="new-password_confirmation" >
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection
