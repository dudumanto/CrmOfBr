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
    <div class="container" style="margin-top: 100px;min-height: 700px;">
        <div class="row mt-4" style=" display: flex;align-items: flex-end;" >
        <div class="col-md-3">
                <label for="filtroNome">Filtrar por Nome:</label>
                <input type="text" class="form-control" id="filtroNome">
            </div>
            <div class="col-md-3">
                <label for="filtroEstado">Filtrar por Estado:</label>
                <select class="form-control" id="filtroEstado">
                    <option value="">Todos</option>
                    <option value="Bahia">Bahia</option>
                    <option value="São Paulo">São Paulo</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="filtroCidade">Filtrar por Cidade:</label>
                <input type="text" class="form-control" id="filtroCidade">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" id="aplicarFiltro">Aplicar Filtro</button>
            </div>
        </div>

        <!-- Tabela de Cadastros -->
        <table class="table table-hover" id="pesquisa" style="margin-top: 20px; min-width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cnpj</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Oficina</th>
                    <th scope="col">Fantasia</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Ramo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cadastro as $cadastros)
                <tr>
                    <td>{{$cadastros->cnpj}}</td>
                    <td>{{$cadastros->status}}</td>
                    <td>{{$cadastros->nome}}</td>
                    <td>{{$cadastros->sobrenome}}</td>
                    <td>{{$cadastros->email}}</td>
                    <td>{{$cadastros->celular}}</td>
                    <td>{{$cadastros->telefone}}</td>
                    <td>{{$cadastros->oficina}}</td>
                    <td>{{$cadastros->fantasia}}</td>
                    <td>{{$cadastros->cargo}}</td>
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
        <div class="d-flex justify-content-center">
        {{ $cadastro->links('pagination::bootstrap-4') }}
    </div>
    </div>
    
</body>
    <!-- JavaScript para aplicar o filtro -->
    <script>
    $(document).ready(function () {
        $('#aplicarFiltro').click(function () {
            var nomeFiltrar = $('#filtroNome').val().toLowerCase();
            var estadoSelecionado = $('#filtroEstado').val();
            var cidadeFiltrar = $('#filtroCidade').val().toLowerCase();

            $('table tbody tr').each(function () {
                var nome = $(this).find('td:eq(2)').text().toLowerCase(); // Índice 0 corresponde à coluna "Nome"
                var estado = $(this).find('td:eq(11)').text(); // Índice 7 corresponde à coluna "Estado"
                var cidade = $(this).find('td:eq(12)').text().toLowerCase(); // Índice 8 corresponde à coluna "Cidade"

                if ((nome.includes(nomeFiltrar) || nomeFiltrar === '') &&
                    (estadoSelecionado === '' || estado === estadoSelecionado) &&
                    (cidade.includes(cidadeFiltrar) || cidadeFiltrar === '')) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
    </script>




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




