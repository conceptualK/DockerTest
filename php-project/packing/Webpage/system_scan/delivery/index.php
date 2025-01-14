<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <script src="js\jquery-latest.min.js"></script>


    <style>
        body {
            background-image: url('delivery.jpg');

            background-size: cover;

            background-position: center;

            background-repeat: no-repeat;

            background-attachment: fixed;

        }


        .form {

            background-color: #f5f5f5;

        }

        .form-control {
            font-size: 16px;
        }

        .custom-heading {
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 6px solid #f0bd00;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #343a40;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);

        }
    </style>

</head>

<body>
    <?php include '../menu_head.php' ?>

    <!-- <div class="headAmita">
        <img id="logo" src="logo.png" alt="logo amita" width="40%" height="40%"
            style="margin-top: -5%; margin-left:3%; margin-bottom:5%;">
        <p style=" margin-top: -5%; margin-left: 5%;"><strong>Amita Thailand</strong></p>
    </div>
    <img style="position: relative; width: 64%; height: 64%; left:40%; top:-18%;" src="images.png">

    <div class="row" id="Row">

        <div style="background-color:#f9e79f; text-align: center;  margin-bottom:-8%; margin-top:-30%;"><strong>Delivery
                Order</strong></div>
        <div class="row"></br></br>



            <form id="delivery_form">

                <span style="background-color:#ffe000;">
                    <lable><strong>Order ID</strong></lable>
                </span>
                </br>
                <input id="order-id" name="order-id" class="txt-less1" type="text" onkeypress="return br_order(event);">
                </br>
                <span style="background-color:#ffe000;">
                    <lable><strong>Pallet ID</strong></lable>
                </span>
                </br>
                <input id="pallet-id" name="pallet-id" class="txt-less1" type="text"
                    onkeypress="return br_pallet(event);">
        </div>
        </form>



        <button type="button"
            style="margin-bottom: 5%; margin-top:-5%; margin-left: 30%;height: 20%;width: 90px;border: 1px solid; font-weight:bold;"
            id="btn" onclick="send_sv()">Save</button>

    
        <div id="status" class="row text-center" style="color: white; text-align: center;"></div>

        <br>
    </div>
    </div>
    </div> -->




    <div id="status" style="position: fixed"></div>
    <div style="margin-top: 10%;"></div>
    <div class="container">

        <div class="row justify-content-center">

            <div class=" col-md-8 col-lg-6" style="width: 70%;">

                <form class="form p-4  rounded shadow" id="delivery_form">
                    <h4 class="custom-heading">Delivery</h4>
                    <div class="mb-3">
                        <label for="order">Order ID</label>
                        <input type="text" style="padding: 10px;" class="form-control" id="order-id" placeholder="scan order_id  here !" onkeypress="return br_order(event);">

                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="pallet">Pallet ID</label>
                        <input type="text" style="padding: 10px;" class="form-control" id="pallet-id" placeholder="scan pallet  here !" onkeypress="return br_pallet(event);">

                    </div>
                    <br>
                    <hr class="mb-4">
                    <div class="container text-center">
                        <div class="">
                            <button class="btn btn-success " style="padding: 14px; width:40%; margin:10px;" type="button" onclick="send_sv()">OK</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>










</body>

</html>







<script>
    function reset() {
        document.getElementById('delivery_form').reset();
    }


    function short_func() {
        $("#status").html('<div></div>');
    }

    var br_order_order_id = "";

    function br_order(e) {

        var check_order = $('#order-id').val();
        var check_pallet = $('#pallet-id').val();

        var order_value = document.getElementById("order-id");
        var selectedValue = order_value.value;


        if (event.keyCode == 13) {

            if (check_order == "" || check_pallet == "") {

                var split = selectedValue.split(',');
                var order_id = split[0];
                var pallet_id = split[1];
                br_order_order_id = order_id;

                $('#order-id').val(order_id);
                $('#pallet-id').val(pallet_id);


            } else {

                var newText = selectedValue.split(br_order_order_id).join(""); // ลบคำใน br_order_order_id
                var split_new = newText.split(',');
                var order_id = split_new[0];
                var pallet_id = split_new[1];
                br_order_order_id = order_id;


                $('#order-id').val(order_id);
                $('#pallet-id').val(pallet_id);
            }


        }

    }


    var br_pallet_order_id = "";

    function br_pallet(e) {
        var check_order = $('#order-id').val();
        var check_pallet = $('#pallet-id').val();

        var order_value = document.getElementById("pallet-id");
        var selectedValue = order_value.value;

        if (event.keyCode == 13) {
            if (check_order == "" || check_pallet == "") {

                var split = selectedValue.split(',');
                var order_id = split[0];
                var pallet_id = split[1];
                br_pallet_order_id = pallet_id;

                $('#order-id').val(order_id);
                $('#pallet-id').val(pallet_id);

            } else {

                var newText = selectedValue.split(br_pallet_order_id).join(""); // ลบคำใน br_pallet_order_id
                var split_new = newText.split(',');
                var order_id = split_new[0];
                var pallet_id = split_new[1];
                br_pallet_order_id = pallet_id;


                $('#order-id').val(order_id);
                $('#pallet-id').val(pallet_id);
            }

        }


    }

    function send_sv() {
        order_id = $('#order-id').val()
        pallet_id = $('#pallet-id').val()

        if (order_id && pallet_id) {
            $.ajax({
                type: "POST",
                dataType: 'text',
                url: "getJson.php",
                data: {
                    pallet_id: pallet_id,
                    order_id: order_id

                },
                success: function(response) {

                    var properties = response.split(',');

                    if (properties[0] === "00000") {
                        reset()
                        $('.alert').remove();
                            $('<div class="w-25 alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%; margin-top:-5%;">' +
                                properties[1] + '</div>').appendTo('#status');

                            setTimeout(function() {
                                $(".alert").fadeOut(4000, function() {
                                    $(this).remove();
                                });
                            });

                    } else {
                        reset()
                        $('.alert').remove();
                            $('<div class="w-25 alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%; margin-top:3%;">' +
                                properties[1] + '</div>').appendTo('#status');

                            setTimeout(function() {
                                $(".alert").fadeOut(4000, function() {
                                    $(this).remove();
                                });
                            });

                    }
                },
                error: function(xhr, status, error) {
                    reset()
                    $('.alert').remove();
                            $('<div class="w-25 alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%; margin-top:3%;">' +
                               error + '</div>').appendTo('#status');

                            setTimeout(function() {
                                $(".alert").fadeOut(4000, function() {
                                    $(this).remove();
                                });
                            });

                }
            });

        } else if (order_id == "") {
            alert("คุณยังไม่ได้กรอก Order ID !!")

        } else if (pallet_id == "") {
            alert("คุณยังไม่ได้กรอก Pallet ID !!")
        }
    }
</script>