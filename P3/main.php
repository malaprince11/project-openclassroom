<?php
session_start();
$bdd = new PDO ('mysql :host=127.0.0.1;dbname=gbaf','root','');
if(isset($_GET['id'])AND $_GET['id'] > 0)
{
	$getid = interval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM extranet WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>GBAF</title>
	<meta charset="utf-8">
</head>
<body>
<div align="center">
	<h2>Bienvenue <?php echo $userinfo['pseudo']; ?></h2>
	<br />
	<?php
	if(isset($_SESSION['id'])AND $userinfo['id'] == $_SESSION['id']){
		
		<a href="editionprofile.php">Editer votre profile</a>
		<a href="deconnexion.php">Se deconnecter</a>
		}
		?>
</div>
</body>
</html>
