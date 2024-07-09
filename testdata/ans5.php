<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "datatest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT c.ID, c.Name, c.Email, c.CountryCode, c.Budget, c.Used, o.ID AS OrderID, OrderDate, o.Amount
            FROM Customer c
            INNER JOIN Orders o ON c.ID = o.CustomerID";

    $stmt = $conn->query($sql);
    
    if ($stmt->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Email</th><th>Country Code</th><th>Budget</th><th>Used</th><th>Order ID</th><th>Order Date</th><th>Order Amount</th></tr>";
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['CountryCode'] . "</td>";
            echo "<td>" . $row['Budget'] . "</td>";
            echo "<td>" . $row['Used'] . "</td>";
            echo "<td>" . $row['OrderID'] . "</td>";
            echo "<td>" . $row['OrderDate'] . "</td>";
            echo "<td>" . $row['Amount'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";

        echo "<br>";
        echo "<a href='index.php'>หน้าเเรก</a>";
    } else {
        echo "ไม่พบข้อมูลที่ตรงตามเงื่อนไข";
    }
} catch(PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}

$conn = null;

?>
