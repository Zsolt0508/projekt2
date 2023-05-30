<?php


include 'rendeles1.php';

if(isset($_POST['submit'])) {
    $etelid = mysqli_real_escape_string($conn, $_POST['etelid']);
    $hamburger = mysqli_real_escape_string($conn, $_POST['hamburger']);
    $pizza = mysqli_real_escape_string($conn, $_POST['pizza']);
    $szendvics = mysqli_real_escape_string($conn, $_POST['szendvics']);
    $deszert = mysqli_real_escape_string($conn, $_POST['deszert']);
    $salata = mysqli_real_escape_string($conn, $_POST['salata']);
    $ital = mysqli_real_escape_string($conn, $_POST['ital']);

    $sql = "INSERT INTO kosar (etelid, hamburger, pizza, szendvics, deszert, salata, ital) 
            VALUES ('$etelid', '$hamburger', '$pizza', '$szendvics', '$deszert', '$salata', '$ital')";

    if(mysqli_query($conn, $sql)) {
        echo "Sikeres rendelés!";
    } else {
        echo "Hiba: " . mysqli_error($conn);
    }
}

$conn->close();
?>