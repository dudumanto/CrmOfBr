<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
class CadastroOficinaController extends Controller
{
    public function dashboard()
    {
        $cadastro = Cadastro::paginate(5);
    
        return view('listausuarios', compact('cadastro'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cadastro");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vai guardar tudo que tem no cadastro
        $data = $request ->all();
        

        $cadastro = Cadastro::where('email', $data['email'])->first();
        if ($cadastro) {
            // O email já está cadastrado
            $session = session();
            $session->flash('alert-danger', 'Este e-mail já está cadastrado. Por favor, escolha outro e-mail.');
            return view('cadastro')->withErrors($session->get('errors'));
        }

        $cadastro = Cadastro::where('celular', $data['celular'])->first();
        if ($cadastro) {
            // O celular já está cadastrado
            $session = session();
            $session->flash('alert-danger', 'Este celular já está cadastrado. Por favor, escolha outro celular.');
            return view('cadastro')->withErrors($session->get('errors'));
        }

        $cadastro = Cadastro::create([
            'cnpj' => $data['cnpj'],
            'status'=> $data['status'],
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'telefone_res' => $data['telefone_res'],
            'oficina' => $data['oficina'],
            'fantasia'=> $data['fantasia'],
            'cargo' => $data['cargo'],
            'ramo'=> $data['ramo'],
            'estado' => $data['estado'],
            'cidade' => $data['cidade'],
        ]);

        if ($cadastro) {
            return redirect('/listausuarios')->with('success', 'Cadastro realizado com sucesso!');
            
        } else {
            return response()->json(['status' => false, $cadastro]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cadastro = Cadastro::findOrFail($id);
        return view('edicaocadastro', array(
        'cadastro'=>$cadastro
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    //vai alterar os registros na tabela e no cadastro
    {
        $data = $request ->all();
        $cadastro =Cadastro ::find($id)->update([
            'cnpj'=> $data['cnpj'],
            'status'=> $data['status'],
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'telefone_res' => $data['telefone_res'],
            'oficina' => $data['oficina'],
            'fantasia'=> $data['fantasia'],
            'cargo' => $data['cargo'],
            'ramo'=> $data['ramo'],
            'estado' => $data['estado'],
            'cidade' => $data['cidade'],
        ]);
         return redirect()->route('lista.usuarios');
    }

    public function destroy(string $id)
    {
        //
    }
    public function getDefault(){
     
        $cadastro = cadastro::select('*')->get();
    return response()->json(['data' => $cadastro]);
    }
  
}
