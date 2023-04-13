<?php

// Adatbázis kapcsolódás
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Űrlap adatok kezelése
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Felhasználói adatok ellenőrzése
    $nev = test_input($_POST["nev"]);
    $email = test_input($_POST["email"]);
    $jelszo = test_input($_POST["jelszo"]);
    $varos = test_input($_POST["varos"]);
    $irszam= test_input($_POST["irszam"]);
    $utca = test_input($_POST["utca"]);
   
    $hazszam= test_input($_POST["hazszam"]);
    // Jelszó hashelése
    $hashelt_jelszo = password_hash($jelszo, PASSWORD_DEFAULT);

    // SQL lekérdezés futtatása
    $sql = "INSERT INTO regisztracio (felnev, email, jelszo, varos, irszam, utca,  hazszam) VALUES ('$nev', '$email', '$hashelt_jelszo', '$varos', '$irszam', '$utca',  '$hazszam')";

    if (mysqli_query($conn, $sql)) {
        echo "Sikeres regisztráció!";
        header("Location: index7.php");
    } else {
        echo "Hiba a regisztráció során: " . mysqli_error($conn);
    }
}

// Adatbázis kapcsolat lezárása
mysqli_close($conn);

// Segédfüggvény a felhasználói adatok ellenőrzéséhez
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>FastFoodKing</title>
  <link rel="icon" href="val_icon.ico" type="ico">
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,700'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'><link rel="stylesheet" href="./style.css">
<link rel="icon" href="logo.png" type="ico">

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand"> <img class="logo" src="logo.png" alt="valorant_logo"></a>
    
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="myNav">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
          <a class="nav-link" href="index.php">Regisztráció<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="index2.php">Főoldal</a> 
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index3.php">Bejelentkezés</a> 
        </li>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="index5.php">Rólunk</a>
          <li class="nav-item">
            <a class="nav-link" href="index4.php">Étlap</a>
          </li>
        </li>

        <li class="nav-item">
          <button class="button" hidden>Kijelentkezés</button>
        </li>
       
      </ul>
  
      
      


    
  </nav>


<div class="body-content">
  <div class="module">
    <h1>Regisztráció</h1>
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] );?>" >
         Név: <input type="text" name="nev"><br>
        E-mail cím: <input type="email" name="email"><br>
        Jelszó: <input type="password" name="jelszo" autocomplete="new-password"><br>
        Város: <input type="text" name="varos"><br>
        Irámyítószám: <input type="text" name="irszam"><br>
        Utca: <input type="text" name="utca"><br>
      
        Házszám: <input type="text" name="hazszam"><br>
        <input type="submit" name="submit" value="Regisztráció">
</form>
      </form>  
    
  </div>
</div>



  
  

  

<!-- partial -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>

<script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>
</body>
</html>
