@extends('layout')
<div style="background-color:black; background-position:center;background-size: cover; height:90%">
    <style>
        @media (max-width: 1370px) {
            #login {
                padding-top: 130px !important;
            }


        }
    </style>
    @section('content')




    @auth
    <p>Olá, {{ Auth::user()->name }}</p>
    @endauth

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif



    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'E-mail não cadastrado, deseja realizar a inscrição?',
            showCancelButton: true,
            // text: 'Something went wrong!',
            // footer: '<a href="">Why do I have this issue?</a>'
            confirmButtonColor: '#25D366',
            confirmButtonText: 'Realizar Inscrição',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Fechar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/cadastro')
            }
        });
    </script>
    @endif


    @if(session('error2'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Problemas com seu acesso',
            html: 'Para mais informações contate o Whatsapp: <br> <a href="https://api.whatsapp.com/send/?phone=551127642880&text=Informa%C3%A7%C3%B5es+Pesquisa+Marcas+na+Oficina&type=phone_number&app_absent=0"><b>(11) 2764-2880<b/></a>',
            confirmButtonColor: '#25D366',
            confirmButtonText: 'Ok',
            // cancelButtonColor: '#3085d6',
            // cancelButtonText: 'Fechar'
        });
    </script>
    @endif

    <div id='login' class="container d-flex justify-content-center" style="padding-top: 200px; padding-bottom: 200px;">
        <div class="col-sm-12 col-lg-8 ">
            <!-- <div class="w-100 px-5"> -->
            <!-- <div class="card"> -->
            <!-- <div class="card-header">{{ __('Login') }}</div> -->

            <div class="card-body">





                <form method="POST" action="{{route('login')}}" class="d-flex flex-column gap-3 bg-black bg-opacity-75 p-5">
                    @csrf

                    <!-- <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-white text-md-center">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autofocus>

                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->



                    <div class="form-group row px-5">
                        <label for="email" class="text-white font-cel">{{ __('E-mail') }}</label>
                        <input id="email" type="email" class="form-control-lg @error('email') is-invalid @enderror " name="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group row px-5">
                        <label for="email" class="text-white font-cel">{{ __('Senha') }}</label>
                        <input id="password" type="password" class="form-control-lg @error('email') is-invalid @enderror " name="password"  required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <!-- <div class="form-group d-flex">
                            <div class="form-check offset-md-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="remember">
                                    {{ __('Lembrar-me') }}
                                </label>
                            </div>
                        </div> -->

                    <div class="form-group px-5 mt-5">
                        <div class="">
                            <button type="submit" class="btn w-100 text-white rounded-pill font-cel" style="background: linear-gradient(34deg, rgba(0,48,120,1) 0%, rgba(0,48,120,1) 25%, rgba(0,71,139,1) 62%, rgba(3,128,247,1) 100%);
                                    font-weight: bold;
                                    font-size: 20px;
                                    border: 1px solid #333;">
                                {{ __('Entrar') }}
                            </button>

                            <!-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                            @endif -->
                        </div>
                    </div>


                    <!-- <div class="form-group px-5">
                        <div class="">
                            <button type="button" class="btn w-100 rounded-pill btn-sm" style="    background: linear-gradient(34deg, rgba(0,48,120,1) 0%, rgba(0,48,120,1) 25%, rgba(0,71,139,1) 62%, rgba(3,128,247,1) 100%);
                                         color: #333!important;
                                            font-weight: bold;
                                            font-size: 20px;
                                            border: 1px solid #333;">
                                <a href="/cadastro" style="text-decoration:none" class="text-white">
                                    {{ __('Inscreva-se') }}
                                </a>
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                            @endif
                        </div>
                    </div> -->
                </form>
                <!-- </div> -->
                <!-- </div> -->

            </div>
        </div>
    </div>
</div>
@endsection