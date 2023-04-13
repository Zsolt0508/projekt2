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

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM regisztracio WHERE (felnev='$username' OR email='$username')";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['jelszo'])) {
            $_SESSION['username'] = $row['felnev'];
            header("location: rendeles.php");
        } else {
            echo "Hibás felhasználónév vagy jelszó!";
        }
    } else {
        echo "Hibás felhasználónév vagy jelszó!";
    }
}




$conn->close();
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
<script src="lap2.js"></script>


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
             <li class="nav-item ">
              <a class="nav-link" href="index.php">Regisztráció</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index2.php">Főoldal</a> 
            </li>
            </li>
            <li class="nav-item active">
              <a class="nav-link"  href="index3.php">Bejelentkezés<span class="sr-only">(current)</span></a> 
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
            <li class="nav-item">
                <a class="nav-link" href="kosar.php">Kosár</a>
              </li>
            </li>
          </ul>
      
          
          


        
      </nav>

<div class="body-content">
  <div class="module">
    <h1 id="bej">Bejelentkezés</h1>
    <form method="post">
		<label>Felhasználónév:</label><br>
		<input type="text" name="username" required><br>
		<label>Jelszó:</label><br>
		<input type="password" name="password"  autocomplete="new-password"required><br>
		<input type="submit" name="login" value="Bejelentkezés">
	</form>
	<?php if(isset($error)) echo $error; ?>
    
  </div>
</div>



  
  

  

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>

<script src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

</body>
</html>
