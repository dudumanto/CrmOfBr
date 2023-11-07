@extends('layout')
<div id="inscricao" style="background-image: url('fundo-login.jpg'); background-size: cover; background-position: center; ">
    @section('content')

    <!-- @auth
    <p>Olá, {{ Auth::user()->name }}</p>
    @endauth -->


    <!-- @auth
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
    @endif -->


    <div class="container">
        @if(session('success'))

        <script>
            let timerInterval
            Swal.fire({
                title: 'Aguarde enquanto estamos Validando o seu cadastro',
                allowEscapeKey: false,
                allowOutsideClick: false,
                // html: 'I will close in <b></b> milliseconds.',
                timer: 3000,
                // timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Inscrição realizada com sucesso!',
                    confirmButtonText: 'Fechar',
                }).then((result) => {
                    if (result.isConfirmed || result.isDismissed) {
                        window.location.replace('/')
                    }
                });
            })
        </script>
        @endif
        <!-- Restante do conteúdo da página de cadastro aqui -->
    </div>



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
                

                    <div class="card-body">
                        <form method="POST" action="{{route('user.create')}}" class="d-flex flex-column gap-3 ">
                            @csrf

                            <div class="row">
                            <div class="form-group col-sm-6  col-12">
                                    <label for="name" class="text-white font-celular">{{ __('Nome Completo') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group col-sm-6  col-12">
                                    <label for="email" class="text-white font-celular">{{ __('Email') }}</label>
                                    <input id="email" type="text" class="form-control" name="email" required>
                                </div>

                                <div class="form-group col-sm-6 col-12">
                                    <label for="password" class="text-white font-celular">{{ __('Senha') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <label for="cpf">{{ __('CPF') }}</label>
                            <input id="cpf" type="text" class="form-control" name="cpf" required>
                        </div> -->

                            
                            <div class="form-group w-100 mt-5">
                                <button type="submit" class="btn w-100 text-white font-celular" style="   
                                background: rgb(0,48,120);
                                background: linear-gradient(34deg, rgba(0,48,120,1) 0%, rgba(0,48,120,1) 25%, rgba(0,71,139,1) 62%, rgba(3,128,247,1) 100%);
                                    font-weight: bold;
                                    font-size: 30px;
                                    border: 1px solid #333;">
                                    {{ __('Cadastrar') }}
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