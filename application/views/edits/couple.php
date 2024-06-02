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

                                        <?php if($couple){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">pareja_id:</th>
                                                <th scope="col">usuario_id:</th>
                                                <th scope="col">conyugue 1:</th>
                                                <th scope="col">conyugue 2:</th>
                                                <th scope="col">cvu regalos:</th>
                                                <th scope="col">url:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($couple as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["pareja_id"]; ?></td>
                                                    <td><?php echo $t["usuario_id"]; ?></td>
                                                    <td><?php echo $t["conyugue_1_id"]; ?></td>
                                                    <td><?php echo $t["conyugue_2_id"]; ?></td>
                                                    <td><?php echo $t["cvu_regalos"]; ?></td>
                                                    <td><?php echo $t["url"]; ?></td>
                                                </tr>
                                                </table>
                                    </ul>

                                                <a href="<?php echo site_url("spouse/edit_view/".$t["conyugue_1_id"]); ?>" class="btn btn-warning btn-sm borrar">
                                                    editar conyugue: <?php echo $t["conyugue_1_id"]; ?>
                                                </a>
                                                </br>
                                                <a href="<?php echo site_url("spouse/edit_view/".$t["conyugue_2_id"]); ?>" class="btn btn-warning btn-sm borrar">
                                                    editar conyugue: <?php echo $t["conyugue_2_id"]; ?>
                                                </a>

                                            <?php } ?>
                                                    
                                            </tbody>
                                        
                                        
                                    </div>
                    </div>
                    <div class="card">
                        <div class="card-body">                 
                                        <?php echo form_open ("couple/edit"); ?>
                                                <!--     -->

                                            <label for="cvu_gift" >editar cvu regalos:</label>
                                            <input name="cvu_gift" id="cvu_gift" />
                                            
                                                <!--     -->
                                                <br>
                                            <label for="url" >Editar url:</label>
                                            <input name="url" id="url" />

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
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> <!-- jquery sacado de jquery.com  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

   
  </body>
</html>
