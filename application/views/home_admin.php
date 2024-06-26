<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Bodas</title>
  </head>

  <body>

  <?php $this->load->view("navbar"); ?>
  
    <div class="container">
    <h1> esta es la invitacion que recibe el invitado (puedo entrar sin loguearme) </h1>
    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">
      <div class="card">
        <div class="card-body">

              <h1> PAREJAS</h1>
          <?php if(isset($couples)){?>

                    <ul class="list-group" id="lista" name="lista">
                        <li class="list-group-item">
                          <p> total de parejas: <b> <?php echo $total_couples; ?> </b>
                          </p>
                        </li>
                    </ul>

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
                  </tr>
                      <?php } ?>
                    </tbody>
              </table>
                    <!-- fin del table -->
                    <?php }else{?>
                    <div class="alert alert-success" role="alert">
                    NO SE ENCONTRARON PAREJAS!
                    </div>
                    <?php }?>
        </div>
      </div>
      <br>
      <br>
      <br>
      </div>
    </div>
    
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">  
              
                <br>
                <h1> USERS </h1>

                    <?php if(!isset($users)){ ?>

                      <div class="alert alert-success" role="alert">
                          NO SE ENCONTRARON USUARIOS!
                      </div>

                    <?php }else{ ?>
                      
                      <ul class="list-group" id="lista" name="lista">
                        <li class="list-group-item">
                          <p> total de eventos: <b> <?php echo $total_users; ?> </b>
                          </p>
                        </li>
                    </ul>
                                <!-- comienzo del table -->

                  <table class="table">
                                            
                        <thead>
                          <tr>
                            <th scope="col">usuario_id:</th>
                            <th scope="col">pareja_id:</th>
                            <th scope="col">usuario:</th>
                            <th scope="col">password:</th>
                            <th scope="col">mail:</th>
                            <th scope="col">rol_id:</th>
                            <th scope="col">estado:</th>
                          </tr>
                        </thead>
                    <tbody>
                      <?php foreach ($users as $t){ ?>

                        <tr>
                          <td><?php echo $t["usuario_id"]; ?></td>
                          <td><?php echo $t["pareja_id"]; ?></td>
                          <td><?php echo $t["usuario"]; ?></td>
                          <td><?php echo $t["password"]; ?></td>
                          <td><?php echo $t["mail"]; ?></td>
                          <td><?php echo $t["rol_id"]; ?></td>
                          <td><?php echo $t["estado"]; ?></td>
                          
                          <td>
                            <a href="<?php echo site_url(""); ?>" class="btn btn-danger btn-sm">
                                quiza sirva
                            </a>
                          </td>
                        </tr>

                      <?php }  ?>

                    </tbody>
                    
                  </table>
                    <!-- fin del table -->
                <?php } ?>
                </div>
            </div>
        </div>
      </div>
    </div>


  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
