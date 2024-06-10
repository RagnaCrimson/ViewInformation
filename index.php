<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Front</title>
</head>
    
<body>
    <div class="header">
        <a href="#default" class="logo">Testing</a>
        <div class="header-right">
            <!-- <a class="active" href="#home">Home</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a> -->
        </div>
    </div>

    <!-- <div class="center" style="padding-left:20px">
        <h1>Website page for pull out data</h1>
        <p>with responsive design</p>
        <p>Si hope it's will work lol</p>
    </div> -->

    <div class="con">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'View')">เรียกดูข้อมูล</button>
            <button class="tablinks" onclick="openTab(event, 'Insert')">เพิ่มข้อมูล</button>
            <button class="tablinks" onclick="openTab(event, 'Edit')">แก้ไขข้อมูล</button>
        </div>

        <div id="View" class="container tabcontent">
            <h3>ข้อมูลการใช้ไฟฟ้าของหน่วยงาน</h3>
            <p>เทสๆ</p>

            <table id="customers">
                <tr>
                    <th>ชื่อโรงเรียน</th>
                    <th>จังหวัด</th>
                    <th>อำเภอ</th>
                    <th>ตำบล</th>
                    <th>ชื่อผู้บริหาร</th>
                    <th>เบอร์โทร</th>
                    <th>อีเมลล์</th>
                    <th>วันที่รับเอกสาร</th>
                    <th>เซลผู้ประสานงาน</th>
                    <th>ปริมาณการใช้ไฟฟ้า</th>
                    <th>ค่าไฟ</th>
                </tr>

                <tr>
                    <td>โรงเรียนหกฟหกหฟเดกหดเกด้เดก้เพ</td>
                    <td>ปทุมธานี</td>
                    <td>ลำลูกา</td>
                    <td>คูคต</td>
                    <td>สกาย</td>
                    <td>0987654321</td>
                    <td>dsadjh@gmail.com</td>
                    <td>10/6/2567</td>
                    <td>คุณพิเย็น</td>
                    <td>100,000</td>
                    <td>100,000</td>
                </tr>

            </table>
        </div>

        <div id="Insert" class="tabcontent">
            <h3>พื้นที่ Insert data</h3>
            <p>ใส่ลงใน table database or Excel</p>
        </div>

        <div id="Edit" class="tabcontent">
            <h3>Edit data</h3>
            <p>พื้นที่แก้ไขข้อมูลใน table</p>
        </div>
    </div>


    <script>
        function openTab(evt, cityName) {
        var i, tabcontent, tablinks;

        // Hide all tabcontent elements
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Remove the "active" class from all tablinks/buttons
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }

        // Set default tab open
        document.getElementsByClassName("tablinks")[0].click();
    </script>
</body>
</html>