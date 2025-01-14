<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Map with Markers</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <style>
        body,
        html {
            /* height: 100%; */
            background-color: #ffffff;
            /* Light background color */
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2px;
            background-color: #ffffff;
            /* White background for container */
            /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); */
            /* Subtle shadow for container */
            border-radius: 10px;
            /* Rounded corners for container */

        }


        #map {
            width: 1130px;
            /* Responsive width */
            height: 508px;
            /* Responsive height */
            border: 2px solid #343a40;
            position: relative;
            background-image: url('js/BuildingMark/FL2.jpg');
            /* Add background image */
            background-size: contain;
            background-position: center;
            /* Center the background image */
            background-repeat: no-repeat;
            /* Do not repeat the background image */
            /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); */
            /* Optional: add shadow for better appearance */
            border-radius: 10px;
            /* Rounded corners for map */
            margin-right: 30PX;
            background-color: #F8FEFA;


        }

        #map-container {
            display: flex;
            justify-content: space-between;
        }

        #configPanel {
            flex: 1;
            padding: 20px;
            border: 2px solid #343a40;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            /* พื้นหลังสีอ่อน */
            max-height: 508px;
            /* กำหนดความสูงสูงสุดของ Panel */
            overflow-y: auto;
            /* เพิ่ม Scrollbar เมื่อข้อมูลเกิน */
        }

        .box {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            animation: blink 1s step-start infinite;
            /* Adjust duration here */
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        #Content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 40px;
            /* Adds space between the text and the button */
            padding: 0 10px;
            /* Optional: Add some padding */
            margin-top: 20px;
        }

        /* .form-control {
            max-width: 300px;
            padding: 10px;
            font-size: 1.1em;
            border: 2px solid #343a40;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-group-text {
            border: 2px solid #343a40;
            border-right: none;
            border-radius: 5px 0 0 5px;
            background-color: #e9ecef;
        } */

        /* .btn-primary {
            background-color: #fff176;
            color: #343a40;
            border-color: #343a40;
            padding: 10px 20px;
            font-size: 1.1em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #ffc107;
            color: #343a40;
        } */

        .input-group {
            display: flex;
            align-items: center;
            margin-top: 20px;
            /* เพิ่ม margin-top เพื่อขยับลง */
            justify-content: center;
            /* Center the input group */
        }

        .input-group .btn {
            margin-left: 10px;
            /* Space between input and button */
        }

        #addButton {
            /* background-color: #007bff; */
            /* Custom button color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        /* #addButton:hover {
            background-color: #0056b3;
        } */

        #saveButton {
            /* background-color: #007bff; */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        /* #saveButton:hover {
            background-color: #0056b3;
        } */

        #inputField {
            margin-left: 10px;
            /* Space between dropdown and input field */
            width: 200px;
            /* Adjust width as needed */
            padding: 5px;
            /* Adjust padding to make the input smaller */
            font-size: 17px;
            /* Adjust font size for smaller text */
        }

        #inputID {
            margin-left: 10px;
            /* Space between dropdown and input field */
            width: 200px;
            /* Adjust width as needed */
            padding: 5px;
            /* Adjust padding to make the input smaller */
            font-size: 17px;
            /* Adjust font size for smaller text */
        }


        #firstDropdown {

            width: 200px;

        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
                /* เริ่มต้นด้วยการย้ายขึ้นไปด้านบน */
            }

            100% {
                opacity: 1;
                transform: translateY(0);
                /* เลื่อนไปยังตำแหน่งปกติ */
            }
        }

        @keyframes slideOut {
            100% {
                opacity: 1;
                transform: translateY(0);
                /* เริ่มต้นด้วยการย้ายขึ้นไปด้านบน */
            }

            0% {
                opacity: 0;
                transform: translateY(-20px);
                /* เลื่อนไปยังตำแหน่งปกติ */
            }
        }


        .hidden {
            visibility: hidden;
            opacity: 0;
            animation: slideOut 0.5s ease forwards;
            /* ใช้อนิเมชั่นที่กำหนดไว้ */

        }

        .show {
            visibility: visible;
            opacity: 1;
            animation: slideIn 0.5s ease forwards;
            /* ใช้อนิเมชั่นที่กำหนดไว้ */

        }

        #backButton {
            visibility: hidden;
            margin-right: 900px;
            /* ขยับปุ่มไปทางขวา */
            position: relative;
            /* ทำให้ข้อความแสดงเมื่อเลื่อนเมาส์จัดตำแหน่งสัมพันธ์กับปุ่ม */
            font-size: 1.5em;
            padding: 10px 15px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffc107;
            /* สีพื้นหลังของปุ่ม */
            color: white;
            text-align: center;
            line-height: 1;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        #backButton:hover {
            background-color: #ff9800;
            /* สีพื้นหลังที่เข้มขึ้นเมื่อเลื่อนเมาส์ */
        }

        /* Tooltip styles */
        #backButton::after {
            content: 'Go Back';
            /* ข้อความที่จะแสดงใน tooltip */
            position: absolute;
            top: 50%;
            left: 110%;
            /* แสดงข้อความทางด้านขวาของปุ่ม */
            transform: translateY(-50%);
            /* จัดตำแหน่งให้ข้อความอยู่ตรงกลางตามแนวตั้งของปุ่ม */
            padding: 5px;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            white-space: nowrap;
            font-size: 0.9em;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        /* แสดง tooltip เมื่อเลื่อนเมาส์ */
        #backButton:hover::after {
            opacity: 1;
            visibility: visible;
        }

        .d-none {
            display: none !important;
        }

        /* table {
            width: 100%;
            margin-top: 10px;
        }

        table thead {
            background-color: #343a40;
            color: #fff;

        }

        table th,
        table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;

        } */

        .slide-out {
            position: absolute;
            top: -8px;
            right: -150px;
            /* ปรับตำแหน่งของ Slide-out */
            display: flex;
            gap: 5px;
            background-color: #f8f9fa;
            padding: 5px;
            border: 1px solid #343a40;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(20px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(20px);
            }
        }

        .custom-container-size {
            width: auto;
            /* กำหนดความกว้างของกรอบนอก */
            height: auto;
            /* หรือคุณสามารถกำหนดความสูงได้ */
            padding: 1px;
            /* กำหนด padding รอบๆ องค์ประกอบ */
            margin: 1px;
            /* กำหนด margin ระหว่างองค์ประกอบ */

        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 90%;
            margin: 0 auto;


        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            width: auto;

        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;

        }

        #fetchDataButton {

            font-weight: bold;
            font-size: 18.5px;

        }

        .config-paneller {

            text-align: center;


        }
    </style>
</head>

<body>
    <div id="alert" class="alert alert-danger d-flex align-items-center d-none" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            An example danger alert with an icon
        </div>
    </div>
    <div id="sucalert" class="alert alert-success d-flex align-items-center d-none" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            An example success alert with an icon
        </div>
    </div>



    <div class="container-fluid">

        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide bg-light " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-warning text-white ">
                    <img src="image/car-battery.png" width="36" height="36" class="rounded me-2" alt="...">
                    <strong class="me-auto">QR-Code Genaretor</strong>
                    <!-- <small>11 mins ago</small> -->
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div class=" row justify-content-center center">
                        <div id="qrcode_u" class="col-6 border"
                            style="padding-top:15px; padding-bottom:15px; width: 221px;">
                            <div id="qrcode">
                                <div id="lb_detial"
                                    style="padding-left:5px; margin-top:1px; background-color: black;color:white; ">
                                    <h4 id="labelWithText"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-success btn-mb " id="download" onclick="">Download
                                Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative">
            <a href="index.php" id="backButton" class="btn btn-warning">
                <i class="fas fa-home" style="color: white;"></i>
            </a>
        </div>





        <div id="Content">
            <div class="mb-3 d-flex  row">
                <div class="col-auto">
                    <h1> <i class="fa fa-map-marker" style="color: red;"></i>Mark Location</h1>
                </div>
                <div class="col-auto">
                    <select id="firstDropdown" class="form-select ms-2 hidden">
                        <option value="">Select an option</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input id="inputField" type="text" class="form-control ms-2 hidden" placeholder="Room info">
                </div>
                <div class="col-auto">
                    <input id="inputID" type="text" class="form-control ms-2 hidden" placeholder="Input ID">
                </div>
                <div class="col-auto">
                    <button id="saveButton" type="button" onclick="genqr()"
                        class="btn btn-success ms-auto hidden">SAVE</button>
                </div>
                <div class="col-auto justify-content-end" style="position:relative; width:410px;" align="right">
                    <button id="addButton" type="button" class="btn btn-secondary ms-auto"><strong>Add Location</strong>  <i class="fa fa-plus" style="color: white;"></i> </button>
                </div>
            </div>
        </div>


        <div id="map-container" class="d-flex">
            <div id="map" class="mb-3"></div>

            <div class="mb-3">
                <div id="configPanel" class="form-control config-panel" style="height:520px;">
                    <h3 for="configPanel" class="form-label">
                        <img src="image/collect.png" width="36" height="36" class="rounded me-2" alt="...">

                        Information Location
                    </h3>

                    <div class="input-group mb-3">
                        <input type="text" id="palletIdInput" class="form-control" placeholder="Enter pallet ID"
                            aria-label="Pallet ID" aria-describedby="basic-addon1">
                        <button id="fetchDataButton" class="btn btn-warning">Search Data</button>
                    </div>
                    <table class="table table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">ID</th>
                                <th scope="col">ROOM</th>
                            </tr>
                        </thead>
                        <tbody id="configTableBody">

                            <!-- ตารางรอรับค่าจาก SQL -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


    <div class="container">

        <div class="row d-flex justify-content-end ">
            <div class="mt-3 col-6 me-auto p-2">
                <h1><i class="fa fa-info-circle" aria-hidden="true"></i> Pallet Information</h1>
            </div>

        </div>

        <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="ResultTable">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Pallet ID</th>
                    <th class="text-center">Module ID</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>



    <script src="js\BuildingMark\MarkLocation.js"></script>
    <script src="js\BuildingMark\PictureMove.js"></script>
    <script type="text/javascript" src="js/QRCodeGen/jquery.min.js"></script>
    <script type="text/javascript" src="js/QRCodeGen/qrcode.js"></script>

    <script src="http://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script type="text/javascript">

        function genqr() {


            $(".toast").toast('show');
            $('#qrcode').html(' <div id="qrcode">  \
                                <div id="lb_detial"\
                                    style="padding-left:5px; margin-top:1px; background-color: black;color:white; ">\
                                    <h4 id="labelWithText"></h4>\
                                </div>\
                            </div>');
            makeCode();
        }

        document.getElementById('download').onclick = function () {
            html2canvas(document.querySelector("#qrcode_u")).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'myDivImage.png';
                link.click();
            });
        };

        function makeCode() {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 195,
                height: 195
            });

            var elText = document.getElementById("inputID");

            if (!elText.value) {
                // alert("Input a text");
                elText.focus();
                return;
            }
            let labelElement = document.getElementById("labelWithText");
            labelElement.innerText = elText.value;
            qrcode.makeCode(elText.value);
        }
    </script>

</body>

</html>