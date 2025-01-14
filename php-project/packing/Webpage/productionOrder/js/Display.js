


var select_id_form_info = null;


$(document).ready(function () {
    $.getJSON('GetOrder.php', function (response) {

        var item = response['Message']
        $('#ProductionOrder').DataTable({

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

    $('#ProductionOrder').on('click', '.info-btn', function () {


        $('#info-order').modal('show');


        var id = $(this).data('id');
        select_id_form_info = id;


        $.getJSON('GetOrder.php', function (response) {

            var item = response['Message']
            console.log(item)
            for (i in item) {
                data_item = item[i]
                // console.log(data_item['remark'])
                if (data_item['order_id'] == select_id_form_info) {



                    $('#info_orderid').val(data_item['order_id']);
                    $('#info_pdorder').val(data_item['pd_order']);
                    $('#info_po').val(data_item['po']);
                    $('#info_qcQty').val(data_item['qc_qty']);
                    $('#info_category').val(data_item['category']);
                    $('#info_invoice').val(data_item['invoice_no']);
                    $('#info_itemDes').val(data_item['item_des']);
                    $('#info_cellgrade').val(data_item['md_grade']);
                    $('#info_packstyle').val(data_item['pack_style']);
                    $('#info_pdStatus').val(data_item['pd_status']);
                    $('#info_status').val(data_item['status']);
                    $('#info_deliveryto').val(data_item['d_to']);
                    $('#info_modelty').val(data_item['md_type']);
                    $('#info_pdQty').val(data_item['pd_qty']);
                    $('#info_remark').val(data_item['remark']);
                    $('#info_date').val(data_item['updatetime']);



                    // ข้อมูลวันที่ที่ต้องการแปลง
                    var date_value = data_item['issue_datetime']

                    // แปลงข้อมูลจาก string เป็น Date object
                    var date = new Date(date_value);

                    // ฟังก์ชันจัดรูปแบบให้เป็น 'YYYY-MM-DDTHH:MM'
                    function formatDateToLocal(date) {
                        var year = date.getFullYear();
                        var month = String(date.getMonth() + 1).padStart(2, '0'); // เดือนใน JavaScript เริ่มจาก 0
                        var day = String(date.getDate()).padStart(2, '0');
                        var hours = String(date.getHours()).padStart(2, '0');
                        var minutes = String(date.getMinutes()).padStart(2, '0');

                        return `${year}-${month}-${day}T${hours}:${minutes}`;
                    }

                    // ตั้งค่าค่าวันที่ที่แปลงแล้วให้กับ input
                    document.getElementById('info_party').value = formatDateToLocal(date);



                }
            }

        });



    });




    //ส่งไอดีไปให้ printPage.html สั่งปลิ้น
    $(document).ready(function () {
        $('#ProductionOrder').on('click', '.print-btn', function () {
            var id = $(this).data('id');


            var url = 'printPage.html?id=' + encodeURIComponent(id);
            window.location.href = url;
        });
    });




    //delete order
    var select_id_form_delete_btn = null;
    $('#ProductionOrder').on('click', '.delete-btn', function () {

        select_id_form_delete_btn = $(this).data('id');
        $.getJSON('GetOrder.php', function (response) {
            var item = response['Message']

            for (i in item) {
                data_item = item[i]

                if (data_item['order_id'] == select_id_form_delete_btn) {
                    console.log(item[i])


                    var order_id = data_item['order_id']


                    $("#config-del").html('<span style="color:red;">' + order_id + " ?" + '</span>');
                    $('#delete_confirm_order').modal('show');
                }
            }
        });
    });
    //confirm delete
    $('#Delete_order').on('click', function () {
        delete_order = {
            "action": "delete",
            "order_id": select_id_form_delete_btn,
            "po": "",
            "category": "",
            "pd_order": "",
            "item_des": "",
            "md_type": "",
            "md_grade": "",
            "pd_qty": "",
            "d_to": "",
            "remark": "",
            "pack_style": "",
            "invoice_no": "",
            "issue_date": ""
        }

        $.ajax({
            type: "POST",
            url: "http://10.19.5.106:5001/api/fCreateOrder",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(delete_order),

            success: function (response) {


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
    });
});


//save edit
function save_edit() {



    $.getJSON('GetOrder.php', function (response) {


        var item = response['Message']
        // console.log(item)
        for (i in item) {
            data_item = item[i]
            if (data_item['order_id'] == select_id_form_info) {


                var order_id = $('#info_orderid').val();
                var pd_order = $('#info_pdorder').val();
                var po = $('#info_po').val();
                var category = $('#info_category').val();
                var invoice_no = $('#info_invoice').val();
                var item_des = $('#info_itemDes').val();
                var md_grade = $('#info_cellgrade').val();
                var packing_style = $('#info_packstyle').val();
                var d_to = $('#info_deliveryto').val();
                var md_type = $('#info_modelty').val();
                var pd_qty = $('#info_pdQty').val();
                var remark = $('#info_remark').val();
                var issue_date = $('#info_party').val();

              

                if (order_id && pd_order && po && category && invoice_no && item_des && md_grade && packing_style && d_to && md_type && issue_date) {

                    data_order = {
                        "action": "update",
                        "order_id": order_id,
                        "po": po,
                        "category": category,
                        "pd_order": pd_order,
                        "item_des": item_des,
                        "md_type": md_type,
                        "md_grade": md_grade,
                        "pd_qty": pd_qty,
                        "d_to": d_to,
                        "remark": remark,
                        "pack_style": packing_style,
                        "invoice_no": invoice_no,
                        "issue_date": issue_date

                    }




                    $.ajax({
                        type: "POST",
                        url: "http://10.19.5.106:5001/api/fCreateOrder",
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        data: JSON.stringify(data_order),

                        success: function (response) {
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

                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            console.error('Response Text:', xhr.responseText);
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
        }
    });



}






//button edit info
function edit_info() {
    disabled_off_info();
    document.getElementById('btn_edit').disabled = true;
}
//button save info
function save_info() {
    disabled_on_info();
    save_edit();
    document.getElementById('btn_edit').disabled = false;

}
//button close info
function close_info() {
    disabled_on_info();
    document.getElementById('btn_edit').disabled = false;
}

//สั่งปิดการแก้ไข หรือเปิดการแก้ไข
var data_id = [
    'info_pdorder',
    'info_invoice',
    'info_category',
    'info_itemDes',
    'info_packstyle',
    'info_deliveryto',
    'info_pdQty',
    'info_modalgrade',
    'numedit_cell',
    'cell_clearedit',
    'info_remark',
    'save_edit',
    'cell_addedit'


]

function disabled_off_info() {
    for (var i in data_id) {
        document.getElementById(data_id[i]).disabled = false;
    }
}
function disabled_on_info() {
    for (var i in data_id) {
        document.getElementById(data_id[i]).disabled = true;
    }
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
function resetDataTable() {
    loadDataTable();
}

function reform() {
    document.getElementById('form-Order').reset();

}

