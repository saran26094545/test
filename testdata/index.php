<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "datatest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM Customer WHERE Used > 500000";
    
    $stmt = $conn->query($sql);
    
    if ($stmt->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Country Code</th><th>Budget</th><th>Used</th></tr>";
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['CountryCode'] . "</td>";
            echo "<td>" . $row['Budget'] . "</td>";
            echo "<td>" . $row['Used'] . "</td>";
            echo "</tr>";
        }
        
       
        echo "</table>";
        
        echo "<br>";
        echo "<a href='ans5.php'>คำตอบข้อ5</a>";
    } else {
        echo "ไม่พบข้อมูลที่ตรงตามเงื่อนไข";
    }
} catch(PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}

$conn = null;

?>
