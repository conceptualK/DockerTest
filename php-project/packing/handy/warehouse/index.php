<?php header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/grid.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body>

    <div class="row">
        <div class="column text-center" style="background-color:#fff;">
            <img src="1.jpeg" alt="" srcset="" width="100%" height="100%">

        </div>
        <div class="column" style="background-color:#bbb;">
            <h2><strong>Amita Thailand</strong></h2>

        </div>
    </div>
    </br>
    <div id="TimeStamp" style="position: absolute; left: 10px; top:25%">TimeStamp</div>
    <div class="row">
        <div class="row"></br></br>
            <form id="formin">
                <h2><strong> Warehouse store..</strong><img src="2.jpg" alt="" srcset="" width="70px" height="50px" />
                </h2>
                <!-- <form action="" method="post"> -->
                <span style="font-size: 14px;"><strong> order id</strong></span> </br>
                <input class="txt-less" id="ordertxt" type="text" placeholder="scan order_id  here !"
                    onkeypress="return br_order(event);" />
                </br>
                <span style="font-size: 14px;"><strong> pallet number</strong></span> </br>
                <input class="txt-less" id="pallettxt" type="text" placeholder="scan pallet here !"
                    onkeypress="return br_pallet(event)" />
                </br>
                <span style="font-size: 14px;"><strong> location</strong></span> </br>
                <input class="txt-less" id="locationtxt" type="text" style="margin-bottom:8px;"
                    placeholder="choose location here !" />
                <button type="button" id="save" class="txt-less text-center btn-send " onclick="send_sv()">Save</button>
                <!-- </form> -->

            </form>
            </br>
        </div>



        <div id="status" class="row text-center" style=" background-color:#FFC107; color: white;">
            <h5>waiting action</h5>
        </div>
        <div id="status_connect" class="row text-center" style="color: white; text-align: center;"></div>
    </div>



    <script>

var endpoint = "http://10.19.5.106/packing/handy/warehouse/";

function checkConnection() {
    var xhr = new XMLHttpRequest();
    

    xhr.open("HEAD", endpoint, true); // ส่งคำขอ ไปที่ URL
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
          


                document.getElementById('save').disabled = false;
                $("#status_connect").html(
                    '<span class="row text-center" style="background-Color:#2a2a2a; color: #1de101;"></span>');

                return;

            } else {
       
                document.getElementById('save').disabled = true;

                $("#status_connect").html(
                    '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
                    "Lost internet connection" + '</span>');
                }

                setTimeout(checkConnection, 5000);
        }
    };
    xhr.onerror = function() {

        document.getElementById('save').disabled = true;
        $("#status_connect").html(
            '<span class="row text-center" style="background-Color:#2a2a2a; color: red;"> ' +
            "Failed to connect to the server!" + '</span>');

            setTimeout(checkConnection, 5000);
    };
    xhr.send(); // ส่งคำขอ
    
}

// checkConnection();





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
                        $("#status").html(
                            '<div id="status" class="row text-center" style=" background-color:#FFC107; color: #0b8d00;"><h5>' +
                            properties[1] + ", " + properties[2] + '</h5></div>');
                        setInterval(short_func, 5000);

                    } else if (properties[0] === "00001") {
                        reset()
                        $("#status").html(
                            '<div id="status" class="row text-center" style=" background-color:#FFC107; color: #f50202;"><h5>' +
                            properties[1] + '</h5></div>');
                        setInterval(short_func, 5000);
                    } else {
                        reset()
                        $("#status").html(
                            '<div id="status" class="row text-center" style=" background-color:#FFC107; color: #f50202;"><h5>Data not found</h5></div>'
                            );
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