<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <script src="js\jquery-latest.min.js"></script>


    <style>
    .txt-less1 {
        width: 99%;
        margin-left: -1%;
        font-size: 200%;
        text-align: center;
        background-color: rgb(255, 255, 255);
        color: blue;
        margin-bottom: -1%;
        margin-top: 1%;

    }

    .txt-less2 {
        width: 99%;
        margin-left: -1%;
        font-size: 100%;
        text-align: center;
        background-color: rgb(255, 255, 255);
        color: blue;
        margin-bottom: -1%;
        margin-top: 1%;

    }


    .headAmita {
        color: #d6dbdf;
        margin-bottom: -16%;
        border: 2px solid;
        border-color: #34495e;
        background-color: #5d6d7e;
        padding-top: 6%;

    }


    html {
        background-color: #34495e;
    }
    </style>

</head>

<body>


    <div class="headAmita">
        <img id="logo" src="logo.png" alt="logo amita" width="40%" height="40%"
            style="margin-top: -5%; margin-left:3%; margin-bottom:5%;">
        <p style=" margin-top: -5%; margin-left: 5%;"><strong>Amita Thailand</strong></p>
    </div>
    <img style="position: relative; width: 64%; height: 64%; left:40%; top:-18%;" src="images.png">

    <div class="row" id="Row">

        <div style="background-color:#f9e79f; text-align: center;  margin-bottom:-8%; margin-top:-30%;"><strong>Delivery
                Order</strong></div>
        <div class="row"></br></br>


            <!-- form order id -->
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
        <!-- end form -->


        <button type="button"
            style="margin-bottom: 5%; margin-top:-5%; margin-left: 30%;height: 40%;width: 90px;border: 1px solid; font-weight:bold; padding:10px;"
            id="btn" onclick="send_sv()">Save</button>

        <!-- display status -->
        <div id="status" class="row text-center" style="color: white; text-align: center;"></div>
        <div id="status_connect" class="row text-center" style="color: white; text-align: center;"></div>
        <br>
    </div>
    </div>
    </div>


</body>

</html>







<script>

var endpoint = "http://10.19.5.106/packing/handy/delivery/";

function checkConnection() {
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", endpoint, true); // ส่งคำขอ ไปที่ URL
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('btn').disabled = false;
            
                $("#status_connect").html(
                    '<span class="row text-center" style="background-Color:#2a2a2a; color: #1de101;"></span>');

            } else {
                document.getElementById('btn').disabled = true;
                $("#status_connect").html(
                    '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
                    "Lost internet connection" + '</span>');
            }
        }
    };
    xhr.onerror = function() {

        document.getElementById('btn').disabled = true;
        $("#status_connect").html(
            '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
            "Failed to connect to the server!" + '</span>');
    };
    xhr.send(); // ส่งคำขอ
    setTimeout(checkConnection, 10000);
    
}

checkConnection();






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
             
                checkConnection(); //check connect
            }
        });

    } else if (order_id == "") {
        alert("คุณยังไม่ได้กรอก Order ID !!")

    } else if (pallet_id == "") {
        alert("คุณยังไม่ได้กรอก Pallet ID !!")
    }
}
</script>