<?php 
$connexion = new PDO("mysql: host=127.0.0.1; dbname= users_base","root", "");


if (isset($_POST["valider"])){
  if(!empty($_POST["email"]) AND !empty($_POST["password"])){
      $email = htmlspecialchars($_POST["email"]);
      $password = sha1($_POST["password"]);
      $req = $connexion->prepare("SELECT * FROM users WHERE email =? AND password = ?");
      $req->execute(array($email,$password));
      $cpt = $req->rowCount();

      if ($cpt==1) {
          $message ="Votre compte a bien été trouvé";
          
      }else{
          $message = "désolé nous ne trouvons pas ce compte"; 
      }

  }else{
    $message = "Veuillez remplir tous les champs";
  }
}



//if($_SERVER["REQUEST_METHOD"] == "POST"){
//retrieve form data
//$username = $_POST["username"];
//$password = $_POST["password"];

// Database Connexion
//$host ="localhost";
//$dbusername = "root";
//$dbpassword ="";
//$dbname ="authflex";

//$conn =new mysqli($host, $dbusername, $dbpassword, $dbname);

//if($conn->connect_error){
   // die("Connexion echouée : ". $conn->connect_error);

//}

// validate login authentification

//$query = "SELECT *FROM login WHERE username = '$username' AND password ='$password'";

//$result = $conn->query($query);

//if($result->num_rows == 1){
    //login success
    //header("Location :sucess.html");
    //exit();
//}
//else{
    //login failed
   // header("Location :error.html");
   // exit();
//}
   //$conn->close();
//}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flex</title>
    <!-- CSS file -->
    <link rel="stylesheet" href="Style.css" />
    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  </head>
  <body>
    <header class="header" id="header">
      <div class="navbar">
        <div class="logo">
          <img src="img/logo new2re.png" />
        </div>
        <nav class="nav-menu" id="nav-menu">
          <ul class="nav-list">
            <li><a href="./index.html #" class="nav-link active">accueil</a></li>
            <li><a href="./index.html  #apropos" class="nav-link">a propos</a></li>
            <li><a href="./index.html #reservation" class="nav-link">Services</a></li>
            <li><a href="./index.html #promotion" class="nav-link">promotions </a></li>
            <li><a href="./index.html #ateliers" class="nav-link">salons</a></li>
            <li><a href="./index.html #contact" class="nav-link">contacts</a></li>
            <li><a href="./login.html" class="btnlogin">Connexion</a></li>
          </ul>

        </nav>
        <div class="nav-toggle" id="nav-toggle">
            <!-- Icône Bars-->
            <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </header>
       
       <!-- Start Login Section-->
       <section id="login">
        <div class="wrapper">
          <div class="form-box login">
            <h2>Connexion</h2>
            <form action="login.html" method="post">
              <div class="imput-box">
                <span class="icon"><ion-icon name="email"></ion-icon></span>
                <input type="email" required>
                <label>E-mail</label>
            </div>
            <div class="imput-box">
              <span class="icon"><ion-icon name="password"></ion-icon></span>
              <input type="password" required>
              <label>Mot de passe</label>
          </div>
          <div class="remember-forget">
            <label><input type="checkbox">Se souvenir</label>
            <a href="inscription.html">Mot de passe oublié</a>
          </div>
          <button type="submit" name= "valider" class="btnlog"> connexion</button>
          <div class="login-register">
            <p>
            <i style="color:red">
              <?php 
              if (isset($message)){
                echo $message;

              }
              
              ?>

            </i>  
            je n'ai pas de compte<a href="inscription.html" class="register-link">  s'inscrire</a></p>
          </div>
            </form>
          </div>
        </div>
                
    </section>

        <!-- End Login Section-->
        <script src="main.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>