
//function รับค่าจาก option มาทำเป็น index  นำไปใช้กับ function updateauto()
var index_model;

$(document).ready(function () {


    //เมื่อมีการเลือก Model
    $('select[name=model]').change(function () {

        let value = $(this).val();
        let str_21s = /(\d{2}S)/;
        let match = value.match(str_21s);

        try {

            if(match[0] === "21S"){
                console.log(match[0])
      
                document.getElementById("display-pallet").innerHTML = null;
                document.getElementById("production-Qty").disabled = false;
                document.getElementById("cell-grade").disabled = false;
                document.getElementById("cell_add").disabled = false;
                document.getElementById("cell_reset").disabled = false;
      
                
                index_model = 2;
                $('#no_cell').val("")
                $('#production-Qty').val(null);
                $('#cell-grade').val(null);
      
      
      
      
              }else if(match[0] === "14S"){
                  console.log(match[0])
      
                  document.getElementById("display-pallet").innerHTML = null;
                  //ปิดใช้งาน disable
                  document.getElementById("production-Qty").disabled = false;
                  document.getElementById("cell-grade").disabled = false;
                  document.getElementById("cell_add").disabled = false;
                  document.getElementById("cell_reset").disabled = false;
               
                  index_model = 1;
                  $('#no_cell').val("")
                  $('#production-Qty').val(null);
                  $('#cell-grade').val(null);
      
      
      
              }
              
        }catch{
            document.getElementById("display-pallet").innerHTML = null;
            document.getElementById("production-Qty").disabled = true;
            document.getElementById("cell-grade").disabled = true;
            document.getElementById("cell_add").disabled = true;
            document.getElementById("cell_reset").disabled = true;
            
            index_model = 0;
            $('#no_cell').val("")
            $('#production-Qty').val(null);
            $('#cell-grade').val(null);
        }
        
    });

});



//คำนวณจำนวน Pallet ใน modal create order แล้ว display pallet 

function updateauto() {

    //ดึงค่าจากช่อง production-Qty
    const pd_qty = document.getElementById('production-Qty').value;
    var Pro_Qty = pd_qty;



    var modal_pallet = 0;

    //battery model 14S | 30 : x1 pallet
    if (index_model === 1) {
        var Pro_Qty = parseInt(Pro_Qty)

        if (Pro_Qty >= 1) {

            var number = Pro_Qty / 30;
            var old_number = Pro_Qty % 30

            //ถ้ามีเศษ
            if (old_number != 0) {

                var result = 0;
                //ทำจำนวนเต็ม
                var Pallet = Math.floor(number)
                //เพิ่ม 1 
                result = Pallet++;

                document.getElementById("display-pallet").innerHTML = "<img src='pallet.png' style='width:24px; hieght:24px;'> " + Pallet + " pallet";






                modal_pallet = result

            } else if (old_number == 0) {

                modal_pallet = number

                document.getElementById("display-pallet").innerHTML = "<img src='pallet.png' style='width:24px; hieght:24px;'> " + modal_pallet + " pallet";
            }
        } else {
            document.getElementById("display-pallet").innerHTML = null;
        }
    }

    // //battery model 21S | 8 : x1 pallet
    if (index_model === 2) {
        var Pro_Qty = parseInt(Pro_Qty)
        var modal_pallet = 0;

        if (Pro_Qty >= 1) {
            var number = Pro_Qty / 8;
            var old_number = Pro_Qty % 8

            if (old_number != 0) {

                var result = 0

                var Pallet = Math.floor(number)
                result = Pallet++;
                // console.log("Pallet: " + Pallet)
                // console.log("Old Number: " + old_number)
                document.getElementById("display-pallet").innerHTML = "<img src='pallet.png' style='width:24px; hieght:24px;'> " + Pallet + " pallet";


                modal_pallet = result
            } else {
                //console.log("Pallet: " + number)
                modal_pallet = number
                document.getElementById("display-pallet").innerHTML = "<img src='pallet.png' style='width:24px; hieght:24px;'> " + modal_pallet + " pallet";
            }



        } else {
            document.getElementById("display-pallet").innerHTML = null;
        }
    }

    


}


//function ปุ่ม add
function send_sv() {
    //reset ผลจากการคำนวณ pallet เมื่อกดส่ง
    document.getElementById("display-pallet").innerHTML = null;


    //value text box
    var NO_PO = $('input[name=NO]').val();
    var Pro_Qty = $('input[name=production-Qty]').val();
    var remark = $('#message-text').val();
    var pd_order = $('input[name=pd-order]').val();
    var datetime = $('#party').val();



    //value select box
    var Category = $('select[name=category]').val();
    var Description = $('select[name=description]').val();
    var Cell_grade = $('#no_cell').val();
    var Delivery_to = $('select[name=delivery-to]').val();
    var Pack_sytle = $('select[name=Pack-style]').val();
    var model_type = $('select[name=model]').val();
    var invoice = $('select[name=invoice]').val();


    var NO_PO_string = NO_PO.toString()
    var Category_string = Category.toString()
    var Description_string = Description.toString()
    var Model_string = model_type.toString()
    var Cell_grade_string = Cell_grade.toString()
    var Pro_Qty_string = Pro_Qty.toString()
    var Delivery_to_string = Delivery_to.toString()
    var remark_string = remark.toString()
    var Pack_sytle_string = Pack_sytle.toString()
    var invoice_string = invoice.toString()
    var Product_Order_string = pd_order.toString()






    //Get form 
    data1 = {
        "action": "insert",
        "order_id": "",
        "po": NO_PO_string,
        "category": Category_string,
        "pd_order": Product_Order_string,
        "item_des": Description_string,
        "md_type": Model_string,
        "md_grade": Cell_grade_string,
        "pd_qty": Pro_Qty_string,
        "d_to": Delivery_to_string,
        "remark": remark_string,
        "pack_style": Pack_sytle_string,
        "invoice_no": invoice_string,
        "issue_date": datetime
    }
    console.log(data1)
  


    if (NO_PO_string && Category_string && Product_Order_string && Description_string && Model_string && Cell_grade_string && Pro_Qty_string && Delivery_to_string && Pack_sytle_string && invoice_string && datetime) {
        $.ajax({

            type: "POST",
            url: "http://10.19.5.106:5001/api/fCreateOrder",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(data1),

            success: function (response) {
                console.log("After" +response)

                reform();
                resetDataTable()

                if (response['MsgResult'] === "00000") {
                    $('.alert').remove();
                    $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                        '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' + response['ErrorMessage'] + '</div>').appendTo('.AlertTEST');

                    setTimeout(function () {
                        $('.alert').remove();
                    }, 5000);
                } else {
                    $('.alert').remove();
                    $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
                        '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' + response['ErrorMessage'] + '</div>').appendTo('.AlertTEST');

                    setTimeout(function () {
                        $('.alert').remove();
                    }, 5000);
                }


            }

        });
    } else {

        $('.alert').remove();
        $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
            '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
            'โปรดตรวจสอบอีกครั้ง </div>').appendTo('.AlertTEST');

        setTimeout(function () {
            $('.alert').remove();
        }, 5000);

    }
}


//เมื่่อส่งจะใช้งานนี้ เพื่อ รีเซ็ต form
function reform() {
    document.getElementById('form-Order').reset();
}
//สั่งรีเซ็ต ตารางเมื่อกด save
function resetDataTable() {
    loadDataTable();
}

// function reset table
function loadDataTable() {
    $.getJSON('GetOrder.php', function (response) {
        var item = response['Message']
        $('#ProductionOrder').DataTable({
            destroy: true,
            data: item,
            columns: [
                { data: 'order_id' },
                { data: 'md_type' },
                { data: 'd_to' },
                { data: 'status' },
                { data: 'updatetime' },
                {
                    data: null,
                    render: function (row) {
                        var infoButton = '<div class="col w-25"><button class="btn btn-primary info-btn" data-id="' + row.order_id + '">' +
                            'info' +
                            '</button> </div>';

                        var printButton = '<div class="col"><button class="btn btn-success print-btn" data-id="' + row.order_id + '">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/></svg>' +
                            '</button></div>';

                        var deleteButton = '<div class="col"><button class="btn btn-danger delete-btn" data-id="' + row.order_id + '">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>' +
                            '</button></div>';
                        return `<div class="row">${infoButton} ${printButton} ${deleteButton}</div>`;
                    }
                }
            ]
        });
    });
}
