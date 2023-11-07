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


<body class="">
    <div class="container" style="min-height:662px; ">
    

     <div class="row">

     
        <div class="col-md-12">
            <table  class="table table-hover" id="pesquisa" style="margin-top: 150px; min-width: 100%">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Oficina</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cidade</th>
                        <th scope="">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cadastro as $cadastros)
                    <tr>
                        <td>{{$cadastros->nome}}</td>
                        <td>{{$cadastros->sobrenome}}</td>
                        <td>{{$cadastros->email}}</td>
                        <td>{{$cadastros->celular}}</td>
                        <td>{{$cadastros->telefone}}</td>
                        <td>{{$cadastros->oficina}}</td>
                        <td>{{$cadastros->cargo}}</td>
                        <td>{{$cadastros->estado}}</td>
                        <td>{{$cadastros->cidade}}</td>
                        <th>
                            <a href="{{route('edicao.cadastro', $cadastros->id)}}" class="btn btn-success">Editar</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
     
        </div>
       <div class="d-flex justify-content-center">
    <!-- Adicione o paginador aqui com a personalização -->
    {{ $cadastro->links('pagination::bootstrap-4') }}
        </div>
   </div>
 </div>
   
</body>
  <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#pesquisa tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
    </script>
</div>

@endsection




