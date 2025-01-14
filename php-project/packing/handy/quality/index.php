<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amita Scaner QR</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="sheets.css">
</head>

<body>

    <img id="logo" src="logo.png" alt="logo amita" width="30%" height="30%">
    <div class="headAmita">
        <strong class="amita">Amita Technology</strong></p>
        <p class="Thailand">(Thailand) Co., Ltd.</p>
    </div>
    <img class="imgmain" src="qc1.png">

    <div class="row" id="Row">
        <div class="row"></br></br>
            <h3 style=" color: blue; border: 1px solid;text-align: center; background-color: yellow;">Wellcome Quality
                Contorl</h3>
            <form id="quality_form">

                <lable><strong>Order ID</strong></lable>
                </br>
                <input id="order-id" name="order-id" class="txt-less1" type="text" onkeypress="return br_order(event);">
                </br>
                <lable><strong>Pallet ID</strong></lable>
                </br>
                <input id="pallet-id" name="pallet-id" class="txt-less1" type="text"
                    onkeypress="return br_pallet(event);">
                <br>
                <lable><strong>Module ID</strong></lable>
                </br>
                <input id="module-id" name="module-id" class="txt-less1" type="text">
                <lable><strong>Defect</strong></lable>
                </br>
                <input id="br-defect" name="br-defect" class="txt-less2" type="text">

            </form>
            <button type="button" id="submit_ok" class="button-center" onclick="send_ok()">OK</button>
            <button type="button" id="submit_ng" class="button-center" onclick="send_ng()">NG</button>

            <div id="status" class="row text-center" style="color: white; text-align: center;"></div>
            <div id="status_connect" class="row text-center" style="color: white; text-align: center;"></div>

            <br>
        </div>
    </div>
    </div>
</body>

</html>



<script>
    var endpoint = "http://10.19.5.106/packing/handy/quality/";

    function text_off() {
        $("#status_connect").html(
            '<span class="row text-center" style="background-Color:#2a2a2a; color: #1de101;"></span>');
    }

    function checkConnection() {
        var xhr = new XMLHttpRequest();
        xhr.open("HEAD", endpoint, true); // ส่งคำขอ ไปที่ URL
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {

       
                    document.getElementById('submit_ok').disabled = false;
                    document.getElementById('submit_ng').disabled = false;

                    $("#status_connect").html(
                        '<span class="row text-center" style="background-Color:#2a2a2a; color: #1de101;"></span>');

                  
                } else {

                    document.getElementById('submit_ok').disabled = true;
                    document.getElementById('submit_ng').disabled = true;
                    $("#status_connect").html(
                        '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
                        "Lost internet connection " + xhr.status+ '</span>');

                }
            }

        };
        xhr.onerror = function() {

            document.getElementById('submit_ok').disabled = true;
            document.getElementById('submit_ng').disabled = true;
            $("#status_connect").html(
                '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
                "Failed to connect to the server!" + '</span>');
        };
        xhr.send(); // ส่งคำขอ

        setTimeout(checkConnection, 10000);
        
    }
    
    checkConnection()
    



    function reset() {
        document.getElementById('quality_form').reset();
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

                    document.getElementById('status').style.color = '#ffffff';
                    document.getElementById('status').style.backgroundColor = 'rgb(0, 110, 110)';


                    var properties = response.split(',');

                    if (properties[0] === "00000") {
                        reset()
                        $("#status").html(
                            '<span class="row text-center" style="background-Color:#2a2a2a; color: #1de101;"> ' +
                            properties[1] + '</span>');
                        setInterval(short_func, 5000);

                    } else {
                        reset()
                        $("#status").html(
                            '<span class="row text-center" style="background-Color:#2a2a2a; color: #ff2d2d;"> ' +
                            properties[1] + '</span>');
                        setInterval(short_func, 5000);
                    }
                },
                error: function(xhr, status, error) {



                    // $("#status").html(
                    //     '<div class="row text-center" style="background-Color:#2a2a2a; color: #f10000;">Error: ' +
                    //     error + '</div>');
                    // setInterval(short_func, 10000);
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