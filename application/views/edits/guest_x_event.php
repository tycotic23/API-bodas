<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>edit couples</title>
  </head>

  <body>

   <div class="container">
        <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">

                                        <?php if($guest_x_event){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">guest_x_event_id:</th>
                                                <th scope="col">evento_id:</th>
                                                <th scope="col">invitado_id:</th>
                                                <th scope="col">asistencia:</th>
                                                <th scope="col">comentario:</th>
                                                <th scope="col">extras:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($guest_x_event as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["invitado_x_evento_id"]; ?></td>
                                                    <td><?php echo $t["evento_id"]; ?></td>
                                                    <td><?php echo $t["invitado_id"]; ?></td>
                                                    <td><?php echo $t["asistencia"]; ?></td>
                                                    <td><?php echo $t["comentario"]; ?></td>
                                                    <td><?php echo $t["extras"]; ?></td>
                                                </tr>
                                                </table>
                                    </ul>

                                                
                                                </br>
                                                

                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        
                                    </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                                        <?php echo form_open ("guest_x_events/event_confirm/".$t["invitado_x_evento_id"]); ?>
                                                <!--     -->

                                            <label for="coments" >comentario:</label>
                                            <input name="coments" id="coments" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="attached" >extras:</label>
                                            <input name="attached" id="attached" />

                                            <br>
                                            <br>
                                    <button type="submit" class="btn btn-primary">confirmar asistencia</button>

                        </div>
                    </div>
                                        <?php echo form_close() ?>

                                            <!-- fin del table -->
                                        <?php }else{?>
                                                <div class="alert alert-success" role="alert">
                                                    NO SE ENCONTRARON INVITADOS AL EVENTO!
                                                </div>
                                        <?php }?>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> <!-- jquery sacado de jquery.com  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

   
  </body>
</html>
