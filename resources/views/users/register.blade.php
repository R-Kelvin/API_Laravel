
@extends('layouts.login')
@section('content')

    <h1 class="title-login">Criar novo Usuário</h1>

    <x-alert/>

<form class="mt-4" action="{{ route('user.storeRegister') }}" method="post">
    @csrf


    <div class="form-group-login">
        <label for="name" class="form-label-login">Nome</label>
        <input type="text" name="name" id="name" class="form-input-login" placeholder="Digite seu nome" value="{{ old('name')}}">
    </div>


    <div class="form-group-login">
        <label for="email" class="form-label-login">E-mail</label>
        <input type="email" name="email" id="email" class="form-input-login" placeholder="Digite seu e-mail" value="{{ old('email')}}">
    </div>

    <div class="form-group-login">
        <label for="password" class="form-label-login">Senha</label>
        <input type="password" name="password" id="password" class="form-input-login" placeholder="Digite sua senha" value="{{ old('password')}}">
    </div>

    <div class="btn-group-login">
        <a href="{{ route('login') }}" class="btn-primary">Voltar</a>
        <button type="submit" class="btn-success">Cadastrar</button>
    </div>
</form>

@endsection

