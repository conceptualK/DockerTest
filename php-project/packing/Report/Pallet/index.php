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
                    <li><a href="/packing/Report/Pallet/index.php" class="nav-link px-2 link-body-emphasis">Pallet Report</a></li>
                    <li><a href="/packing/Report/Location/index.php" class="nav-link px-2 link-secondary">Location Report</a></li>

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



<?php include('info_modal.php');?>
    <div class="mt-5 row justify-content-center">
        <h1 class="text-center">Pallet Informations</h1>
        <div class="col-10">
            <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="example">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Order</th>
                        <th class="text-center">Pallet</th>
                        <th class="text-center" style="width:5%">Qty</th>
                        <th class="text-center" >MODULE_TYPE</th>
                        <th class="text-center" >DELIVERY</th>
                        <th class="text-center"  style="width:15%">Status</th>
                        <th class="text-center">Pack Date</th>
                        <th class="text-center">UPDATETIME</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>


<script>

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


    $.getJSON('http://10.19.5.106:5001/api/fReportGenerate', function (response) {
        var item = response['Message']
        // console.log(response);
        $('#example').DataTable({

            data: item,
            columns: [
                { data: 'recipe_id' },
                { data: 'pallet_id' },
                { data: 'qty' },
                { data: 'module_type' },
                { data: 'delivery_to' },
                {
                    data: null,
                    render: function (row) {

                        if (row.flag == "Delete") {var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else if (row.flag == "NG") { var infoButton = `<span style="color:#fff; "> ${row.flag}</span>`; }
                        else if (row.flag == "Pack Already") { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else if (row.flag == "Warehouse Collect") { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else if (row.flag == "Delivery Finished") { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else if (row.flag == "QC Sampling") { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else if (row.flag == "Replace") { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }
                        else { var infoButton = `<span style="color:#fff;"> ${row.flag}</span>`; }

                        return infoButton;
                    }

                },
                { data: 'packdate' },
                { data: 'updatetime' },
                {
                    data: null,
                    render: function (row) {
                        var infoButton = `<button onclick="trigger_md('${row.recipe_id}','${row.pallet_id}','${row.flag}','${row.f}','D')" class="btn btn-warning info-btn btn-sm">
                            <i class="fa fa-search" aria-hidden="true"></i> 
                            </button>`;

                        // var printButton = `<button class="btn btn-secondary print-btn btn-sm" data-id="' + row.order_id + '">
                        //     <i class="fa fa-print" aria-hidden="true"></i>
                        //     </button>`;
                        var printButton = '';
                        return infoButton + '' + printButton + '\n';
                    }
                }
            ],
            createdRow: function (row, data, dataIndex) {
                // Set background color based on flag value
                let flagValue = data.flag;

                if (flagValue === 'Delete') {
                    $(row).find('td').eq(5).css('background-color', '#ff0000'); // Dark background
                } else if (flagValue === 'NG') {
                    $(row).find('td').eq(5).css('background-color', '#333'); // Red
                } else if (flagValue === 'Pack Already') {
                    $(row).find('td').eq(5).css('background-color', '#198754'); // Green
                } else if (flagValue === 'Warehouse Collect') {
                    $(row).find('td').eq(5).css('background-color', '#0D6EFD'); // Blue
                } else if (flagValue === 'Delivery Finished') {
                    $(row).find('td').eq(5).css('background-color', '#D63384'); // Pink
                } else if (flagValue === 'QC Sampling') {
                    $(row).find('td').eq(5).css('background-color', '#0DCAF0'); // Light Blue
                } else if (flagValue === 'Replace') {
                    $(row).find('td').eq(5).css('background-color', '#FFC107'); // Yellow
                } else {
                    $(row).find('td').eq(5).css('background-color', '#000'); // Default to black
                }
            }
        });
    });
</script>

</html>