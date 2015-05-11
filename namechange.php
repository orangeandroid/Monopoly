<?php
$con=mysqli_connect("localhost","axel_moneybags","3^PVtkW]dHw,","axel_monopoly");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$oldName = mysqli_real_escape_string($con, $_POST['oldName']);
$newName = mysqli_real_escape_string($con, $_POST['newName']);
$resetter = mysqli_real_escape_string($con, $_POST['password']);

if ($resetter=="Axel") {
  $sql = "truncate table gamelog";
} else {
  $sql = "INSERT INTO gamelog (sender, recipient, amount, comment)
VALUES ('$resetter', '', '0', 'Unsuccessful Name Change Attempt')";
}



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}



if ($oldName == 'Bank'){
    echo "Cannot Change Bank Name";
} else {
    $sql="UPDATE `cash` SET `Player`='$newName' WHERE `Player`= '$oldName'";
        if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
    echo "Player Name Changed From " . $oldName . " to " . $newName;
}




?>

<?php include 'settings.php';?>