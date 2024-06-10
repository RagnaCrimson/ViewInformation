<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Front</title>
</head>
    </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<body>
    <div class="header">
        <a href="#default" class="logo">Testing</a>
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div>

    <!-- <div class="center" style="padding-left:20px">
        <h1>Website page for pull out data</h1>
        <p>with responsive design</p>
        <p>Si hope it's will work lol</p>
    </div> -->

    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'London')">เรียกดูข้อมูล</button>
            <button class="tablinks" onclick="openTab(event, 'Paris')">เพิ่มข้อมูล</button>
            <button class="tablinks" onclick="openTab(event, 'Tokyo')">แก้ไขข้อมูล</button>
        </div>

        <div id="London" class="tabcontent">
            <h3>ข้อมูลการใช้ไฟฟ้าของหน่วยงาน</h3>
            <p>เทสๆ</p>
        </div>

        <div id="Paris" class="tabcontent">
            <h3>พื้นที่ Insert data</h3>
            <p>ใส่ลงใน table database or Excel</p>
        </div>

        <div id="Tokyo" class="tabcontent">
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