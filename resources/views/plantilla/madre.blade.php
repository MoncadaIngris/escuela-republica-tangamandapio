<!DOCTYPE html>
<html lang="en">
    <head>
    
        
        <meta charset="utf-8">
        <title>Escuela Republica Tangamandapio</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg" style="background-color: #ca3691;">
            <div class="container-fluid">
                <a href="/" class="navbar-brand"><strong style="color: black;"><h2>Tangamandapio</h2></strong></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <style>
                    .nav-item{
                        color: black;
                        font-size: 16px;
                    }

                    .nav-item:hover{
                        color: rgb(255, 255, 255);
                        background-color: #7a1754;
                    }
                </style>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/profesor" class="nav-item nav-link">Profesores</a>
                        <a href="/alumno" class="nav-item nav-link">Alumnos</a>
                        <a href="/grado" class="nav-item nav-link">Grados</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


        <div style="margin-left: 60px; margin-right: 60px">
            @yield('contenido')
        </div>


    </body>

    

</html>
