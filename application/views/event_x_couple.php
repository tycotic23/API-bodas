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

                                        <?php if($event_x_couple) { ?>
                                            
                                        <ul class="list-group" id="lista" name="lista">
                                        <li class="list-group-item">
                                            <!--<p> total de eventos: <b> <?php// echo $total; ?> </b> 
                                          
                                            </p>-->
                                        </li>    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <!-- <th scope="col">evento_id:</th> -->
                                                <th scope="col">locacion:</th>
                                                <th scope="col">direccion_calle:</th>
                                                <th scope="col">direccion_numero:</th>
                                                <th scope="col">localidad_id:</th>
                                                <th scope="col">nombre:</th>
                                                <th scope="col">horario:</th>
                                                <th scope="col">estado:</th>
                                                <th scope="col">&nbsp;</th>
                                                <th scope="col">&nbsp;</th>
                                                <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($event_x_couple as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["locacion"]; ?></td>
                                                    <td><?php echo $t["direccion_calle"]; ?></td>
                                                    <td><?php echo $t["direccion_numero"]; ?></td>
                                                    <td><?php echo $t["localidad_id"]; ?></td>
                                                    <td><?php echo $t["nombre"]; ?></td>
                                                    <td><?php echo $t["horario"]; ?></td>
                                                    <td><?php echo $t["estado"]; ?></td>
                                                    
                                                    <td>
                                                        <a href="<?php echo site_url("event/event_finish/".$t["evento_id"]); ?>" class="btn btn-primary btn-sm finish">
                                                        <i class="bi bi-bookmark-check-fill"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url("event/event_active/".$t["evento_id"]); ?>" class="btn btn-danger btn-sm finish">
                                                        <i class="bi bi-bookmark-check-fill"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url("Guest_x_events/get_guest_by_event/".$t["evento_id"]); ?>" class="btn btn-primary btn-sm borrar">
                                                        <i class="bi bi-file-person-fill"></i>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url("event/edit_view/".$t["evento_id"]); ?>" class="btn btn-warning btn-sm editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo site_url("event/delete_event/".$t["evento_id"]); ?>" class="btn btn-danger btn-sm borrar">
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
                                                    NO HAY EVENTOS!
                                                </div>
                                        <?php }?>

                                        <a href="<?php echo site_url("event/view_new_event"); ?>" class="btn btn-primary btn-sm borrar">
                                                CREAR NUEVO EVENTO
                                        </a>
                                        <br>
                                        <a href="<?php echo site_url("guest_x_events/add_guest_to_event_view/".$couple_id); ?>" class="btn btn-primary btn-sm borrar">
                                                AGREGAR INVITADOS A EVENTO
                                        </a>

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
