<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>create user</title>
  </head>
  <body>
    <div class="container">

        <div class="row">

              <div class="col">
                <h1> form para crear usuarios </h1>

              <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("user/create_user"); ?>
                                                <!--     -->

                                            <label for="user" >usuario:</label>
                                            <input name="user" id="user" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="passswor" >contraseña:</label>
                                            <input name="password" id="paswword" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="mail" >mail:</label>
                                            <input name="mail" id="mail" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="url" >url:</label>
                                            <input name="url" id="url" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="name_spouse_1" >nombre conyugue 1:</label>
                                            <input name="name_spouse_1" id="name_spouse_1" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="surname_spouse_1" >apellido conyugue 1:</label>
                                            <input name="surname_spouse_1" id="surname_spouse_1" />

                                            <!--     -->
                                            <br>
                                            <label for="birthday_spouse_1" >fecha de cumpleaños conyugue 1:</label>
                                            <input name="birthday_spouse_1" id="birthday_spouse_1" />

                                            <!--     -->
                                            <br>

                                            <label for="name_spouse_2" >nombre conyugue 2:</label>
                                            <input name="name_spouse_2" id="name_spouse_2" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="surname_spouse_2" >apellido conyugue 2:</label>
                                            <input name="surname_spouse_2" id="surname_spouse_2" />

                                            <!--     -->
                                            <br>

                                            <label for="birthday_spouse_2" >fecha de cumpleaños conyugue 2:</label>
                                            <input name="birthday_spouse_2" id="birthday_spouse_2" />

                                            
                                            
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