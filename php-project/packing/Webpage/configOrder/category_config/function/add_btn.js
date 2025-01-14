function send_category() {

  var data_select = {
    "table": "config_category",
    "operation": "select",
    "sections": "*",
    "condition": "",
    "sorted": "order by category_id desc limit 1 ",
    "header_fm": "",
    "value_fm": ""
  }

  $.ajax({
    type: "POST",
    url: "http://10.19.5.106:5001/api/fConfCommand",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    data: JSON.stringify(data_select),
    success: function (response) {
      var item = response
     


      //เพิ่ม id
      function id_category() {
        var item = response['Message']
    
        var id_text = item[0].category_id
        var number_id = parseInt(id_text.substring(1))
        var sumnumber = number_id + 1
        var countString = sumnumber.toString().padStart(4, '0');
        return 'C' + countString
      }

      //รับค่าจาก form add
      var category_name = $('input[name=category-name]').val();
      var flag = $('select[name=option-flag]').val();

      if (category_name != "") {
        var num_id = id_category()
        var text_value = "(" + "'" + num_id + "'" + "," + "'" + category_name + "'" + "," + "'" + flag + "'" + ")"

        
        data_category = {
          "table": "config_category",
          "operation": "insert",
          "sections": "into",
          "condition": "",
          "sorted": "",
          "header_fm": "(category_id, category_name, flag)",
          "value_fm": text_value
        }

        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(data_category),

          success: function (response) {
            resetDataTable()
            reset_form()
            $('.alert').remove();
            $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
              '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
              ' You have added. </div>').appendTo('.AlertTEST');

            setTimeout(function () {
              $('.alert').remove();
            }, 5000);




          }
        });
      }
      else {
        $('.alert').remove();
        $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
          '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
          'please enter category name. </div>').appendTo('.AlertTEST');

        setTimeout(function () {
          $('.alert').remove();
        }, 5000);
      }

    },
    error: function () {

      var category_name = $('input[name=category-name]').val();
      var flag = $('select[name=option-flag]').val();

      if (category_name != "") {
        var text_value = "(" + "'" + "C0001" + "'" + "," + "'" + category_name + "'" + "," + "'" + flag + "'" + ")"


        data_category_c0001 = {
          "table": "config_category",
          "operation": "insert",
          "sections": "into",
          "condition": "",
          "sorted": "",
          "header_fm": "(category_id, category_name, flag)",
          "value_fm": text_value
        }

        $.ajax({
          type: "POST",
          url: "http://10.19.5.106:5001/api/fConfCommand",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify(data_category_c0001),

          success: function (response) {

            resetDataTable()
            reset_form()
            $('.alert').remove();
            $('<div class="alert alert-success d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
              '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>' +
              ' You have added. </div>').appendTo('.AlertTEST');

            setTimeout(function () {
              $('.alert').remove();
            }, 5000);
          }

        });
      }
      else {
        $('.alert').remove();
        $('<div class="alert alert-danger d-flex align-items-center" role="alert" style="position: fixed; z-index: 1; margin-left:78%; width:20%;">' +
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">' +
          '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>' + '</svg>' +
          'please enter category name. </div>').appendTo('.AlertTEST');

        setTimeout(function () {
          $('.alert').remove();
        }, 5000);
      }


    }
  });


  //reset table
  function loadDataTable() {
    data_reset = {
      "table": "config_category",
      "operation": "select",
      "sections": "*",
      "condition": "",
      "sorted": "",
      "header_fm": "",
      "value_fm": ""
    }


    $.ajax({
      type: "POST",
      url: "http://10.19.5.106:5001/api/fConfCommand",
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify(data_reset),

      success: function (response) {

        var category_reset = response['Message']

        $('#category').DataTable({
          destroy: true,
          data: category_reset,
          columns: [
            { data: 'category_id' },
            { data: 'category_name' },
            { data: 'flag' },
            { data: 'updatetime' },
            {
              data: null,
              render: function (row) {
                var editButton = '<button class="btn btn-warning edit-btn" data-id="' + row.category_id + '">' +
                  'Edit' +
                  '</button>';

                var deleteButton = '<button class="btn btn-danger delete-btn" data-id="' + row.category_id + '">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>' +
                  '</button>';

                return editButton + '\n' + deleteButton;
              }
            }

          ]
        });
      }
    })
  }

  function resetDataTable() {
    loadDataTable();
  }
}
function reset_form() {
  document.getElementById('form-category').reset();
}
