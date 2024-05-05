
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url("home/couple_by_url/1") ?>">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url("home/index") ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>


    

    <ul class="nav navbar-nav vanbar-rigth">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo site_url ("user"); ?>">Ingresar</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url("user/log_out"); ?>">Log out</a>
            </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url ("user"); ?>"><i class="bi bi-box-arrow-in-right"></i> Ingresar</a>
        </li>
      
    </ul>
    
  </div>
</nav>