<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Page Inscription</h1>
    <?php
    try {
      $bdd = new PDO("mysql:host=localhost;dbname=espaceMembre", "root", "root");
    }
    catch(Exeption $e) {
      die("Erreur : " .$e->getMessage());
    }
     ?>

     <form method="post" action="">
      <label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo..." maxlength="20" /><br />
      <label for="pass">mot de passe : </label><input type="password" name="pass" id="pass" placeholder="Entrez le mot de passe..." maxlength="50" /><br />
      <label for="mail">Email : </label><input type="Email" name="email" id="email" placeholder="Entrez votre email..." />
      <input type="submit" value="Envoyer" />
    </form>

    <?php
      //hashage du mot de passe
      $pass_hache = password_hash($_POST["pass"], PASSWORD_DEFAULT);

      //insertion
      $req = $bdd->prepare("INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :mail, CURDATE())");
      $req->execute(array("pseudo" => $pseudo, "pass" => $pass_hache, "email" => $email));
     ?>
  </body>
</html>
