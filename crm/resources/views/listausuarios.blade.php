@extends('layout')
<div id="inscricao" style="background-image: url('fundo-login.jpg'); background-size: cover; background-position: center; ">
    @section('content')

    <!-- @auth
    <p>Olá, {{ Auth::user()->name }}</p>
    @endauth -->


    @auth
    @if(auth()->check())
    <p>Olá, {{ auth()->user()->name }}</p>
    @endif
    @endauth

    @if ($errors->any())
    <div class="alert alert-danger position-absolute">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">

    <body>
    <div class="container" style="margin-top: 100px;min-height: 700px;margin-left:2%">
        <form action="{{route('post.search')}}" method="post">
            @csrf
            <input type="text" name="search"  placeholder="Pesquisar">
            <button type="submit"> Filtrar</button>
        </form>
        <button onclick="downloadCSV()" class="btn btn-primary">Download CSV</button>

        <!-- Tabela de Cadastros -->
        <table class="table table-hover" id="pesquisa" style="margin-top: 20px; min-width: 100%">
            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">Cep</th> -->
                    <th scope="col">Cnpj</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nome</th>
                    <!-- <th scope="col">Sobrenome</th> -->
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Oficina</th>
                    <th scope="col">Fantasia</th>
                    <th scope="col">Logradouro</th>
                    <!-- <th scope="col">Cargo</th> -->
                    <th scope="col">Ramo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cadastro as $cadastros)
                <tr>
                    <!-- <td>{{$cadastros->cep}}</td> -->
                    <td>{{$cadastros->cnpj}}</td>
                    <td>{{$cadastros->status}}</td>
                    <td>{{$cadastros->nome}}</td>
                    <!-- <td>{{$cadastros->sobrenome}}</td> -->
                    <td>{{$cadastros->email}}</td>
                    <td>{{$cadastros->celular}}</td>
                    <td>{{$cadastros->telefone_res}}</td>
                    <td>{{$cadastros->oficina}}</td>
                    <td>{{$cadastros->fantasia}}</td>
                    <td>{{$cadastros->logradouro}}</td>
                    <!-- <td>{{$cadastros->cargo}}</td> -->
                    <td>{{$cadastros->ramo}}</td>
                    <td>{{$cadastros->estado}}</td>
                    <td>{{$cadastros->cidade}}</td>
                    <th>
                        <a href="{{route('edicao.cadastro', $cadastros->id)}}" class="btn btn-success">Editar</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- para ver se tem o search na url  -->
        @if(isset($filters))
            {{ $cadastro->appends(['search' => $request->search])->links('pagination::bootstrap-4') }}
        @else
            {{$cadastro->links('pagination::bootstrap-4')}}
            
        @endif

    </div>
    
</body>
<script>
        function downloadCSV() {
            window.location.href = "{{ route('export.csv') }}";
        }
    </script>
   



 
   
</div>

@endsection




