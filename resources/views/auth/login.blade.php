@extends('layouts.login')
@section('content')
    <h1 class="title-login">Projeto Laravel</h1>

    <x-alert/>

<form class="mt-4" action="{{ route('login.process') }}" method="post">
    @csrf
    @method('post')

    <div class="form-group-login">
        <label for="email" class="form-label-login">E-mail</label>
        <input type="email" name="email" id="email" class="form-input-login" placeholder="Digite seu e-mail" value="{{ old('email')}}" required>
    </div>

    <div class="form-group-login">
        <label for="password" class="form-label-login">Senha</label>
        <input type="password" name="password" id="password" class="form-input-login" placeholder="Digite sua senha" value="{{ old('password')}}" required>
    </div>

    <!--alterar senha-->
    <div class="btn-group-login">
        <a href="#" class="link-login">Esqueçeu a senha?</a>
        <button type="submit" class="btn-primary"> Acessar</button>
    </div>

    <div class="mt-4 text-center">
        <a href="#" class="link-login">Criar nova conta</a>
    </div>

</form>

@endsection
