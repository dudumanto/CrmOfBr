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


    



    <script>
        $(document).ready(function() {
            var behavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };

            $('.phone').mask(behavior, options);
        });
    </script>
    




    <div class="container" style="padding-top:120px; padding-bottom:120px">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-lg-8">
                <div class="bg-black bg-opacity-75 p-5 d-flex flex-column gap-3 my-5">
                    <div class="border-3 border-bot border-blue fw-bolder text-white mb-3" style="font-size: 35px; width:fit-content">Editando dados de {{$cadastro->nome}}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('edicao.update',$cadastro->id)}}" class="d-flex flex-column gap-3 ">
                            @csrf

                            <div class="row">
                                <div class="form-group col-sm-6  col-12">
                                    <label for="nome" class="text-white font-celular">{{ __('Nome') }}</label>
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{$cadastro->nome}}" required>
                                </div>

                                <div class="form-group col-sm-6 col-12">
                                    <label for="sobrenome" class="text-white font-celular">{{ __('Sobrenome') }}</label>
                                    <input id="sobrenome" type="text" class="form-control" name="sobrenome" value="{{$cadastro->sobrenome}}" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <label for="cpf">{{ __('CPF') }}</label>
                            <input id="cpf" type="text" class="form-control" name="cpf" required>
                        </div> -->

                            <div class="form-group">
                                <label for="email" class="text-white font-celular">{{ __('E-mail') }}</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{$cadastro->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="celular" class="text-white font-celular">{{ __('Celular') }}</label>
                                <input id="celular" type="text" class="form-control phone" name="celular" value="{{$cadastro->celular}}" required>
                            </div>

                            <div class="form-group">
                                <label for="telefone" class="text-white font-celular">{{ __('Telefone') }}</label>
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{$cadastro->telefone}}" required>
                            </div>

                            <div class="form-group">
                                <label for="oficina" class="text-white font-celular">{{ __('Oficina') }}</label>
                                <input id="oficina" type="text" class="form-control" name="oficina" value="{{$cadastro->oficina}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cargo" class="text-white font-celular">{{ __('Cargo') }}</label>
                                <input id="cargo" type="text" class="form-control" name="cargo" value="{{$cadastro->cargo}}" required>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="text-white font-celular">{{ __('Estado') }}</label>
                                <input id="estado" type="text" class="form-control" name="estado" value="{{$cadastro->estado}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cidade" class="text-white font-celular">{{ __('Cidade') }}</label>
                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{$cadastro->cidade}}" required>
                            </div>
                            

                            <div class="form-group w-100 mt-5">
                            <!-- <button class="btn btn-primary w-100" type="submit" id="submitForm" onclick="submitForm()">Enviar</button> -->
                                <button onclick="submitForm()" type="submit" id="submitForm" class="btn w-100 text-white font-celular" style="   
                                        background: rgb(0,48,120);
                                        background: linear-gradient(34deg, rgba(0,48,120,1) 0%, rgba(0,48,120,1) 25%, rgba(0,71,139,1) 62%, rgba(3,128,247,1) 100%);
                                            font-weight: bold;
                                            font-size: 30px;
                                            border: 1px solid #333;">
                                    {{ __('Atualizar') }}
                                </button>
                            </div>
                         </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection