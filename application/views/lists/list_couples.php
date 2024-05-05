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

                                        <?php if($couples){?>
                                            
                                        <ul class="list-group" id="lista" name="lista">
                                        <li class="list-group-item">
                                            <p> total de parejas: <b> <?php echo $total; ?> </b>
                                          
                                            </p>
                                        </li>    
                                            <!-- comienzo del table -->

                                        <table class="table">
                                        
                                            <thead>
                                                <tr>
                                                <th scope="col">pareja_id:</th>
                                                <th scope="col">usuario_id:</th>
                                                <th scope="col">conyugue_1_id:</th>
                                                <th scope="col">conyugue_2_id:</th>
                                                <th scope="col">cvu_regalos:</th>
                                                <th scope="col">url:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($couples as $t){ ?>

                                                <tr>
                                                    <td><?php echo $t["pareja_id"]; ?></td>
                                                    <td><?php echo $t["usuario_id"]; ?></td>
                                                    <td><?php echo $t["conyugue_1_id"]; ?></td>
                                                    <td><?php echo $t["conyugue_2_id"]; ?></td>
                                                    <td><?php echo $t["cvu_regalos"]; ?></td>
                                                    <td><?php echo $t["url"]; ?></td>
                                                    <td> &nbsp;</td>
                                                    <td>
                                                        <a href="<?php echo site_url("couple/delete_couple/".$t["pareja_id"]); ?>" class="btn btn-danger btn-sm borrar">
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
                                                    NO SE ENCONTRARON USUARIOS!
                                                </div>
                                        <?php }?>
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