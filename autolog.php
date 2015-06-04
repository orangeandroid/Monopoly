<?php
include 'conn.php';

$sql = "SELECT timestamp, sender, amount, recipient, comment FROM gamelog order by timestamp DESC";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "At " . $row["timestamp"]. " " . $row["sender"]. " paid " . $row["recipient"] . " " . $row["amount"] . " for " . $row["comment"]. "<br>";
    }
} 

else {
    echo "No Transactions";
}
?>