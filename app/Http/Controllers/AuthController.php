<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function LoginProcess(AuthLoginRequest $request){
        try{

        $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ]);

        if(!$authenticated){
            return back() -> withInput() -> with ('error', 'E-mail ou senha inválido!');
        }

        return redirect() -> route('user.index');

        }catch(Exception $e){
            return back() -> withInput() -> with ('error', 'E-mail ou senha inválido!');
        }
    }

    public function logout(){

        Auth::logout();
        return redirect() -> route ('login') -> with ('success', 'Usuário deslogado!');
    }

}
