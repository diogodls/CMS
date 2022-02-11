@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>
@endsection

@section('content')

    <form action="{{route('users.store')}}" method="POST" class="form-horizontal">
        @csrf

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for="">Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{old('name')}}" name="name">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for="">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" value="{{old('email')}}" name="email">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for="">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for="">Confirmação da Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label" for=""></label>
                <div class="col-sm-10">
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </div>
            </div>
        </div>

    </form>

@endsection
