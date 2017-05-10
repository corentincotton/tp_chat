<?php
require_once "define.php";

try {
  //$PDO = new PDO('mysql:host=localhost;dbname=formulaire_inscription;charset=utf8', 'root', ''); //windows, wampserveur

  $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB, MYSQL_USER, MYSQL_PASSWD);
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
  $e->getMessage();
}

if(isset($_POST["submit1"])){
  if($_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["pseudo"] != ""){
    $req = $PDO->prepare("INSERT INTO TP280417 (nom, prenom, pseudo) VALUES(:nom, :prenom, :pseudo)");
    $req->bindValue(':nom', $_POST["nom"]);
    $req->bindValue(':prenom', $_POST["prenom"]);
    $req->bindValue(':pseudo', $_POST["pseudo"]);
      if ($req->execute()){
        echo "votre formulaire a été rempli, tu peux entrer avec le pseudo";
      }else {
        echo "rempli le formulaire";
      }
    }else{
    echo "tu dois remplir tous les champs";
  }
}
else {
  // echo "tu dois surement etre deja inscrit !";
}

if(isset($_POST["formulaire1"]) && $_POST["formulaire1"] == "formulaire1"){
	$req = $PDO->prepare('INSERT INTO chat (message, pseudo) VALUES (:message, :pseudo)');
	$req->bindValue(":message", $_POST["message"]);
	$req->bindValue(":pseudo", $_POST["pseudo"]);

	if($req->execute()){
		echo "nouveau message envoyé";
	}else{
		echo "échec de l'envoie !";
	}
}



if(isset($_POST["submit2"])){
  if($_POST["pseudo"] != ""){

    $pseudo = $_POST['pseudo'];
    $req = $PDO->prepare("SELECT * FROM TP280417 WHERE :pseudo = pseudo");
    $req->bindValue(":pseudo", $_POST["pseudo"]);
    $rows = $req->rowCount();
      if ($rows == 1){
        $_SESSION['pseudo'] = $pseudo;
        header('location: message.php');
      }else {
        echo "tu n'est pas inscrit";
      }
    }
}

if(isset($_POST["form"]) && $_POST["form"] == "formulaire1"){
	$req = $PDO->prepare('INSERT INTO chat (pseudo, message) VALUES (:pseudo, :message)');
	$req->bindValue(":pseudo", $_POST["pseudo"]);
	$req->bindValue(":message", $_POST["message"]);
	if($req->execute()){
		echo "Nouveau message";
	}else{
		echo "Une erreur s'est produite !";
	}
}

if(isset($_POST["form"]) && $_POST["formulaire1"] == "getAll"){
	$req = $PDO->prepare('SELECT * FROM chat');
	$req->execute();
	$res = $req->fetchAll();

	foreach($res as $data){
		echo $data->pseudo . " : " . $data->message;
	}
}








 ?>
