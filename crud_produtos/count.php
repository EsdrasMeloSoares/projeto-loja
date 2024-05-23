<?php
include "../config/db.php";
include "../verify/admin.php";

$sql = "SELECT COUNT(*) as total FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        printf('Total de ' . $row["total"] . ' produtos');
    }
} else {
    echo "0";
}
$conn->close();
?>