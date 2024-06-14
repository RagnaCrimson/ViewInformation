<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "info_db";

$objConnect = new mysqli($server, $username, $password, $database);

if ($objConnect->connect_error) {
    die("Connection failed: " . $objConnect->connect_error);
}

mysqli_query($objConnect, "SET NAMES utf8");

$strSQL_info_db = "SELECT * FROM view_info";
$resultinfo_db = $objConnect->query($strSQL_info_db);
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
        <a href="index.php" class="logo">Dashbord</a>
        <div class="header-right">
            <a href="index.php">เรียกดูข้อมูล</a>
            <a href="insert.php">เพิ่มข้อมูล</a>
        </div>
    </div>

        <div id="View" class="tabcontent">
            <h1>ข้อมูลการใช้ไฟฟ้าของหน่วยงาน</h1>
            <table id="data" class="table table-striped">
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
                    <th>Actions</th>
                </tr>
                <?php
                if ($resultinfo_db->num_rows > 0) {
                    $sequence = 1; // Initialize sequence number
                    while($row = $resultinfo_db->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $sequence++; ?></td>
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
                            <td>
                                <a href="edit.php?id=<?php echo $row['V_Schoolname']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $row['V_Schoolname']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='17'>ไม่มีข้อมูลรายการ</td></tr>";
                }
                $objConnect->close();
                ?>
            </table>
        </div>


    <script src="script.js"></script>
</body>
</html>

<!-- create by Phoenix | Chanatip Chaipakdee -->
