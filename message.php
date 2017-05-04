<?php
session_start();
include_once("define.php");
require_once("pdo.php");
//echo "<center>bonjour " .($_POST['pseudo'])." bienvenue dans la zone de chat</center> <br/>";

?>
 <!DOCTYPE html>
  <html>
      <head>
      <title> message </title>
      <link rel="stylesheet" href="/css/css.css">
	  <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="verification.js"></script>
      </head>
      <body>
		<div>
			  <div id="messages">

			  </div>
			  <form method="POST" action="">
				  <p> Message :</p>
				  <!--<div><textarea type="text" name="pseudo" id="pseudo" placeholder="pseudo"></textarea></div> -->
          <div class="message"><textarea type="text" name="texte" id="texte" placeholder="zone de texte" rows="10" cols="185"></textarea></div>
          <div class="message"><textarea type="text" name="message" id="message" placeholder="message" cols="50 "></textarea></div>
				  <div><input type="submit" name="mssg" value="Envoyez le message"/></div>
			  </form>

		</div>
      </body>
  </html>
