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

    $sql = "UPDATE view_info SET 
        V_Province='$V_Province', 
        V_District='$V_District', 
        V_SubDistrict='$V_SubDistrict', 
        V_ExecutiveName='$V_ExecutiveName', 
        V_ExeTell='$V_ExeTell', 
        V_ExeEmail='$V_ExeEmail', 
        V_CoordinatorName='$V_CoordinatorName', 
        V_CooTell='$V_CooTell', 
        V_CooEmail='$V_CooEmail', 
        V_Sale='$V_Sale', 
        V_Date='$V_Date', 
        V_ElectricPerYear='$V_ElectricPerYear', 
        V_ElectricPerMonth='$V_ElectricPerMonth', 
        V_Status='$V_Status' 
        WHERE V_Schoolname='$V_Schoolname'";

    if ($objConnect->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $objConnect->error;
    }
}

$objConnect->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit Data</title>
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
            <h1>Edit Data</h1>
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['V_Schoolname']; ?>">
                <div class="form-group">
                    <label for="V_Schoolname">ชื่อหน่วยงาน:</label>
                    <input type="text" class="form-control" id="V_Schoolname" name="V_Schoolname" value="<?php echo isset($row['V_Schoolname']) ? $row['V_Schoolname'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="V_Province">จังหวัด:</label>
                    <input type="text" class="form-control" id="V_Province" name="V_Province" value="<?php echo isset($row['V_Province']) ? $row['V_Province'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_District">อำเภอ:</label>
                    <input type="text" class="form-control" id="V_District" name="V_District" value="<?php echo isset($row['V_District']) ? $row['V_District'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_SubDistrict">ตำบล:</label>
                    <input type="text" class="form-control" id="V_SubDistrict" name="V_SubDistrict" value="<?php echo isset($row['V_SubDistrict']) ? $row['V_SubDistrict'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_ExecutiveName">ชื่อผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExecutiveName" name="V_ExecutiveName" value="<?php isset($row['V_ExecutiveName']) ? $row['V_ExecutiveName'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_ExeTell">เบอร์โทรผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExeTell" name="V_ExeTell" value="<?php echo isset($row['V_ExeTell']) ? $row['V_ExeTell'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_ExeEmail">E-mail ผู้บริหาร:</label>
                    <input type="text" class="form-control" id="V_ExeEmail" name="V_ExeEmail" value="<?php echo isset($row['V_ExeEmail']) ? $row['V_ExeEmail'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_CoordinatorName">ชื่อผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CoordinatorName" name="V_CoordinatorName" value="<?php echo isset($row['V_CoordinatorName']) ? $row['V_CoordinatorName'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_CooTell">เบอร์โทรผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CooTell" name="V_CooTell" value="<?php echo isset($row['V_CooTell']) ? $row['V_CooTell'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_CooEmail">E-mail ผู้ประสานงาน:</label>
                    <input type="text" class="form-control" id="V_CooEmail" name="V_CooEmail" value="<?php echo isset($row['V_CooEmail']) ? $row['V_CooEmail'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_Sale">ทีมฝ่ายขาย:</label>
                    <input type="text" class="form-control" id="V_Sale" name="V_Sale" value="<?php echo isset($row['V_Sale']) ? $row['V_Sale'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_Date">วันที่รับเอกสาร:</label>
                    <input type="date" class="form-control" id="V_Date" name="V_Date" value="<?php echo isset($row['V_Date']) ? $row['V_Date'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_ElectricPerYear">การใช้ไฟ/ปี:</label>
                    <input type="number" class="form-control" id="V_ElectricPerYear" name="V_ElectricPerYear" value="<?php echo isset($row['V_ElectricPerYear']) ? $row['V_ElectricPerYear'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_ElectricPerMonth">การใช้ไฟ/เดือน:</label>
                    <input type="number" class="form-control" id="V_ElectricPerMonth" name="V_ElectricPerMonth" value="<?php echo isset($row['V_ElectricPerMonth']) ? $row['V_ElectricPerMonth'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="V_Status">สถานะ:</label>
                    <input type="text" class="form-control" id="V_Status" name="V_Status" value="<?php echo isset($row['V_Status']) ? $row['V_Status'] : ''; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
