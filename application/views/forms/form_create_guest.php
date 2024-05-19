<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Form Create Guest</title>
  </head>
  <body>
    <div class="container">

        <div class="row">

              <div class="col">
                <h1> form para crear invitados </h1>

              <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("guest/create_guest"); ?>
                                                <!--     -->

                                            <label for="name" >inserte nombre:</label>
                                            <input name="name" id="name" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="surname" >insertar apellido:</label>
                                            <input name="surname" id="surname" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="mail" >mail:</label>
                                            <input name="mail" id="mail" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="phone_number" >insertar numero de telefono:</label>
                                            <input name="phone_number" id="phone_number" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="attached" >insertar catidad de invitados adjuntos:</label>
                                            <input name="attached" id="attached" />
                                            
                                            <br>
                                            <br>

                                    <button type="submit" class="btn btn-primary">Agregar nuevo invitado </button>

                        
                                        <?php echo form_close() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>