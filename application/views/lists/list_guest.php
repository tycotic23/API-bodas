<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>list guest</title>
  </head>

  <body>

   <div class="container">
        <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">

                                        <?php if($guests){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">
                                        <li class="list-group-item">
                                            <p> total de invitados: <b> <?php echo $total; ?> </b>
                                          
                                            </p>
                                        </li>    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">invitado_id:</th>
                                                <th scope="col">nombre:</th>
                                                <th scope="col">apellido:</th>
                                                <th scope="col">mail:</th>
                                                <th scope="col">telefono:</th>
                                                <th scope="col">pareja_id:</th>
                                                <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($guests as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["invitado_id"]; ?></td>
                                                    <td><?php echo $t["nombre"]; ?></td>
                                                    <td><?php echo $t["apellido"]; ?></td>
                                                    <td><?php echo $t["mail"]; ?></td>
                                                    <td><?php echo $t["telefono"]; ?></td>
                                                    <td><?php echo $t["pareja_id"]; ?></td>

                                                    <td>
                                                        <a href="<?php echo site_url("guest/edit_view/".$t["invitado_id"]); ?>" class="btn btn-warning btn-sm editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url("guest/delete_guest/".$t["invitado_id"]); ?>" class="btn btn-danger btn-sm borrar">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        </table>
                                            <!-- fin del table -->
                                        <?php }else{?>
                                                <div class="alert alert-success" role="alert">
                                                    NO SE ENCONTRARON INVITADOS!
                                                </div>
                                        <?php }?>

                                        <a href="<?php echo site_url("guest/view_create_guest"); ?>" class="btn btn-primary btn-sm">
                                            Agregar nuevo invitado
                                        </a>
                        </div>
                    </div>
                                    
                </div>
            </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> <!-- jquery sacado de jquery.com  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

   
  </body>
</html>