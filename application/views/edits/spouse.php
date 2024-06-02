<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>edit spouse</title>
  </head>

  <body>

   <div class="container">
        <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">

                                        <?php if($spouse){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">conyugue_id:</th>
                                                <th scope="col">nombre:</th>
                                                <th scope="col">apellido:</th>
                                                <th scope="col">fecha nacimiento:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($spouse as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["conyugue_id"]; ?></td>
                                                    <td><?php echo $t["nombre"]; ?></td>
                                                    <td><?php echo $t["apellido"]; ?></td>
                                                    <td><?php echo $t["fecha_nacimiento"]; ?></td>
                                                </tr>
                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        </table>
                                    </ul>
                                    </div>
                    </div>
                    <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("spouse/edit/".$t["conyugue_id"]); ?>
                                                <!--     -->

                                            <label for="name" >editar nombre:</label>
                                            <input name="name" id="name" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="surname" >Editar apellido:</label>
                                            <input name="surname" id="surname" />

                                                <!--     -->
                                                <br>
                                            <label for="birthdate" >fecha de nacimiento:</label>
                                            <input name="birthdate" id="birthdate" />

                                            <br>
                                            <br>
                                    <button type="submit" class="btn btn-primary">Editar</button>

                        </div>
                    </div>
                                        <?php echo form_close() ?>

                                            <!-- fin del table -->
                                        <?php }else{?>
                                                <div class="alert alert-success" role="alert">
                                                    NO SE ENCONTRARON INVITADOS!
                                                </div>
                                        <?php }?>
                        
                </div>
            </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> <!-- jquery sacado de jquery.com  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

   
  </body>
</html>
