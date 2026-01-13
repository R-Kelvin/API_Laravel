@extends('layouts.admin')
@section('content')



    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Cadastrar Usuário</h1>
        <a href="{{ route('user.index')}}" class="btn-primary">Listar</a>
    </div>

    <x-alert/>

    <form action="{{route ('user.store')}}" class="form-container" method="post">
        @csrf
        <div class="mb-4">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="nome completo" class="form-input" value="{{ old('name')}}">
        </div>

        <div class="mb-4">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" placeholder="digite seu email" class="form-input" value="{{ old('email')}}">
        </div>

        <div class="mb-4">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" placeholder="digite sua senha" class="form-input" value="{{ old('password')}}">
        </div>

        <button type="submit" class="btn-success">Cadastrar</button>
    </form>
        </div>


@endsection
