<!DOCTYPE html >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
<script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
 
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
 
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="{{ asset('js/script.js') }}"></script>

<style>
    body {
        font-family: 'Montserrat';
    }

    html {
        min-height: 100vh;
    }

    @media (max-width: 1370px) {
        .banner-font {
            font-size: 70px !important;
            line-height: 70px !important;
        }

        .webinar-font {
            font-size: 13px !important;
            bottom: 20px !important;
        }

        .data-font {
            font-size: 30px !important;
        }

        .pading-home {
            padding-top: 150px !important;
        }
    }



    @media (max-width:990px) {

        .navbar>.container-fluid {
            --bs-bg-opacity: 0.75;
            background-color: rgba(var(--bs-black-rgb), var(--bs-bg-opacity)) !important;
        }

        .nav-link {
            font-size: 30px !important;
        }

        .btn-acess-menu {
            font-size: 40px !important;
            margin-left: 40px !important;
        }

        #inscricao {
            min-height: 100vh;
        }

        .logo-header {
            height: 60px !important;
        }


    }

    .bg-blue {
        /* background-color: #003078 !important; */
        background: linear-gradient(34deg, rgba(0, 48, 120, 1) 0%, rgba(0, 48, 120, 1) 25%, rgba(0, 71, 139, 1) 62%, rgb(6 92 173) 100%);
    }

    .border-blue {
        border-color: #003078 !important;
    }

    .border-bot {
        border-bottom: solid;
    }

    .border-t {
        border-top: solid;
    }

    .bg-preto {
        background: rgb(0, 0, 0);
        background: linear-gradient(25deg, rgba(0, 0, 0, 1) 0%, rgba(36, 36, 36, 1) 100%);
    }

    .brilando {
        box-shadow: inset 10px 10px 62px 15px rgba(76, 183, 255, 1);
    }
</style>

<html>

<body>
    <script>
        $(document).ready(function() {

            $('.contato').on("click", function() {
                console.log('a')
                var minhaDiv = $("#footer-box");
                minhaDiv.addClass("brilando");
                setTimeout(function() {
                    minhaDiv.removeClass("brilando");
                }, 1300);
            });
        });
    </script>
    <nav class="navbar navbar-expand-lg p-0 navbar-dark bg-transparent position-absolute w-100  " style="z-index: 10;">
        <div class="container-fluid w-100 d-flex justify-content-between" style="background-color:black;">

            <a href="/" style="text-decoration:none" class="text-white d-flex">
                <img src="/SELO_OB.png" style="height: 120px;" class="logo-header"></img>
                <img src="/Marcas_Oficinas_Logo_2023.png" style="height: 110px;" class=" logo-header p-1"></img>
            </a>

            <button class="navbar-toggler border-white border-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div style="display: flex;">
            <input type="text" id="searchInput" class="form-control" style="width: 30%;">
            <button type="button" id="searchButton" class="btn btn-primary" style=" margin-left:4px"><i class="fas fa-magnifying-glass"></i> Pesquisar</button>

            </div> -->

            <div class="collapse navbar-collapse p-3 w-100" id="navbarNav" style="justify-content: flex-end;">
            
               
                @auth
             
                
                <div class=" nav-link text-white d-flex align-items-center ps-5" style="white-space: nowrap; text-shadow: 0px 2px 3px #000000;">Olá, {{ Auth::user()->name }} |&nbsp;</div>
                <form id="logout-form" action="{{route('auth.logout')}}" class="mb-0" method="post">
                    @csrf
                    <button type="submit" class="btn btn-acess-menu btn-dark px-3" style="white-space: nowrap;"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                </form>
                <!-- Outras ações disponíveis para usuários logados -->
                @else
                <a href="/login" style="text-decoration:none" class="text-white"><button class="btn btn-acess-menu btn-dark d-flex align-items-center"> <i class="fa-regular fa-user"> </i> ACESSAR </button></a>
                <!-- Outras ações disponíveis para usuários não logados -->
                @endauth


            </div>
        </div>
    </nav>



    <div class="w-100 d-none">
        <div class="w-100 d-flex justify-content-between px-5 py-3 position-absolute">


            <div class="d-flex align-items-center">

                @auth
                <div class="text-white d-flex align-items-center">Olá, {{ Auth::user()->nome }} | &nbsp;</div>
                <form id="logout-form" action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark px-3"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                </form>






                <!-- Outras ações disponíveis para usuários logados -->
                @else
                <button type="button" class="btn btn-dark px-3" style="font-size: 20px;"><a href="/login" style="text-decoration:none" class="text-white"> <i class="fa-regular fa-user"> </i> ACESSAR </a></button>
                <!-- Outras ações disponíveis para usuários não logados -->
                @endauth

            </div>


            <!-- 

        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-dark px-3" style="font-size: 20px;"> <i class="fa-regular fa-user"> </i> ACESSAR</button>
        </div> -->
        </div>
    </div>

    <!-- Conteúdo da página será inserido aqui -->
    @yield('content')

    <footer id=footer>
        <!-- Rodapé do seu aplicativo -->
        <div id="footer-box" class="bg-black border-5 border-t border-blue">


            <div class="py-3 mt-5">

                <div class="d-flex justify-content-center gap-5" style="font-size:50px; height:80px">
                    <a href="https://www.facebook.com/JornalOficinaBrasilOficial" target="_blank"><i class="fa-brands fa-facebook fa-xs" style="color: #ffffff;"></i></a>
                    <a href="https://www.youtube.com/@TVOficinaBrasil" target="_blank"><i class="fa-brands fa-youtube fa-xs" style="color: #ffffff;"></i></a>
                    <a href="https://www.linkedin.com/company/grupo-oficina-brasil/mycompany/" target="_blank"><i class="fa-brands fa-linkedin fa-xs" style="color: #ffffff;"></i></a>
                    <a href="https://twitter.com/Oficina_Brasil" target="_blank"><i class="fa-brands fa-twitter fa-xs" style="color: #ffffff;"></i></a>
                    <a href="https://www.tiktok.com/@jornalob" target="_blank"><i class="fa-brands fa-tiktok fa-xs" style="color: #ffffff;"></i></a>
                </div>


                <div class="text-white text-center">Endereço: Alameda Santos 1800 - Jardim Paulista, São Paulo - SP. 01418-102</div>
                <div class="text-white text-center">E-mail: Comercial@oficinabrasil.com.br</div>
                <div class="text-white text-center">Telefone: (11) 2764.2852</div>
            </div>
        </div>
    </footer>



</body>
<!-- <script>
        $(document).ready(function(){
  // Evento de mudança no campo de pesquisa
  $("#search").on("change", function(){
    // Obter o valor da pesquisa
    var pesquisa = $("#search").val();

    // Filtrar os dados da tabela
    $("tbody tr").filter(function(){
      // Verificar se o valor da pesquisa está presente em qualquer coluna
      return $(this).find("td:not(:empty)").text().toLowerCase().indexOf(pesquisa.toLowerCase()) > -1;
    }).show();

    // Ocultar as outras linhas
    $("tbody tr").not(":visible").hide();
  });
});
</script> -->


</html>