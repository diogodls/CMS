@extends('adminlte::page')

@section('title', 'Meu perfil')

@section('content_header')

    <h1>Meu perfil</h1>

@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5><i class="icon fas fa-ban"></i>Ocorreu um erro.</h5>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-info">
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('profile.save')}}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Nova Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="">Confirmação da Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for=""></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
