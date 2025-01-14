<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Scaner QR</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>


</head>
<style>
    body {
        background-image: url('quality.jpg');

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
        border-left: 6px solid #75eac7;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: #343a40;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);

    }
</style>

<body>

    <?php include '../menu_head.php'; ?>




    <div id="status" style="position: fixed"></div>
    <div style="margin-top: 10%;"></div>
    <div class="container">

        <div class="row justify-content-center">

            <div class=" col-md-8 col-lg-6" style="width: 70%;">

                <form class="form p-4  rounded shadow" id="quality_form">
                    <h4 class="custom-heading">Quality control</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="order">Order ID</label>
                            <input type="text" style="padding: 10px;" class="form-control" id="order-id" name="order-id" placeholder="plase enter order id" onkeypress="return br_order(event);">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pallet">Pallet ID</label>
                            <input type="text" style="padding: 10px;" class="form-control" id="pallet-id" name="pallet-id" placeholder="plase enter pallet id" onkeypress="return br_pallet(event);">

                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="model">Model</label>
                        <input type="text" style="padding: 10px;" class="form-control" id="module-id" name="module-id" placeholder="plase enter model id">
                    </div>
                    <br>
                    <div class="mb-4">
                        <label for="defect">Defect</label>
                        <input type="text" style="padding: 10px;" class="form-control" id="br-defect" name="br-defect" placeholder="">
                    </div>



                    <hr class="mb-4">
                    <div class="container text-center">
                        <div class="">
                            <button class="btn btn-success " style="padding: 14px; width:40%; margin:10px;" type="button" id="submit_ok" onclick="send_ok()">OK</button>
                            <button class="btn btn-danger " style="padding: 14px; width:40%; margin:10px;" type="button" id="submit_ng" onclick="send_ng()">NG</button>
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
        document.getElementById('quality_form').reset();
    }

    function short_func() {
        $("#status").html('');
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




    //button status ok|ng
    var status = "";

    function send_ok() {
        status = "OK";
        send_sv()
    }

    function send_ng() {
        status = "NG";
        send_sv()
    }
    ///////////////////////////////////

    function send_sv() {

        var order_id = $('#order-id').val();
        var pallet_id = $('#pallet-id').val();
        var module_id = $('#module-id').val();
        var br_defect = $('#br-defect').val();


        if (order_id && pallet_id && module_id) {

            $.ajax({
                type: "POST",
                dataType: 'text',
                url: "getJson.php",
                data: {
                    order_id: order_id,
                    pallet_id: pallet_id,
                    module_id: module_id,
                    judge: status,
                    defect_code: br_defect
                },
                success: function(response) {

                    var properties = response.split(',');

                    if (properties[0] === "00000") {
                        reset()

                        $('.alert').remove();
                        $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%;">' +
                            properties[1] + '</div>').appendTo('#status');

                        setTimeout(function() {
                            $(".alert").fadeOut(4000, function() {
                                $(this).remove();
                            });
                        });

                    } else {
                        reset()
                        

                        $('.alert').remove();

                        $(".alert").fadeIn(1000)
                        $('<div class="alert alert-danger d-flex align-items-center w-25" role="alert" style="position: fixed; z-index: 1; margin-left:74%;">' +
                            'not found data.' + '</div>').appendTo('#status');

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
                    $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:74%;">' +
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

        } else if (module_id == "") {
            alert("คุณยังไม่ได้กรอก Model ID !!")

        }

    }
</script>