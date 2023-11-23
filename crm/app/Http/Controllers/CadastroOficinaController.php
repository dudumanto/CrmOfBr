<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
class CadastroOficinaController extends Controller
{
    public function dashboard()
    {
        $cadastro = Cadastro::paginate(20);
    
        return view('listausuarios', compact('cadastro'));
    }

    public function search(Request $request){
        // para fazer o filtro no back end, pois não dava pra fazer pelo front 
        $filters = $request->all();
        $cadastro = Cadastro::where('nome', 'like', "%{$request->search}%")
                            ->orWhere('cnpj', 'like', "%{$request->search}%")
                            ->orWhere('estado', 'like', "%{$request->search}%")
                            ->paginate(20);
    
        // Passa a variável $request para a view
        return view('listausuarios', compact('cadastro','filters'))->with('request', $request);                  
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
            'cep' => $data['cep'],
            'cnpj' => $data['cnpj'],
            'status'=> $data['status'],
            'logradouro'=> $data['logradouro'],
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
            // Registrar a criação do cadastro no log
            $log = new Logs();
            $log->user_id = auth()->user()->id;
            $log->cadastro_id = $cadastro->id;

            $log->save();

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
        $cadastro = Cadastro::find($id) ?? false;

        if ($cadastro) {
            // Validar os dados do formulário
            $this->validate($request, [
                'cep' => 'required',
                'cnpj' => 'required',
                'status'=> 'required',
                'logradouro'=> 'required',
                'nome' => 'required',
                'sobrenome' => 'required',
                'email' => 'required|email',
                'celular' => 'required',
                'telefone_res' => 'required',
                'oficina' => 'required',
                'fantasia'=> 'required',
                'cargo' => 'required',
                'ramo'=> 'required',
                'estado' => 'required',
                'cidade' => 'required',
            ]);

            // Alterar os dados do cadastro
            $cadastro->cep = $data['cep'];
            $cadastro->cnpj = $data['cnpj'];
            $cadastro->status = $data['status'];
            $cadastro->logradouro = $data['logradouro'];
            $cadastro->nome = $data['nome'];
            $cadastro->sobrenome = $data['sobrenome'];
            $cadastro->email = $data['email'];
            $cadastro->celular = $data['celular'];
            $cadastro->telefone_res = $data['telefone_res'];
            $cadastro->oficina = $data['oficina'];
            $cadastro->fantasia = $data['fantasia'];
            $cadastro->cargo = $data['cargo'];
            $cadastro->ramo = $data['ramo'];
            $cadastro->estado = $data['estado'];
            $cadastro->cidade = $data['cidade'];

            // Registrar a alteração no log
            $log = new Logs();
            $log->user_id = auth()->user()->id;
            $log->cadastro_id = $cadastro->id;
            $log->save();

            // Salvar as alterações
            $cadastro->save();

            // Retornar uma mensagem de sucesso
            return redirect()->route('lista.usuarios');
        } else {
            return redirect()->route('lista.usuarios')->with('error', 'O cadastro não existe.');
        }
    }

    public function destroy(string $id)
    {
        //
    }
    public function getDefault(){
     
        $cadastro = cadastro::select('*')->get();
    return response()->json(['data' => $cadastro]);
    }
    public function exportCSV()
    {
        $cadastros = Cadastro::all();

        $csvFileName = 'cadastros.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
            "Content-Encoding" => "UTF-8",
            "Delimiter" => ";",
        );

        $response = new StreamedResponse(function () use ($cadastros) {
            $handle = fopen('php://output', 'w');

            // Adiciona cabeçalhos CSV
            fputcsv($handle, array('ID', 'Nome', 'Email','CNPJ'),';');

            // Adiciona dados ao CSV
            foreach ($cadastros as $cadastro) {
                fputcsv($handle, array($cadastro->id, $cadastro->nome, $cadastro->email,$cadastro->cnpj),';');
            }

            fclose($handle);
        });

                $response->headers->add($headers);

                return $response;
    }
}
