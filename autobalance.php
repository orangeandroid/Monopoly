

<table style=\"width:100%\">
                            <tr>
                                <th class=\"Playername\">Player</th>
                                <th class=\"Balances\">Balance</th>
                            </tr>
<?php
include 'conn.php';
$sql = "SELECT Player, Balance FROM cash";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td class=\"Playername\">" . $row["Player"]. "</td><td class=\"Balances\">" . $row["Balance"]. "</td></tr>";
    }
} 

else {
    echo "No Transactions";
}
echo "                            

                        </table>";?>