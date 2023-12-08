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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .nav-link{
        color: white;
        }
    </style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-black" style="margin-top: 90px;">
    <a class="navbar-brand" href="#">Seu Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: center;">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownNoticias" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    CADASTROS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownNoticias">
                <a class="dropdown-item" href="#">USUÁRIOS</a>
                    <a class="dropdown-item" href="#">ROTA</a>
                    <a class="dropdown-item" href="#">EVENTOS CRM</a>
                    <a class="dropdown-item" href="#">TEXACO</a>
                    <a class="dropdown-item" href="#">FÓRUM</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEsportes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    PESQUISAS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownEsportes">
                    <a class="dropdown-item" href="#">PROJETOS</a>
                    <a class="dropdown-item" href="#">CINAU</a>
                    <a class="dropdown-item" href="#"></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEntretenimento" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Entretenimento
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownEntretenimento">
                    <a class="dropdown-item" href="#">Entretenimento 1</a>
                    <a class="dropdown-item" href="#">Entretenimento 2</a>
                    <a class="dropdown-item" href="#">Entretenimento 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTecnologia" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tecnologia
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownTecnologia">
                    <a class="dropdown-item" href="#">Tecnologia 1</a>
                    <a class="dropdown-item" href="#">Tecnologia 2</a>
                    <a class="dropdown-item" href="#">Tecnologia 3</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 100px;min-height: 700px;margin-left:4%">
               

   <!-- <div>
         <button class="btn btn-primary" style="background-color:#003078; color:white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            Menu
        </button>

            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <i class="fa-solid fa-users"></i>  <a href="{{route('lista.usuarios')}}" style="color: black;">Lista e Edição de Usuários</a>
                </div>                   
            </div>
                            
    </div> -->
    <div style="display: flex;justify-content: flex-end;margin-top: -38px;">
        <form action="{{route('post.search')}}" method="post">
            @csrf
            <div class="form-group" style="display: flex;">
            <input type="text" name="nome" class="form-control" style="width: 250px;" placeholder="Nome">
            <input type="text" name="estado" class="form-control" style="width: 250px;margin-left: 30px;" placeholder="Estado">
            <input type="text" name="cidade" class="form-control" style="width: 250px;margin-left: 30px;" placeholder="Cidade">
            <button type="submit" class="btn btn-primary" style="width: 150px;height: 36px;margin-left: 30px; background-color:#003078; color:white;"> Filtrar</button>
            </div>
           
          
        </form>
        @if(!empty($cadastro) && !empty($filters))

            <a href="{{ route('export.csv', $filters) }}"style="width: 150px;height: 36px;margin-left: 30px; background-color:#003078; color:white;" class="btn btn-primary">Download CSV</a>
        @endif        
    </div>
   

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
                    <!-- <th scope="col">Fantasia</th> -->
                    <th scope="col">Logradouro</th>
                    <!-- <th scope="col">Cargo</th> -->
                    <th scope="col">Ramo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Atualizado em </th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eventos</th>

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
                    <!-- <td>{{$cadastros->fantasia}}</td> -->
                    <td>{{$cadastros->logradouro}}</td>
                    <!-- <td>{{$cadastros->cargo}}</td> -->
                    <td>{{$cadastros->ramo}}</td>
                    <td>{{$cadastros->estado}}</td>
                    <td>{{$cadastros->cidade}}</td>
                    <td>{{$cadastros->updated_at}}</td>
                    <th>
                        <a href="{{route('edicao.cadastro', $cadastros->id)}}" class="btn btn-success">Editar</a>
                    </th>
                    <th>
                        <a href="{{route('edicao.cadastro', $cadastros->id)}}" class="btn btn-success">Eventos</a>
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
</div>

@endsection




