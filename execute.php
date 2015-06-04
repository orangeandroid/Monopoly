<?php
$con=mysqli_connect("localhost","axel_moneybags","3^PVtkW]dHw,","axel_monopoly");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$Sender = mysqli_real_escape_string($con, $_POST['Sender']);
$Recipient = mysqli_real_escape_string($con, $_POST['Recipient']);
$Amount = mysqli_real_escape_string($con, $_POST['Amount']);
$Comment = mysqli_real_escape_string($con, $_POST['Comment']);

//Get Current Balance of Sender and calculate new balance
//echo "<h1>Get Current Balance of Sender and Calculate New Balance</h1><br>";
$sql = "SELECT Balance FROM cash Where Player = '$Sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br>OldSBalance: " . $row["Balance"];
        $OldSenderBalance = $row["Balance"];
        //echo "<br>OldSenderBalance: " . $OldSenderBalance;
        $NewSenderBalance = $OldSenderBalance - $Amount;
        //echo "<br>NewSenderBalance: " . $NewSenderBalance;
    }
} else {
    echo "0 results";
}

//Get Current Balance of Recipient and calculate new balance
//echo "<h1>Get Current Balance of Recipient and calculate new balance</h1><br>";
$sql = "SELECT Balance FROM cash Where Player = '$Recipient'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br>OldRBalance: " . $row["Balance"];
        $OldRecipientBalance = $row["Balance"];
        //echo "<br>OldRecipientBalance: " . $OldRecipientBalance;
        $NewRecipientBalance = $OldRecipientBalance + $Amount;
        //echo "<br>NewRecipientBalance: " . $NewRecipientBalance;
    }
} else {
    echo "0 results";
}

//$NewSenderBalance = 
//$NewRecipientBalance = 

//Update Sender Balance
//echo "<h1>Update Sender Balance</h1><br>";
if ($Sender == 'Bank') {
    echo "Bank Balance Never Goes Down | ";
    $NewSenderBalance = 15000000;
}
else {
    echo "Deducted $" . $Amount . " from " . $Sender . " | ";
}
    
$sql="UPDATE `cash` SET `Balance`= $NewSenderBalance WHERE `Player`= '$Sender'";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


//Update Recipient Balance
//echo "<h1>Update Recipient Balance</h1><br>";
if ($Recipient == 'Bank') {
    echo "Bank Balance Never goes up | ";
    $NewRecipientBalance = 15000000;
} else {
    echo "Added $" . $Amount . " To " . $Recipient . " | ";
}

$sql="UPDATE `cash` SET `Balance`=$NewRecipientBalance WHERE `Player`= '$Recipient'";


if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}



//Update GameLog
//echo "<h1>Update Log</h1><br>";
$sql="INSERT INTO gamelog (sender, recipient, amount, comment)
VALUES ('$Sender', '$Recipient', '$Amount', '$Comment')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Updated Game Log<br><hr>";

mysqli_close($con);
?>

<?php include 'index.php';?>