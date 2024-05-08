<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index1.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">ajouter une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myComment.php">Mes questions</a>
        </li>
        <?php 
        if(isset($_SESSION['auth'])){
            ?>
        <li class="nav-item">
          <a class="nav-link" href="profile.php?id=<?=$_SESSION['id'];?>">Mon profil</a>
        </li>
                    <li class="nav-item">
          <a class="nav-link" href="model/logout.php">Deconnexion</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>