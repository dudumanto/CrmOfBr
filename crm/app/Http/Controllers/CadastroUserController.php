<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CadastroUserController extends Controller
{
    public function index(){
        return view('cadastrousuario');
       } 
    public function create(Request $request){


        if(!empty($request ->all())){
            $user = new User;

            $user->name = $request -> name;
            $user->email =$request -> email;
            $user -> password = bcrypt($request -> password);
    
            $user ->save();

            dd('Cadastrado com sucesso');
        }
      }
}
