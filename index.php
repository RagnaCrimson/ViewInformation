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

    <div class="con">
        <div class="tab"> 
            <button class="tablinks" onclick="openTab(event, 'View')"><a href="view.php">เรียกดูข้อมูล</a></button>
            <button class="tablinks" onclick="openTab(event, 'Insert')"><a href="insert.php">เพิ่มข้อมูล</a></button>
        </div>

        <div id="View" class="container tabcontent">
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
                if ($resultdataview->num_rows > 0) {
                    $sequence = 1; // Initialize sequence number
                    while($row = $resultdataview->fetch_assoc()) {
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
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
    </div>

    <div id="Insert" class="tabcontent">
        <h3>พื้นที่ Insert data</h3>
        <p>ใส่ลงใน table database or Excel</p>
    </div>

    <script src="script.js"></script>
</body>
</html>

<!-- create by Phoenix | Chanatip Chaipakdee -->
