<?php

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

if(isset($_POST["mssg"])){
	if($_POST["message"] != "") {
		$pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
		$insertmsg = $PDO->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
		$insertmsg->execute(array($pseudo, $message));
	}
}


if(isset($_POST["submit2"])){
  if($_POST["pseudo"] != ""){

    $pseudo = $_POST['pseudo'];
    $req = $PDO->query("SELECT * FROM TP280417 WHERE pseudo = '$pseudo'");
    $rows = $req->rowCount();
      if ($rows == 1){
        $req2 = $PDO->query("SELECT nom, prenom FROM TP280417 WHERE pseudo = '$pseudo'");
        $answer = $req2->fetch();
        session_start();

        Header('location: message.php');
      }else {
        echo "tu n'est pas inscrit";
      }
    }
}




 ?>
