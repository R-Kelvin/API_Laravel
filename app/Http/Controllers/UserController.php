<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::orderByDesc('id') -> paginate(7);
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user){
        return view ('users.show', ['user' => $user]);
    }

//cria novo usuário dentro do sistema


    public function create() {
        return view ('users.create');
    }

    public function store(UserRequest $request){

        try{

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect() -> route ('user.show', ['user' => $user->id]) -> with ('success', 'Usuário casdastrado!');
    }catch(Exception $e){
        return back() -> withInput() -> with ('error', 'Usuário não casdastrado!');
    }
    }

//cria usuário fora do sistema

    public function register(){
        return view ('users.register');
    }

    public function storeRegister(UserRequest $request){

        try{

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect() -> route ('login', ['user' => $user->id]) -> with ('success', 'Usuário casdastrado!');
    }catch(Exception $e){
        return back() -> withInput() -> with ('error', 'Usuário não casdastrado!');
    }
    }

//edita usuário

    public function edit(User $user){
        return view ('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user){
        try{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect() -> route ('user.show', ['user' => $user->id]) -> with ('success', 'Usuário editado! ');
        }catch(Exception $e){
           return back() -> withInput() -> with ('error', 'Usuário não editado!');
        }
    }



//deleta usuário

    public function destroy(User $user){
        try{
            $user->delete();

            return redirect() -> route ('user.index', ['user' => $user->id]) -> with ('success', 'Usuário deletado! ');

        }catch(Exception $e){
           return redirect() -> route('user.index') -> with ('error', 'Usuário não deletado!');
        }
    }

}
