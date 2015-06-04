<?php
include 'conn.php';

$resetter = mysqli_real_escape_string($con, $_POST['Resetter']);

if ($resetter=="Axel") {
  $sql1 = "truncate table gamelog";

    if (!mysqli_query($con,$sql1)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "Game Reset by " . $resetter . " | ";

    $sql2 = "UPDATE cash SET Balance=15000000";

    if (!mysqli_query($con,$sql2)) {
    die('Error: ' . mysqli_error($con));
    }

echo "All accounts set to $15M<br><hr>";



} else {
  $sql = "INSERT INTO gamelog (sender, recipient, amount, comment)
VALUES ('$resetter', '', '0', 'Unsuccessful Reset Attempt')";
    if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
    }
}


?>

<?php include 'balances.php';?>