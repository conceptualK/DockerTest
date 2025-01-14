<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pallet Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <header class="p-3 mb-3 border-bottom" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <img src="\packing/image/logo.png" style="width: 10%; height: 9%; margin-left: -4%; margin-right: 3%;">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <!-- <li><a href="\packing/home.php" class="nav-link px-2 link-body-emphasis">Home</a></li> -->
                    <li><a href="\packing/Webpage/productionOrder/formProductionOrder.php"
                            class="nav-link px-2 link-secondary">Production Order</a></li>
                    <!-- <a href="#" class="d-block  text-decoration-none dropdown-toggle nav-link px-2 link-secondary "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                            class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
                            <path d="M16 4.5a4.5 4.5 0 0 1-1.703 3.526L13 5l2.959-1.11q.04.3.041.61" />
                            <path
                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.5 4.5 0 0 0 11.5 9m-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376M3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                        </svg>
                        Config
                    </a>
                    <ul class="dropdown-menu shadow w-220px" data-bs-theme="dark">
                        <li><a class="dropdown-item d-flex"
                                href="\packing/Webpage/configOrder/category_config/category.php">Category config</a>
                        </li>
                        <li><a class="dropdown-item d-flex"
                                href="\packing/Webpage/configOrder/invoice_config/invoice.php">Invoice config</a></li>
                        <li><a class="dropdown-item d-flex"
                                href="\packing/Webpage/configOrder/item_description_config/item_description.php">Item
                                description config</a></li>
                        <li><a class="dropdown-item d-flex"
                                href="\packing/Webpage/configOrder/packing_config/packing.php">Packing config</a></li>
                        <li><a class="dropdown-item d-flex"
                                href="\packing/Webpage/configOrder/Vendor_config/vendor.php">Vendor config</a></li>
                    </ul> -->
                    <li><a href="/packing/home.php" class="nav-link px-2 link-secondary">Pallet Position</a></li>
                    <li><a href="/packing/Report/Pallet/index.php" class="nav-link px-2 link-secondary">Pallet
                            Report</a></li>
                    <li><a href="/packing/Report/Location/index.php" class="nav-link px-2 link-body-emphasis">Location
                            Report</a></li>

                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="\packing/image/p.jpg" alt="Admin" width="32" height="32" class="rounded-circle"
                            style=" color: darkslategrey;">
                        <span id="username-display"></span>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#" onclick="signout()">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</head>

<body>
    <?php include('modal_pl.php');?>

    <div class="mt-5 row justify-content-center  mx-md-n5">
        <h1 class="text-center">Location Informations</h1>
        <div class="mt-5 col-6 ">
            <div class="row">
                <div class="row">
                    <div class="col-3 ">
                        <h3>Area Detail</h3>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <select class="form-control" onchange="select_f()" id="floor_sel">
                                <option selected>Select Informations</option>
                                <option value="10">1.0Floor </option>
                                <option value="15">1.5Floor</option>
                                <option value="20">2.0Floor</option>
                                <option value="25">2.5Floor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="card_o">
                    <div class="p-3 border " style="height:540px;"></div>
                </div>
            </div>
        </div>

        <div class="mt-5 col-5 ">
            <div class="row">
                <div class=" ">
                    <div class="row">
                        <div class="col-12 " id="t_count">
                         <h3><img src="../../image/pallet.png" width="48" height="48" alt=""> Pallet in Location :(0) </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="pallet_o" >                     
                            <div class="p-3 border" style="height:545px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script>
    //name user || user signout
    const data = localStorage.getItem('username');
        
        if (data == null) { 
            window.location.href = "/packing/index.php";
        } else {
            document.getElementById('username-display').textContent = data.toString();
        }
        function signout() {
            localStorage.removeItem('username');
            window.location.reload(); 
        }


    function query_id(location_id) {

        // console.log(location_id);

        jque = {
            "action": "pallet_fl",
            "floor": "",
            "location_id": location_id
        };
        $.ajax({
            type: "POST",
            url: 'http://10.19.5.106:5001/api/fReportLocation',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(jque),
            success: function (data) {
                var row = data["Message"];
                console.log(row);

                var count = Object.keys(row).length;
                const ZoneID = [''];
                for (i = 0; i < count; i++) {
                    ZoneID.push(row[i]["pallet_id"]);
                }

                const orderID = [''];
                for (i = 0; i < count; i++) {
                    orderID.push(row[i]["order_id"]);
                }

                const flag  = [''];
                for (i = 0; i < count; i++) {
                    flag.push(row[i]["flag"]);
                }

                const f  = [''];
                for (i = 0; i < count; i++) {
                    f.push(row[i]["f"]);
                }
                
         

                $('#t_count').html(
                    `
                    <div class="col-12 mb-2" id="t_count">
                        <h3><img src="../../image/pallet.png" width="48" height="48" alt=""> Pallet in Location : (${count}) </h3>
                    </div>
                     `
                )

                const formData = new FormData();
                formData.append('myArray', JSON.stringify(ZoneID));
                formData.append('orderID', JSON.stringify(orderID));
                formData.append('flag', JSON.stringify(flag));
                formData.append('f', JSON.stringify(f));


                fetch('pallet_o.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        $('#pallet_o').html(data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });


            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#pallet_o').html(
                                        `<div class="p-3 border " style="height:530px;">

                    <img src="../../image/emptystate.gif" style="color: #1E1E1E; display: block; margin-left: auto; margin-right: auto; width: 40%; height: auto; ">
                    <h1 class='text-center'>This Area empty</h1>
                     </div>
                    `
                );
            }
        });

    }

    function select_f() {

        $('#drawing').html('');

        var floor = $('#floor_sel').find(":selected").val();
        // console.log(floor);
        jque = {
            "action": "get_fl",
            "floor": floor,
            "location_id": ""

        };
        $.ajax({
            type: "POST",
            url: 'http://10.19.5.106:5001/api/fReportLocation',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(jque),
            success: function (data) {
                var row = data["Message"];

                var count = Object.keys(row).length;
                const ZoneID = [''];
                for (i = 0; i < count; i++) {
                    ZoneID.push(row[i]["id"]);
                }

                const formData = new FormData();
                formData.append('myArray', JSON.stringify(ZoneID));

                fetch('card_o.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        $('#card_o').html(data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#card_o').html(
                    `<div class="p-3 border bg-light" style="height:540px;">
                    <img src="../../image/emptystate.gif" style="color: #1E1E1E; display: block; margin-left: auto; margin-right: auto; width: 50%; height: auto; ">
                    <h1 class='text-center'>This Area not create ID</h1>
                    </div>
                    `
                );
            }
        });
    }

</script>

</html>