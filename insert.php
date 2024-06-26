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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $V_Schoolname = $_POST['V_Schoolname'];
    $V_Province = $_POST['V_Province'];
    $V_District = $_POST['V_District'];
    $V_SubDistrict = $_POST['V_SubDistrict'];
    $V_ExecutiveName = $_POST['V_ExecutiveName'];
    $V_ExeTell = $_POST['V_ExeTell'];
    $V_ExeEmail = $_POST['V_ExeEmail'];
    $V_CoordinatorName = $_POST['V_CoordinatorName'];
    $V_CooTell = $_POST['V_CooTell'];
    $V_CooEmail = $_POST['V_CooEmail'];
    $V_Sale = $_POST['V_Sale'];
    $V_Date = $_POST['V_Date'];
    $V_ElectricPerYear = $_POST['V_ElectricPerYear'];
    $V_ElectricPerMonth = $_POST['V_ElectricPerMonth'];
    $V_Status = $_POST['V_Status'];

    $sql = "INSERT INTO view_info (V_Schoolname, V_Province, V_District, V_SubDistrict, V_ExecutiveName, V_ExeTell, V_ExeEmail, V_CoordinatorName, V_CooTell, V_CooEmail, V_Sale, V_Date, V_ElectricPerYear, V_ElectricPerMonth, V_Status)
    VALUES ('$V_Schoolname', '$V_Province', '$V_District', '$V_SubDistrict', '$V_ExecutiveName', '$V_ExeTell', '$V_ExeEmail', '$V_CoordinatorName', '$V_CooTell', '$V_CooEmail', '$V_Sale', '$V_Date', '$V_ElectricPerYear', '$V_ElectricPerMonth', '$V_Status')";

    if ($objConnect->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $objConnect->error;
    }
    $objConnect->close();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Insert Data</title>
</head>

<body>
    <div class="header">
        <a href="index.php" class="logo">Dashbord</a>
        <div class="header-right">
            <!-- Additional links can be added here -->
        </div>
    </div>

    <div class="con">
        <div class="tab"> 
            <button class="tablinks" onclick="openTab(event, 'View')"><a href="index.php">เรียกดูข้อมูล</a></button>
            <button class="tablinks" onclick="openTab(event, 'Insert')"><a href="insert.php">เพิ่มข้อมูล</a></button>
        </div>

        <div class="container tabcontent">
            <h1>Insert Data</h1>
            <form action="insert.php" method="POST">
                <div class="form-group">
                    <label for="V_Schoolname">ชื่อหน่วยงาน:</label>
                    <input type="text" class="form-control" id="V_Schoolname" name="V_Schoolname" required>
                </div>
                <div class="form-group">
                    <label for="V_Province">จังหวัด:</label>
                    <input type="text" class="form-control" id="V_Province" name="V_Province">
                </div>
                <div class="form-group">
                    <label for="V_District">อำเภอ:</label>
                    <input type="text" class="form-control" id="V_District" name="V_District">
                </div>
                <div class="form-group">
                    <label for="V_SubDistrict">ตำบล:</label>
                    <input type="text" class="form-control" id="V_SubDistrict" name="V_SubDistrict">
                </div>
                <div class="form-group">
                    <label for="V_ExecutiveName">ชื่อผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExecutiveName" name="V_ExecutiveName">
                </div>
                <div class="form-group">
                    <label for="V_ExeTell">เบอร์โทรผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExeTell" name="V_ExeTell">
                </div>
                <div class="form-group">
                    <label for="V_ExeEmail">E-mail ผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExeEmail" name="V_ExeEmail">
                </div>
                <div class="form-group">
                    <label for="V_CoordinatorName">ชื่อผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CoordinatorName" name="V_CoordinatorName">
                </div>
                <div class="form-group">
                    <label for="V_CooTell">เบอร์โทรผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CooTell" name="V_CooTell">
                </div>
                <div class="form-group">
                    <label for="V_CooEmail">E-mail ผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CooEmail" name="V_CooEmail">
                </div>
                <div class="form-group">
                    <label for="V_Sale">ทีมฝ่ายขาย:</label>
                    <input type="text" class="form-control" id="V_Sale" name="V_Sale">
                </div>
                <div class="form-group">
                    <label for="V_Date">วันที่รับเอกสาร:</label>
                    <input type="date" class="form-control" id="V_Date" name="V_Date">
                </div>
                <div class="form-group">
                    <label for="V_ElectricPerYear">การใช้ไฟ/ปี:</label>
                    <input type="text" class="form-control" id="V_ElectricPerYear" name="V_ElectricPerYear">
                </div>
                <div class="form-group">
                    <label for="V_ElectricPerMonth">การใช้ไฟ/เดือน:</label>
                    <input type="text" class="form-control" id="V_ElectricPerMonth" name="V_ElectricPerMonth">
                </div>
                <div class="form-group">
                    <label for="V_Status">สถานะ:</label>
                    <input type="text" class="form-control" id="V_Status" name="V_Status">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</body>
</html>
