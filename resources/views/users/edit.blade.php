@extends('layouts.admin')
@section('content')



    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Editar Usuário</h1>
        <a href="{{ route('user.index')}}" class="btn-primary">Listar</a>
    </div>

    <x-alert/>

    <form action="{{route ('user.update', ['user' => $user->id])}}" class="form-container" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="nome completo" class="form-input" value="{{ old('name', $user->name)}}">
        </div>

        <div class="mb-4">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" placeholder="digite seu email" class="form-input" value="{{ old('email', $user->email)}}">
        </div>

        <button type="submit" class="btn-edit">Salvar</button>
    </form>
        </div>


@endsection
