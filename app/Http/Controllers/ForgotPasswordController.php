<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller

{


    public function showLinkRequestForm()
    {

        return view('auth.forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => "Campo e-mail é obrigatório!",
            'email.email' => "Necessário enviar e-mail válido!",
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return back()->withInput()->with('error', 'E-mail não encontrado!');
        }

        try {

            Password::sendResetLink(
                $request->only('email')
            );


            return redirect()->route('login')->with('success', 'Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!');
        } catch (Exception $e) {

            return back()->withInput()->with('error', 'Tente mais tarde!');
        }
    }


    public function showRequestForm(Request $request)
    {
        try {

            $user = User::where('email', $request->email)->first();

            if (!$user || !Password::tokenExists($user, $request->token)) {

                return redirect()->route('login')->with('error', 'Token inválido ou expirado!');
            }

            return view('auth.reset_password', ['token' => $request->token, 'email' => $request->email]);
        } catch (Exception $e) {

            return redirect()->route('login')->with('error', 'Token inválido ou expirado!');
        }
    }

    public function reset(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed|min:6',
        ], [
            'email.required' => "Campo e-mail é obrigatório!",
            'email.email' => "Necessário enviar e-mail válido!",
            'email.exists' => "E-mail inválido, utilize o e-mail cadastrado!",
            'password.required' => "Campo senha é obrigatório!",
            'password.confirmed' => 'A confirmação da senha não corresponde!',
            'password.min' => "Senha com no mínimo :min caracteres!",
        ]);

        try {

            $status = Password::reset(

                $request->only('email', 'password', 'password_confirmation', 'token'),

                function(User $user, string $password){

                    $user->forceFill([
                        'password' => $password
                    ]);

                    $user->save();
                }
            );

            return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('success', 'Senha atualizada com sucesso!') : redirect()->route('login')->with('error', 'Senha não atualizada!');

        } catch (Exception $e) {

            return back()->withInput()->with('error', 'Tente mais tarde!');
        }
    }
}
