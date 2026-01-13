@extends('layouts.admin')
@section('content')



    <div class="content">
        <div class="content-title">
            <h1 class="page-title">Detalhes do Usuário</h1>
        <a href="{{ route('user.index')}}" class="btn-primary">Listar</a>
    </div>

    <x-alert/>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Informações do Usuário</h2>
                <div class="text-gray-700">
                    <div class="mb-1">
                        <span>
                            ID:
                            <span class="font-bold">{{$user->id}}</span>
                        </span>
                    </div>

                    <div class="mb-1">
                        <span>
                            Nome:
                            <span class="font-bold">{{$user->name}}</span>
                        </span>
                    </div>

                    <div class="mb-1">
                        <span>
                            E-mail:
                            <span class="font-bold">{{$user->email}}</span>
                        </span>
                    </div>

                    <div class="mb-1">
                        Criado em:
                        <span>
                            <span class="font-bold">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s')}}</span>
                        </span>
                    </div>

                    <div class="mb-1">
                        <span>
                        Editado em:
                            <span class="font-bold">{{ \Carbon\Carbon::parse($user->update_at)->format('d/m/Y H:i:s')}}</span>
                        </span>
                    </div>
                </div>
        </div>

    </div>


@endsection
