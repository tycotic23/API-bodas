<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>LOGIN</h1>
                <br>
                <?php 
                if($this->session->flashdata("OP")){
                    switch ($this->session->flashdata("OP")) {
                        case "INEXISTENTE":
                            ?>
                            <div class="alert alert-warning" role="alert">
                                credenciales incorrectas!
                            </div>
                            <?php
                            break;
                        case "INACTIVO":
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Usuario inactivo!
                            </div>
                            <?php
                            break;
                        case "PROHIBIDO":
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    logueate primero!
                                </div>
                                <?php
                                break;
                }
            }
                ?>
                <br>
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?php echo site_url("user/index"); ?>">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario">
                            
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form> 
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

        })
    </script>
  </body>
</html>
