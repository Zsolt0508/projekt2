



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
            <li class="nav-item ">
              <a class="nav-link" href="fooldal.php">Főoldal<span class="sr-only">(current)</span></a> 
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bejelentkezes.php">Bejelentkezés</a> 
            </li>
          </li>
            <li class="nav-item active">
              <a class="nav-link" href="rendeles1.php">Rendelés</a>
              <li class="nav-item">
                <a class="nav-link" href="etlap.php">Étlap</a>
              </li>
            </li>
            
          </ul>
      
        
      </nav>


      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

      <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// rendelés feldolgozása
if(isset($_POST['submit'])) {
  $hamburger = $_POST['hamburger'];
  $pizza = $_POST['pizza'];
  $szendvics = $_POST['szendvics'];
  $deszert = $_POST['deszert'];
  $salata = $_POST['salata'];
  $ital = $_POST['ital'];

  $sql = "INSERT INTO kosar (hamburger, pizza, szendvics, deszert, salata, ital) VALUES ('$hamburger', '$pizza', '$szendvics', '$deszert', '$salata', '$ital')";
  if ($conn->query($sql) === TRUE) {
      header('Location: kosar.php');
      exit();
  } else {
      echo "Hiba a rendelés feldolgozásakor: " . $conn->error;
  }
}

if (isset($_POST['submit'])) {
  // rendelés feldolgozása
}
// adatok lekérdezése
$sql = "SELECT * FROM etelek";
$result = $conn->query($sql);

// táblázat kiírása
echo "<form method='post'>";
echo "<table class='table'>";
echo "<tr><th>hamburger</th><th>pizza</th><th>szendvics</th><th>deszert</th><th>saláta</th><th>italok</th></tr>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["hamburger"]. "</td><td>" . $row["pizza"]. "</td><td>" . $row["szendvics"]. "</td><td>" . $row["deszert"]. "</td><td>" . $row["saláta"]. "</td><td>" . $row["italok"]. "</td></tr>";
    }
} else {
    echo "Nincs találat";
}
echo "</table>";
echo "<br>";
echo "<h2>Rendelés</h2>";
echo "<input type='number' name='hamburger' placeholder='Hamburger db' min='0'>";
echo "<input type='number' name='pizza' placeholder='Pizza db' min='0'>";
echo "<input type='number' name='szendvics' placeholder='Szendvics db' min='0'>";
echo "<input type='number' name='deszert' placeholder='Desszert db' min='0'>";
echo "<input type='number' name='salata' placeholder='Saláta db' min='0'>";
echo "<input type='number' name='ital' placeholder='Ital db' min='0'>";
echo "<input type='submit' name='submit' value='Rendelés'>";
echo "</form>";

// adatbázis kapcsolat bezárása





$conn->close();
?>

</body>
    </html>