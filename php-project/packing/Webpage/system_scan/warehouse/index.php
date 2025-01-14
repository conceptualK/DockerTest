<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse scan QC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>


    <style>
        body {
            background-image: url('warehouse.png');

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
            border-left: 6px solid #2a8c9a;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #343a40;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);

        }

        #TimeStamp {
            position: absolute;
            left: 20px;
            top: 10%;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            color: #343a40;
            font-weight: bold;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            border-top: 5px solid #84889f;
            border-bottom: 5px solid #84889f;
            

        }
    </style>
</head>

<body>
    <?php include '../menu_head.php'; ?>

    <div id="status" style="position: fixed"></div>
    <div style="margin-top: 10%;"></div>
    <div id="TimeStamp" >TimeStamp</div>
    <div class="container">

        <div class="row justify-content-center">

            <div class=" col-md-8 col-lg-6" style="width: 70%;">

                <form class="form p-4  rounded shadow" id="formin">
                    <h4 class="custom-heading">Warehouse</h4>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="order">Order ID</label>
                            <input type="text" style="padding: 10px;" class="form-control" id="ordertxt" placeholder="scan order_id  here !" onkeypress="return br_order(event);">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pallet">Pallet ID</label>
                            <input type="text" style="padding: 10px;" class="form-control" id="pallettxt" placeholder="scan pallet  here !" onkeypress="return br_pallet(event);">

                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="location">location</label>
                        <input type="text" style="padding: 10px;" class="form-control" id="locationtxt" placeholder="choose location here !">
                    </div>
                    <br>



                    <hr class="mb-4">
                    <div class="container text-center">
                        <div class="">
                            <button class="btn btn-success " style="padding: 14px; width:40%; margin:10px;" type="button" id="submit_ok" onclick="send_sv()">OK</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>





    <script>
        function reset() {
            document.getElementById('formin').reset();
        }


        var br_order_order_id = "";

        function br_order(e) {

            var check_order = $('#ordertxt').val();
            var check_pallet = $('#pallettxt').val();


            var order_value = document.getElementById("ordertxt");
            var selectedValue = order_value.value;

            if (event.keyCode == 13) {

                if (check_order == "" || check_pallet == "") {

                    var split = selectedValue.split(',');
                    var order_id = split[0];
                    var pallet_id = split[1];
                    br_order_order_id = order_id;

                    $('#ordertxt').val(order_id);
                    $('#pallettxt').val(pallet_id);


                } else {

                    var newText = selectedValue.split(br_order_order_id).join(""); // ลบคำใน br_order_order_id
                    var split_new = newText.split(',');
                    var order_id = split_new[0];
                    var pallet_id = split_new[1];
                    br_order_order_id = order_id;


                    $('#ordertxt').val(order_id);
                    $('#pallettxt').val(pallet_id);
                }
            }


        }


        var br_pallet_order_id = "";

        function br_pallet(e) {
            var check_order = $('#ordertxt').val();
            var check_pallet = $('#pallettxt').val();

            var order_value = document.getElementById("pallettxt");
            var selectedValue = order_value.value;

            if (event.keyCode == 13) {
                if (check_order == "" || check_pallet == "") {

                    var split = selectedValue.split(',');
                    var order_id = split[0];
                    var pallet_id = split[1];
                    br_pallet_order_id = pallet_id;

                    $('#ordertxt').val(order_id);
                    $('#pallettxt').val(pallet_id);

                } else {

                    var newText = selectedValue.split(br_pallet_order_id).join(""); // ลบคำใน br_pallet_order_id
                    var split_new = newText.split(',');
                    var order_id = split_new[0];
                    var pallet_id = split_new[1];
                    br_pallet_order_id = pallet_id;


                    $('#ordertxt').val(order_id);
                    $('#pallettxt').val(pallet_id);
                }

            }


        }


        function send_sv() {

            var pallet_id = $('#pallettxt').val();
            var location = $('#locationtxt').val();
            var order_id = $('#ordertxt').val();
            //console.log(pallet_id + location + order_id)
            if (pallet_id && location && order_id) {

                $.ajax({
                    type: "POST",
                    dataType: 'text',
                    url: "getJson.php",
                    data: {
                        location: location,
                        pallet_id: pallet_id,
                        order_id: order_id
                    },
                    success: function(response) {
                        document.getElementById('status').style.color = '#ffffff';
                        document.getElementById('status').style.backgroundColor = '#198754';


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

                        } else if (properties[0] === "00001") {
                            reset()

                            $('.alert').remove();

                            $('<div class="w-25 alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%; margin-top:-5%;">' +
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
                                'not found data.' + '</div>').appendTo('#status');


                            setTimeout(function() {
                                $(".alert").fadeOut(4000, function() {
                                    $(this).remove();
                                });
                            });
                        }

                    },
                    error: function(xhr, status, error) {
                        $("#status").html('Error: ' + error);
                        $('.alert').remove();
                        $('<div class="w-25 alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%; margin-top:-5%;">' +
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

            } else if (location == "") {
                alert("คุณยังไม่ได้กรอก Location !!")

            }
        }

        function short_func() {
            $("#status").html('<div id="status" class="row text-center" style=" background-color:#FFC107; color: white;">\
                                        <h5>waiting action</h5>\
                               </div>');
        }




        function callMe() {
            $.ajax({
                type: "POST",
                url: "timestamp.php",
                data: "id=1",
                success: function(response) {
                    $("#TimeStamp").html(response);
                }
            });
        }
        setInterval(callMe, 1000);
    </script>

</body>

</html>