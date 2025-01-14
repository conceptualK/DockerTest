function send_add() {


  //รับค่าจาก form add
  var name_vendor = $('#add_name_vendor').val();
  var tel_vendor = $('#add_tel_vendor').val();

  data_vendor = {
    "actions": "insert",
    "vendor_code": "",
    "vendor_name": name_vendor,
    "vendor_tel": tel_vendor
  }

  if (name_vendor && tel_vendor) {
    $.ajax({
      type: "POST",
      url: "http://10.19.5.106:5001/api/fVendor",
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify(data_vendor),

      success: function (response) {

        loadDataTable()

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
  }else{
    $('.alert').remove();
    $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
      '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' + " please enter vendor name. " + '</div>').appendTo('.AlertTEST');

    setTimeout(function () {
      $('.alert').remove();
    }, 5000);
  }


}





//reset table
function loadDataTable() {

  data_select = {
    "actions": "select",
    "vendor_code": "",
    "vendor_name": "",
    "vendor_tel": ""
  }

  $.ajax({
    type: "POST",
    url: "http://10.19.5.106:5001/api/fVendor",
    dataType: "json",
    contentType: "application/json;",
    data: JSON.stringify(data_select),

    success: function (response) {

      var vendor = response['vendor'];
      var enabledVendors = [];

      // เก็บข้อมูลผู้ขายที่ถูกเปิดใช้งาน
      for (var i in vendor) {
        var enabled_ = vendor[i].enabled;
        if (enabled_ === "Y") {
          enabledVendors.push(vendor[i]);
        }
      }

      // ตรวจสอบว่ามีข้อมูลผู้ขายที่ถูกเปิดใช้งาน
      if (enabledVendors.length > 0) {
        $('#vendor_table').DataTable({
          destroy: true,
          data: enabledVendors,
          columns: [
            { data: 'vendor_code' },
            { data: 'vendor_name' },
            { data: 'vendor_tel' },
            { data: 'update_time' },
            {
              data: null,
              render: function (row) {
                var editButton = '<button class="btn btn-warning edit-btn" data-code="' + row.vendor_code + '">' +
                  'Edit' +
                  '</button>';

                var deleteButton = '<button class="btn btn-danger delete-btn" data-code="' + row.vendor_code + '">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
                  '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>' +
                  '</svg>' +
                  '</button>';

                return editButton + ' ' + deleteButton;
              }
            }
          ]
        });
      } else {
        console.log("ไม่มีผู้ขายที่ถูกเปิดใช้งาน");
      }
    }
  });


}
function resetDataTable_category() {
  loadDataTable_category();
  reset_form()
}
//reset form
function reset_form() {
  document.getElementById('form-vendor').reset();
}

