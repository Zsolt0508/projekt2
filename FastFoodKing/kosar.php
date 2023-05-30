


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,700'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'><link rel="stylesheet" href="./style.css">
    <title>FastFoodKing</title>
    <link rel="icon" href="logo.png" type="ico">
    
</head>
<body >
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container">
          <a class="navbar-brand"> <img class="logo" src="logo.png" alt="valorant_logo"></a>
        
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="myNav">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item ">
              <a class="nav-link" href="regisztracio.php">Regisztráció</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="fooldal.php">Főoldal<span class="sr-only">(current)</span></a> 
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bejelentkezes.php">Bejelentkezés</a> 
            </li>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="rendeles1.php">Rendelés</a>
              <li class="nav-item">
                <a class="nav-link" href="etlap.php">Étlap</a>
              </li>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="kosar.php">Kosár<span class="sr-only">(current)</span></a> 
            </li>
            </li>
          </ul>
      
          
          


        
      </nav>

      <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Lekérdezzük a kosár tartalmát az adatbázisból
$sql = "SELECT hamburger, pizza, szendvics, deszert, salata, ital FROM kosar WHERE idkosar >= 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Válogatás az elemek közül és összegzés
    $osszeg = 0;
    if ($row['hamburger'] > 0) {
        $osszeg += $row['hamburger'] * 1000;
    }
    if ($row['pizza'] > 0) {
        $osszeg += $row['pizza'] * 1200;
    }
    if ($row['szendvics'] > 0) {
        $osszeg += $row['szendvics'] * 1200;
    }
    if ($row['deszert'] > 0) {
        $osszeg += $row['deszert'] * 1200;
    }
    if ($row['salata'] > 0) {
        $osszeg += $row['salata'] * 1200;
    }
    if ($row['ital'] > 0) {
        $osszeg += $row['ital'] * 1200;
    }

    // Kiírjuk az összeget
    echo "A kosár összesen: " . $osszeg . " Ft";
} else {
    echo "A kosár üres";
}

$conn->close();
?>



<form action="kosar.php" method="post" class="widht" >
  <label for="fizet"  >Válassz fizető eszközt:</label>
  <select name="fizet" id="fizet" style="width: 100px;">
    <option value="kártyás">Kártyás</option>
    <option value="kézpénzes">Kézpénzes</option>
  </select>
  <br><br>
  <input type="submit" value="Rendelés leadása">
</form>

      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script> 
    </body>

    </html>