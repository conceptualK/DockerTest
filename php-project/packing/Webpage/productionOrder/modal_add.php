<form action="" id="form-Order">
    <div class="row">

        <div class="col">
            <label for="recipient-name" class="col-form-label">Production Order no./PO</label>
            <input type="text" class="form-control" id="pd-order" name="pd-order" placeholder="Enter Production Order no./PO">
        </div>
        <br>


    </div>




    <div class="row">
        <div class="col">
            <label for="NO-PO" class="col-form-label">NO./PO</label>
            <input min="1" type="number" class="form-control" id="NO-PO" name="NO" placeholder="Enter NO." oninput="updateOutput()">
        </div>
        <div class="col">
            <label for="invoice" class="col-form-label">Invoice No</label>
            <select class="form-select" id="invoice" name="invoice">
                <option value="">Please enter invoice</option>
            </select>
        </div>


    </div>

    <div class="row">
        <div class="col">
            <label for="category" class="col-form-label">Category</label>
            <select class="form-select" id="category" name="category" oninput="updateOutput()">
                <option value="">Please enter category</option>
            </select>
        </div>
        <div class="col">
            <label for="description" class="col-form-label" style=" margin-right: 17%;">Item Description</label>
            <select class="form-select" id="description" name="description" oninput="updateOutput()">
                <option value="">Please enter item</option>
            </select>
        </div>
        <div class="col">
            <label for="Pack-style" class="col-form-label">Packing style</label>
            <select class="form-select" id="Pack-style" name="Pack-style">
                <option value="">Please enter packing style</option>
            </select>
        </div>
    </div>



    <div class="row">
        <div class="col">
            <label for="delivery-to" class="col-form-label">Delivery to</label>
            <select class="form-select" id="delivery-to" name="delivery-to" oninput="updateOutput()" style="margin-right: 1%;">
                <option value="">Please enter delivery</option>
            </select>
        </div>

        <div class="col">
            <label for="model" class="col-form-label">Model</label>
            <select class="form-select" id="model" name="model">
                <option value="">Please enter model</option>
            </select>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col">
            <label id="ty-model">Production Q'ty '(Module)</label>

            <div class="col border p-3 ">
                <input disabled type="number" min="1" class="form-control " id="production-Qty" name="production-Qty" oninput="updateOutput(), updateauto(), on_pd()">
                </p>
                <label id="display-pallet" style="color:#749ab3;"></label>
                <p></p>

            </div>
        </div>

        <div class="col">

            <label id="ty-model">Cell grade</label>
            <label id="display_status" style="color:#749ab3;"></label>
            <div class="col border p-3">
                <input type="text" disabled class="form-control" id="no_cell">
                </p>
                <div class="col d-flex align-items-center">
                    <select class="form-select" id="cell-grade" name="cell-grade" disabled>
                        <option value="">Please enter cell grade</option>
                    </select>

                    <input type="number" disabled class="form-control w-25" id="num_cell" value="0" min="0" style="margin-left:2%;">
                    <button id="cell_add" type="button" class="btn btn-primary ms-2 " onclick="add_cell()" disabled>add</button>
                    <button id="cell_reset" type="button" class="btn btn-danger ms-2 " onclick="resetform_cell()" disabled>clear</button>
                </div>

            </div>

        </div>


    </div>
    <br>



    <div class="row">


        <div class="col">
            <label for="message-text" class="col-form-label">Remark:</label>
            <textarea type="text" maxlength="1024" class="form-control" id="message-text" name="message-text"></textarea>
        </div>


    </div>
    <br>
    <div class="row">
        <div class="col">
            <label>Issue date</label>
            <input class="form-control w-50" id="party" type="datetime-local" name="partydate" />
        </div>
    </div>
</form>


<script>
  
    //Production no/ po รวบรวมข้อมูล
    function updateOutput() {
        // สร้างวันที่
        const today = new Date();

        // อาร์เรย์ชื่อเดือน
        const monthNames = [
            "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];

        // ดึงชื่อเดือน
        const month = monthNames[today.getMonth()];



        //ดึงข้อมูล
        const no_po = document.getElementById('NO-PO').value;
        const pd_qty = document.getElementById('production-Qty').value;
        const descript_item = document.getElementById('description').value;
        const delivery = document.getElementById('delivery-to').value;
        const category = document.getElementById('category').value;


        var txt_no_po = ""
        var txt_delivery = ""
        var txt_descript_item = ""
        var txt_pd_qty = ""
        var txt_category = ""
        var txt_month = ""

        //ถ้ามีข้อมูลเข้ามา
        if (no_po) {
            txt_no_po = no_po + "_"
        }
        if (category) {
            txt_category = category + "_"
        }
        if (delivery) {
            txt_delivery = delivery + "_"
        }
        if (descript_item) {
            txt_descript_item = descript_item + "_"
        }
        if (pd_qty) {
            txt_pd_qty = pd_qty
        }

        if (no_po != "" || category != "" || pd_qty != "" || descript_item != "" || delivery != "") {
            txt_month = month + "_"
        } else {
            //ถ้าไม่มีข้อมูล no_po, pd_qty, descript_item, delivery ให้ ลบ txt_month
            txt_month = ""
        }


        var all_text = txt_no_po + txt_category + txt_month + txt_delivery + txt_descript_item + txt_pd_qty
        $('#pd-order').val(all_text)

    }

    //ส่วนของ cell grade

    var prod_qty = 0;
    var number = 0;
    var sum_cell = 0;
    var text = "";


    function on_pd() {
        resetform_cell() //reset ทุกเมื่อมีการ input

        const prod_qty = parseInt($('#production-Qty').val());
        if (prod_qty) {
            document.getElementById('cell_add').disabled = false;
            document.getElementById("num_cell").disabled = false;



        } else {
            document.getElementById("num_cell").disabled = true;

        }




    }

    function add_cell() {

        number = parseInt($('#num_cell').val())
        cell_grade = $('#cell-grade').val()



        //เช็ค value ของ select_grade กับ จำนวน cell
        if (cell_grade && number) {
            sum_cell += number; //เพิ่ม cell
            if (prod_qty > sum_cell) {
              
                text += cell_grade + "-" + $('#num_cell').val() + "_"
                $('#no_cell').val(text)
         
                
           


                console.log("รวม cell: ", sum_cell)
                console.log("ค่าคงที่: ", prod_qty)
                reset_select_grade()

                //ถ้า add cell ครบ
            } else if (prod_qty == sum_cell) {
                text += cell_grade + "-" + $('#num_cell').val() + "_"
                text = text.slice(0, -1);
                $('#no_cell').val(text)
                console.log("รวม add cell: ", sum_cell)
                console.log("ค่าคงที่ add: ", prod_qty)
                reset_select_grade()
                document.getElementById('add_Order').disabled = false;

                document.getElementById('display_status').innerHTML = `<label style="color:green;">cell ครบแล้ว*</label>`;
                setTimeout(function() {
                    document.getElementById('display_status').innerHTML = `<label style="color:red;"></label>`;
                }, 3000);
                document.getElementById("cell_add").disabled = true;


                //ถ้า เพิ่ม เกินกว่าที่ cell มี
            } else if (prod_qty < sum_cell) {
                sum_cell = sum_cell -number;
                

                console.log("ส่วนเกิน || ค่าคงที่: ", prod_qty)
                console.log("ส่วนเกิน || sum cell: ", sum_cell)

                document.getElementById('display_status').innerHTML = `<label style="color:red;">จำนวนเกิน*</label>`;
                setTimeout(function() {
                    document.getElementById('display_status').innerHTML = `<label style="color:red;"></label>`;
                }, 3000);














            }
        } else {

            document.getElementById('display_status').innerHTML = `<label style="color:red;">โปรดเช็คข้อมูลอีกครั้ง*</label>`;
            setTimeout(function() {
                document.getElementById('display_status').innerHTML = `<label style="color:red;"></label>`;
            }, 3000);

        }


    }




    function resetform_cell() {

        prod_qty = parseInt($('#production-Qty').val());
        number = 0;
        sum_cell = 0;
        text = "";
        $('#num_cell').val(0)
        $('#cell-grade').val("")
        $('#no_cell').val("")
        document.getElementById('cell_add').disabled = false;
        document.getElementById("add_Order").disabled = true;

    }

    function reset_select_grade() {
        $('#cell-grade').val("")
        $('#num_cell').val(0)
    }

    $('#num_cell').on('input', function() {
        var value = $(this).val();
        if (value.includes('-')) {
            $(this).val(value.replace('-', ''));
            alert('ไม่อนุญาตให้ใส่เครื่องหมายลบ');
        }
    });
    $('#production-Qty').on('input', function() {
        var value = $(this).val();
        if (value.includes('-')) {
            $(this).val(value.replace('-', ''));
            alert('ไม่อนุญาตให้ใส่เครื่องหมายลบ');
        }
    });







































    // var sum_text = "";
    // var production = "";
    // var count = 0;





    // function on_pd(){

    //     resetform_cell()
    //     production = $('#production-Qty').val()
    // }

    // function add_cell() {

    //     var cell = $('#cell-grade').val()
    //     var num_cell = $('#num_cell').val()


    //     if (cell != "" && num_cell != 0) {
    //         if (count <= parseInt(production)) {

    //             count += parseInt(num_cell);
    //             sum_text += cell + "_" + num_cell + "_";

    //             $('#no_cell').val(sum_text)


    //         } else {

    //         }

    //     }
    //     $('#cell-grade').val("")
    //     $('#num_cell').val(1)

    // }
</script>