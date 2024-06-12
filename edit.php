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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $strSQL = "SELECT * FROM view WHERE V_NumID = $id";
    $result = $objConnect->query($strSQL);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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

    $sql = "UPDATE view SET 
        V_Schoolname='$V_Schoolname', 
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
        WHERE V_NumID=$id";

    if ($objConnect->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: view.php");
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
        <a href="index.php" class="logo">Testing</a>
        <div class="header-right">
            <!-- Additional links can be added here -->
        </div>
    </div>

    <div class="frame">
        <h1>Edit Data</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['V_NumID']; ?>">
            <div class="form-group">
                <label for="V_Schoolname">ชื่อหน่วยงาน:</label>
                <input type="text" class="form-control" id="V_Schoolname" name="V_Schoolname">
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
                <input type="email" class="form-control" id="V_ExeEmail" name="V_ExeEmail">
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
                <input type="email" class="form-control" id="V_CooEmail" name="V_CooEmail">
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
                <input type="number" class="form-control" id="V_ElectricPerYear" name="V_ElectricPerYear">
            </div>
            <div class="form-group">
                <label for="V_ElectricPerMonth">การใช้ไฟ/เดือน:</label>
                <input type="number" class="form-control" id="V_ElectricPerMonth" name="V_ElectricPerMonth">
            </div>
            <div class="form-group">
                <label for="V_Status">สถานะ:</label>
                <input type="text" class="form-control" id="V_Status" name="V_Status">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>