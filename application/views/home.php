<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Bodas</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
  </head>

  <body>

  <?php $this->load->view("navbar"); ?>

    <header>
        <img class="bk-head" src="/assets/img/pareja-foto-head.jpg" alt="">
        <div class="header__content">
          <h1>Malena y Agustín</h1>
          <h2>¡NOS CASAMOS!</h2>
          <!-- contador -->
        </div>
    </header>
    <main>

    <?php if(!isset($events)){ ?>

      <div class="alert alert-success" role="alert">
          NO SE ENCONTRARON EVENTOS!
      </div>

      <?php }else{ ?>

<ul class="events-list">
<?php foreach ($events as $t){ ?>
  <li class="events-list__card">
            <a href="<?php echo site_url("guest/load_view"); ?>" class="button button--paper events-list__button">Ver</a>
            <div class="events-list__card__content">
              <h4><?php echo $t["nombre"]; ?></h4>
              <p><?php echo $t["horario"]; ?>hs</p>
              <p><?php echo $t["locacion"]; ?></p>
              <p><?php echo $t["direccion_calle"]; ?> <?php echo $t["direccion_numero"]; ?></p>
            </div>
          </li>

<?php }  ?>
</ul>
<?php }  ?> 
      <div class="postit postit--absolute">
          <h3 class="postit__title">Estás invitado!</h3>
          <p class="postit__text">Confirmá tu asistencia más abajo</p>
      </div>

      <div class="galery">
          <a href="" class="button button--paper">Ver Galería</a>
      </div>
      
      <div class="separator separator--brown"></div>
      <div class="history">
        <img width="100px" src="/assets/img/book-heart-love.svg" alt="icono">
        <h2>Nuestra historia de amor</h2>
        <div class="img-column">
          <div>
          <img src="/assets/img/pareja-foto-head.jpg" alt="">
          </div>
          <div>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate </p>
          </div>
          
        </div>
      </div>

      <div class="paper-section">
        <div class="paper-section__text">
          <img width="100px" src="/assets/img/gift-box.svg" alt="icono">
          <h2>Regalo</h2>
          <p>Tu regalo es nuestra luna de miel</p>
          <a href="" class="button paper-section__button"></a>
        </div>
        <div class="paper-section__text">
          <img width="100px" src="/assets/img/dress-code-icon.svg" alt="icono">
          <h2>Dress Code</h2>
          <p>Vestimenta formal, elegante</p>
        </div>
      </div>

      <div class="section-contacts">
        <div class="column-text">
          <img width="70px" src="/assets/img/instagram-ocre.svg" alt="instagram">
          <p><span>Nuestro instagram compartido @maleyagusinlove</span></p>
          <p>Etiquetanos en las fotos que subas para no perdernos momentos importantes</p>
        </div>

        <div class="column-text">
            <a href="" class="postit postit-center">
                <img width="70px" src="/assets/img/spotify.svg" alt="spotify">
                <p>¡Sugerinos canciones para la fiesta!</p>
            </a>
        </div>
      </div>
      

      <div class="column-text white-section">
      <img width="100px" src="/assets/img/bird-love-heart.svg" alt="icono">
        <p>¡Gracias por acompañarnos en este momento tan importante!
            Te esperamos en nuestra boda.
        </p>
        <h4>Male y agus</h4>
      </div>
    </main>
    <!-- <footer>

    </footer> -->
  
    <!-- <div class="container">
    <h1> esta es la invitacion que recibe el invitado (puedo entrar sin loguearme) </h1>
    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">
      <div class="card">
        <div class="card-body">

              <h1> PAREJAS</h1>
          <?php if(isset($couple)){?>

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
                    <?php foreach($couple as $t){ ?>

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
                <h1> EVENTOS</h1>

                    <?php if(!isset($events)){ ?>

                      <div class="alert alert-success" role="alert">
                          NO SE ENCONTRARON EVENTOS!
                      </div>

                    <?php }else{ ?>
                      
                      <ul class="list-group" id="lista" name="lista">
                        <li class="list-group-item">
                          <p> total de eventos: <b> <?php echo $total; ?> </b>
                          </p>
                        </li>

                  <table class="table">
                                            
                        <thead>
                          <tr>
                            <th scope="col">evento_id:</th>
                            <th scope="col">pareja_id:</th>
                            <th scope="col">locacion:</th>
                            <th scope="col">direccion_calle:</th>
                            <th scope="col">direccion_numero:</th>
                            <th scope="col">localidad_id:</th>
                            <th scope="col">nombre:</th>
                            <th scope="col">horario:</th>
                            <th scope="col">estado:</th>
                            <th scope="col">&nbsp;</th>
                          </tr>
                        </thead>
                    <tbody>
                      <?php foreach ($events as $t){ ?>

                        <tr>
                          <td><?php echo $t["evento_id"]; ?></td>
                          <td><?php echo $t["pareja_id"]; ?></td>
                          <td><?php echo $t["locacion"]; ?></td>
                          <td><?php echo $t["direccion_calle"]; ?></td>
                          <td><?php echo $t["direccion_numero"]; ?></td>
                          <td><?php echo $t["localidad_id"]; ?></td>
                          <td><?php echo $t["nombre"]; ?></td>
                          <td><?php echo $t["horario"]; ?></td>
                          <td><?php echo $t["estado"]; ?></td>
                          <td>
                            <a href="<?php echo site_url("guest/load_view"); ?>" class="btn btn-danger btn-sm">
                                confirmar asistencia!
                            </a>
                          </td>
                        </tr>

                      <?php }  ?>

                    </tbody>
                    
                  </table>
                <?php } ?>
                </div>
            </div>
        </div>
      </div>
    </div>
 -->

  

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
