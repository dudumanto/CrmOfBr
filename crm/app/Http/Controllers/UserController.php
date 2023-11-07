<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/cadastro');
        } else {
            // Redirecione o usuário para a página de login novamente
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function telauser()
    {
        return view('listausuarios');
    }
  
 

   

}
