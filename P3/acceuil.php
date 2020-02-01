<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=gbaf','root','');

if(isset($_POST['form'])){
  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $mdpconnect = htmlspecialchars($_POST['mdpconnect']);
  if(!empty($pseudoconnect) AND !empty($mdpconnect))
{
  $requser = $bdd->prepare("SELECT * FROM extranet WHERE pseudo = ? AND motdepasse = ?");
  $requser->execute(array($pseudoconnect, $mdpconnect));
  $userexist = $requser -> rowCount();
  if($userexist == 1){
    $userinfo = $requser->fetch();
    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['pseudo'] = $userinfo['pseudo'];
    header("location: main.php?id=".$_SESSION['id']);
  }
  else
  {
    $erreur = "Mauvais identenfiant";
  }
}else
{
  $erreur = "Tous les champs ne sont pas remplie !";
}

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Acceuil GBAF</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="img/logo.png" width="80" height="80" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new inscription.php">inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acceuil.php">connexion</a>
      </li>
    </ul>
  </div>
  </a>
</nav>
        <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Connexion</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Pseudo</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mot de passe:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>
                                Ce souvenir de moi</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="envoyé">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="new inscription.php" class="text-info">s'inscrire ici</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>