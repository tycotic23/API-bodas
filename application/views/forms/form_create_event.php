<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>form mail</title>
  </head>
  <body>
    <div class="container">

        <div class="row">

              <div class="col">
                <h1> form para crear eventos </h1>

              <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("event/create_event"); ?>
                                                <!--     -->

                                            <label for="location" >inserte locacion:</label>
                                            <input name="location" id="location" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="direction_street" >insertar direccion calle:</label>
                                            <input name="direction_street" id="direction_street" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="direction_number" >insertar direccion numero:</label>
                                            <input name="direction_number" id="direction_number" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="location_id" >insertar localidad:</label>
                                            <input name="location_id" id="location_id" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="name_event" >insertar nombre del evento:</label>
                                            <input name="name_event" id="name_event" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="date_event" >insertar horario:</label>
                                            <input name="date_event" id="date_event" />
                                            
                                            <br>
                                            <br>
                                    <button type="submit" class="btn btn-primary">Crear nuevo evento</button>

                                        </div>
                            </div>

                <?php echo form_close() ?>

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