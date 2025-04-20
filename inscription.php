<?php
$connexion = new PDO("mysql: host=127.0.0.1; dbname=users_base", "root", "");
if($connexion)
{
    echo "connecter";
}

    if(isset($_POST["valider"]))
{
    if (!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["email"]) AND !empty($_POST["password"])){
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = sha1($_POST["password"]);

        if (strlen($_POST["password"])<7) {
            $message = "votre mot de passe est trop court.";

        }elseif(strlen($nom)>50 || strlen($prenom)>50){
            $message = "Votre nom ou prenom est trop long";
        }else{

            $testmail = $connexion->prepare("SELECT * FROM users WHERE email = ?");
            $testmail->execute(array($email));

            $controlmail =  $testmail->rowCount();
            if ($controlmail==0) {
            $insertion = $connexion->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(?,?,?,?)");
            $insertion->execute(array($nom,$prenom,$email,$mdp));
            $message = "Votre compte a bien éte crée";
            }else {
                $message = "désolé mais cette adresse a deja un compte.";
            }
        }
    }

}
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
</head>
<body>
<h1><span>INSCRIPTION</span></h1>
      <form action="login.html"> 
        <div>
      <span>nom</span>
    <input type="text" placeholder="Entrer votre nom">
      </div>
      <div>
      <span> prenom</span>
    <input type="text" placeholder="Entrer votre prenom">
      </div>
      <div >
        <span>email</span>
        <input type="text" placeholder="Entrer votre email">
      </div>
      <div>
        <span>Mot de passe</span>
        <input type="password" placeholder="Entrer votre mot de passe">
      </div>

      <div>
        <input type="submit">S'inscire
        </div>

</body>
</html>