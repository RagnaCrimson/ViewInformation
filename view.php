<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "dataview";

$objConnect = new mysqli($server, $username, $password, $database);

if ($objConnect->connect_error) {
    die("Connection failed: " . $objConnect->connect_error);
}

mysqli_query($objConnect, "SET NAMES utf8");

$strSQL_dataview = "SELECT * FROM view";
$resultdataview = $objConnect->query($strSQL_dataview);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>View Data</title>
</head>

<body>
    <div class="header">
        <a href="index.php" class="logo">Testing</a>
        <div class="header-right">
            <!-- Additional links can be added here -->
        </div>
    </div>

    <div class="frame">
        <h1>ทำความสะอาดทั่วไป</h1>
        <table class="table table-striped">
        <?php
        if ($resultdataview->num_rows > 0) {
            ?>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อหน่วยงาน</th>
                <th>จังหวัด</th>
                <th>อำเภอ</th>
                <th>ตำบล</th>
                <th>ชื่อผู้บริหาร</th>
                <th>เบอร์โทร</th>
                <th>E-mail</th>
                <th>ชื่อผู้ประสานงาน</th>
                <th>เบอร์โทร</th>
                <th>E-mail</th>
                <th>ทีมฝ่ายขาย</th>
                <th>วันที่รับเอกสาร</th>
                <th>การใช้ไฟ/ปี</th>
                <th>การใช้ไฟ/เดือน</th>
                <th>สถานะ</th>
            </tr>
            <?php
            while($row = $resultdataview->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["V_NumID"]; ?></td>
                    <td><?php echo $row["V_Schoolname"]; ?></td>
                    <td><?php echo $row["V_Province"]; ?></td>
                    <td><?php echo $row["V_District"]; ?></td>
                    <td><?php echo $row["V_SubDistrict"]; ?></td>
                    <td><?php echo $row["V_ExecutiveName"]; ?></td>
                    <td><?php echo $row["V_ExeTell"]; ?></td>
                    <td><?php echo $row["V_ExeEmail"]; ?></td>
                    <td><?php echo $row["V_CoordinatorName"]; ?></td>
                    <td><?php echo $row["V_CooTell"]; ?></td>
                    <td><?php echo $row["V_CooEmail"]; ?></td>
                    <td><?php echo $row["V_Sale"]; ?></td>
                    <td><?php echo $row["V_Date"]; ?></td>
                    <td><?php echo $row["V_ElectricPerYear"]; ?></td>
                    <td><?php echo $row["V_ElectricPerMonth"]; ?></td>
                    <td><?php echo $row["V_Status"]; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='16'>ไม่มีข้อมูลรายการ</td></tr>";
        }
        $objConnect->close();
        ?>
        </table>
    </div>
</body>
</html>

<!-- create by Phoenix | Chanatip Chaipakdee -->