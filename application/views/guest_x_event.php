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
    <link rel="stylesheet" href="/assets/styles/style.css">
  </head>

  <body>
   <div class="container">
        <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">

                                        <?php if($invitados_x_evento) { ?>
                                            
                                        <ul class="list-group" id="lista" name="lista">
                                        <li class="list-group-item">
                                            <p> total de eventos: <b> <?php echo $total; ?> </b> 
                                          
                                            </p>
                                        </li>    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">invitado_x_evento_id:</th>
                                                <th scope="col">evento_id:</th>
                                                <th scope="col">invitado_id:</th>
                                                <th scope="col">asistencia:</th>
                                                <th scope="col">comentario:</th>
                                                <th scope="col">extras:</th>
                                                <th scope="col">&nbsp;</th>                                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($invitados_x_evento as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["invitado_x_evento_id"]; ?></td>
                                                    <td><?php echo $t["evento_id"]; ?></td>
                                                    <td><?php echo $t["invitado_id"]; ?></td>
                                                    <td><?php echo $t["asistencia"]; ?></td>
                                                    <td><?php echo $t["comentario"]; ?></td>
                                                    <td><?php echo $t["extras"]; ?></td>
                                                
                                                    

                                                    <td>
                                                            <a href="<?php echo site_url("guest_x_events/load_view_guest_confirm/".$t["invitado_x_evento_id"]); ?>" class="btn btn-danger btn-sm borrar">
                                                                confirmar asistencia
                                                            </a>
                                                            o
                                                            <br>
                                                            <a href="<?php echo site_url("guest_x_events/event_disconfirm/".$t["invitado_x_evento_id"]); ?>" class="btn btn-danger btn-sm borrar">
                                                                negar asistencia
                                                            </a>
                                                    </td>
                                                    
                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        </table>
                                            <!-- fin del table -->
                                            <?php }else{?>
                                                    <div class="alert alert-success" role="alert">
                                                        NO HAY EVENTOS!
                                                    </div>
                                            <?php }?>
                                        </ul>
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
