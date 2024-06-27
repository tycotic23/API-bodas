
<nav class=" navbar-expand-lg navbar-light">
  <!-- <a class="navbar-brand" href="<?php echo site_url("home/couple_by_url/1") ?>">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="button--paper__shadow ">
        <div class=" button--paper nav-item active">
          <a class="nav-link" href="<?php echo site_url("home/index") ?>">Home <span class="sr-only">(current)</span></a>
        </div>
      </li>
      
      <li class="button--paper__shadow">
        <div class=" button--paper nav-item active ">
          <a class="nav-link" href="<?php echo site_url("couple") ?>">Couple <span class="sr-only">(current)</span></a>
        </div>
      </li>
      <li class="button--paper__shadow">
          <div class="nav-item  button--paper">
            <a class="nav-link" href="<?php echo site_url("guest_x_events") ?>">ver eventos de invitado</a>
          </div>
      </li>
      <li class="button--paper__shadow">
        <div class="nav-item  button--paper">
          <a class="nav-link disabled">Disabled</a>
        </div>
      </li>
    </ul>
  
    <ul class="navbar-nav mr-auto ">
      <li class="button--paper__shadow">
        <div class="nav-item dropdown  button--paper">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            lists
          </a>
          <div class="dropdown-menu">
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("client/list_client") ?>">clients list</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("event/list_event") ?>">list events</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("couple/list_couple") ?>">list couples</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("guest/list_guest") ?>">list guests</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("localities/list_localities") ?>">list localities</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("spouse/list_spouse") ?>">list spouses</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("user/list_user") ?>">list users</a>
          </div>
        </div>
      </li>
    </ul>

    <ul class="nav navbar-nav vanbar-rigth">
      <?php if($usuario){ ?>

        <li class="button--paper__shadow">
          <div class="nav-item dropdown  button--paper">

            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i> <?php echo ucfirst ($usuario); ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url ("user/log_out"); ?> ">Salir</a>
            </div>
          </div>
        </li>

      <?php }else{ ?>
      
        <li class="button--paper__shadow">
          <div class="nav-item  button--paper">
            <a class="nav-link" href="<?php echo site_url ("user"); ?>"><i class="bi bi-box-arrow-in-right"></i> Ingresar</a>
          </div>
        </li>
      

      <?php } ?>
      
    </ul>
    
  </div>
</nav>
