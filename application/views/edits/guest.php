<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>list couples</title>
  </head>

  <body>

   <div class="container">
        <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">

                                        <?php if($guest){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">invitado_id:</th>
                                                <th scope="col">nombre:</th>
                                                <th scope="col">apellido:</th>
                                                <th scope="col">mail:</th>
                                                <th scope="col">telefono:</th>
                                                <th scope="col">extras:</th>
                                                <th scope="col">pareja_id:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($guest as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["invitado_id"]; ?></td>
                                                    <td><?php echo $t["nombre"]; ?></td>
                                                    <td><?php echo $t["apellido"]; ?></td>
                                                    <td><?php echo $t["mail"]; ?></td>
                                                    <td><?php echo $t["telefono"]; ?></td>
                                                    <td><?php echo $t["extras"]; ?></td>
                                                    <td><?php echo $t["pareja_id"]; ?></td>
                                                    <td> &nbsp;</td>

                                                    

                                                    <td>
                                                        <a href="<?php echo site_url("guest/delete_guest/".$t["invitado_id"]); ?>" class="btn btn-danger btn-sm borrar">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        </table>
                                    </ul>
                                    </div>
                    </div>
                    <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("guest/edit/".$t["invitado_id"]); ?>
                                                <!--     -->

                                            <label for="name" >Editar nombre:</label>
                                            <input name="name" id="name" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="surname" >Editar apellido:</label>
                                            <input name="surname" id="surname" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="phone_number" >editar numero de telefono:</label>
                                            <input name="phone_number" id="phone_number" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="attached" >editar invitados extras:</label>
                                            <input name="attached" id="attached" />
                                            
                                                <!--     -->
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