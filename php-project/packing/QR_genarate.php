<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <script type="text/javascript" src="js/QRCodeGen/jquery.min.js"></script>
    <script type="text/javascript" src="js/QRCodeGen/qrcode.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-7">

            <input class="form-control" style="width:100%; height:38px;" id="text" type="text"
                value="WH-10GR04" /><br />
        </div>

        <div class="col-5 ">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success btn-mb " id="download" onclick="">Download
                    Image</button>
            </div>
        </div>
    </div>



    <div class=" row justify-content-center center">
        <div id="qrcode_u" class="col-6 border" style="padding-top:15px; padding-bottom:15px; width: 221px;">
            <div id="qrcode">
                <div id="lb_detial" style="padding-left:5px; margin-top:1px; background-color: black;color:white; ">
                    <h4 id="labelWithText">WH-10GR04</h4>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        document.getElementById('download').onclick = function () {
            html2canvas(document.querySelector("#qrcode_u")).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'myDivImage.png';
                link.click();
            });
        };

        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 195,
            height: 195
        });

        function makeCode() {
            var elText = document.getElementById("text");

            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }
            let labelElement = document.getElementById("labelWithText");
            labelElement.innerText = elText.value;
            qrcode.makeCode(elText.value);
        }

        makeCode();

        $("#text").
            on("blur", function () {
                makeCode();
            }).
            on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });


        function QRdetial() {
            $("#QRModal").modal('show');
        }
        function closeDialog() {
            $("#QRModal").modal('hide');
        }
    </script>
</body>

</html>